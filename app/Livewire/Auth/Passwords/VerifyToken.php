<?php

namespace App\Livewire\Auth\Passwords;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Notifications\ResetPasswordCodeNotification;

class VerifyToken extends Component
{
    public $email;

    public $token;

    public function mount()
    {
        $this->email = request()->query('email');
    }

    public function verify()
    {
        $this->validate(['token' => 'required|numeric|digits:6']);

        $user = User::where('email', $this->email)->first();

        if (! $user ||
            $user->reset_token !== hash('sha256', $this->token) ||
            now()->isAfter($user->reset_token_expires_at)) {

            $this->addError('token', 'Código inválido ou expirado.');

            return;
        }

        session()->flash('success', 'Código verificado! Agora você pode criar sua nova senha.');

        return redirect()->route('password.reset', [
            'token' => $this->token,
            'email' => $this->email,
        ]);
    }

    public function resendCode()
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            $code = rand(100000, 999999);

            $user->update([
                'reset_token' => hash('sha256', $code),
                'reset_token_expires_at' => now()->addMinutes(15),
            ]);

          
            $user->notify(new ResetPasswordCodeNotification($code));

            \Log::info("Novo código reenviado para {$this->email}: {$code}");

          
            $this->dispatch('notify', message: 'Um novo código foi enviado para o seu e-mail!');
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.auth.passwords.verify-token');
    }
}
