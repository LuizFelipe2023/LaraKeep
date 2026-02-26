<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordCodeNotification extends Notification
{
    use Queueable;

    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Seu código de recuperação - LaraKeep')
            ->greeting('Olá!')
            ->line('Você solicitou a recuperação de senha da sua conta LaraKeep.')
            ->line('Use o código abaixo para prosseguir com a alteração:')
            ->action($this->code, '#') 
            ->line('Este código expira em 15 minutos.')
            ->line('Se você não solicitou isso, ignore este e-mail.');
    }
}