<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewTemporaryPasswordNotification extends Notification
{
    use Queueable;

    private $newPassword;

    public function __construct($newPassword)
    {
        $this->newPassword = $newPassword;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Your Temporary Password')
                    ->greeting('Hello!')
                    ->line('A new temporary password has been generated for your account.')
                    ->line('Temporary Password: ' . $this->newPassword)
                    ->line('For security reasons, please change your password immediately after logging in.')
                    ->action('Login to Your Account', url('/login'))
                    ->line('Thank you for using our application!');
    }
}
