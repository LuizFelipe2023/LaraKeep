<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\CreateNote;
use App\Livewire\EditNote;
use App\Livewire\ListNotes;
use App\Livewire\ShowNote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\VerifyToken;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Profile;

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
    Route::get('/password/reset', Email::class)->name('password.request');
    Route::get('/password/verify', VerifyToken::class)->name('password.verify');
    Route::get('/password/new', Reset::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile',Profile::class)->name('profile');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');

    Route::prefix('notes')->name('notes.')->group(function () {
        Route::get('/', ListNotes::class)->name('index');
        Route::get('/create', CreateNote::class)->name('create');
        Route::get('/{note}/edit', EditNote::class)->name('edit');
        Route::get('/{note}', ShowNote::class)->name('show');
    });
});
