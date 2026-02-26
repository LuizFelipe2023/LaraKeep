<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

class Profile extends Component
{
    public $name;
    public $email;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ], [
            'password.different' => 'A nova senha deve ser diferente da atual.'
        ]);

        $user = auth()->user();

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'A senha atual está incorreta.');
            return;
        }

        $user->update([
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['current_password', 'password', 'password_confirmation']);
        
        $this->dispatch('notify', message: 'Senha atualizada com sucesso!');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.auth.profile');
    }
}