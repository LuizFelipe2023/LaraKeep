<?php

namespace App\Livewire\Auth\Passwords;

use App\Models\User;
use App\Notifications\ResetPasswordCodeNotification;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Email extends Component
{
    public $email;

    protected $rules = ['email' => 'required|email'];

    public function sendResetLink()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if ($user) {
            $code = rand(100000, 999999);

            $user->update([
                'reset_token' => hash('sha256', $code),
                'reset_token_expires_at' => now()->addMinutes(15),
            ]);

            $user->notify(new ResetPasswordCodeNotification($code));

            \Log::info("Código enviado para {$this->email}: {$code}");

            session()->flash('success', 'Enviamos um código de confirmação para o seu e-mail.');
        } else {
            session()->flash('success', 'Se o e-mail existir em nossa base, um código será enviado.');
        }

        return redirect()->route('password.verify', ['email' => $this->email]);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.auth.passwords.email');
    }
}
