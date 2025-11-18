<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmailNotification extends VerifyEmailNotification
{
    public function via($notifiable)
    {
        return [\App\Notifications\Channels\BrevoChannel::class];
    }

    public function toBrevo($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return [
            'to'         => $notifiable->email,
            'subject'    => 'Verifikasi Email - Tension Track',
            'body'       => "
                <h2>Halo {$notifiable->name}!</h2>
                <p>Silakan klik link berikut untuk verifikasi email:</p>
                <a href='{$verificationUrl}'>Verifikasi Email</a>
            ",
        ];
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
