<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

class CustomResetPasswordNotification extends ResetPasswordNotification
{
    public function via($notifiable)
    {
        return [\App\Notifications\Channels\BrevoChannel::class];
    }

    public function toBrevo($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return [
            'to'      => $notifiable->email,
            'subject' => 'Reset Password - Tension Track',
            'body'    => "
                <p>Anda meminta reset password. Klik link ini:</p>
                <a href='{$url}'>Reset Password</a>
                <p>Link berlaku 60 menit.</p>
            ",
        ];
    }
}
