<?php

namespace App\Livewire\Auth\Passwords;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Reset extends Component
{
    public $token;

    public $email;

    public $password;

    public $password_confirmation;

    public function mount()
    {
        $this->token = request()->query('token');
        $this->email = request()->query('email');
    }

    public function resetPassword()
    {
        $this->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $this->email)
            ->where('reset_token', hash('sha256', $this->token))
            ->first();

        if (! $user) {
            return redirect()->route('password.request')->with('error', 'Sessão inválida.');
        }

        $user->update([
            'password' => Hash::make($this->password),
            'reset_token' => null,
            'reset_token_expires_at' => null,
        ]);

        auth()->login($user);

        session()->regenerate();

        session()->flash('success', 'Senha redefinida! Você já está logado.');

        return redirect()->route('notes.index');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.auth.passwords.reset');
    }
}
