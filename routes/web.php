<?php

use App\Livewire\CreateNote;
use App\Livewire\EditNote;
use App\Livewire\ListNotes;
use App\Livewire\ShowNote;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return Auth::check() ? redirect()->route('notes.index') : redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

    Route::prefix('notes')->name('notes.')->group(function(){
        Route::get('/', ListNotes::class)->name('index');
        Route::get('/create', CreateNote::class)->name('create');
        Route::get('/{note}/edit', EditNote::class)->name('edit');
        Route::get('/{note}', ShowNote::class)->name('show');
    });
});