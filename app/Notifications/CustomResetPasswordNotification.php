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
            'body' => "
    <div style='font-family: Arial, sans-serif; color:#333; padding:20px; line-height:1.6;'>
        <h2 style='color:#2c7be5; text-align:center;'>Reset Password</h2>

        <p>Halo {$notifiable->name},</p>

        <p>
            Kami menerima permintaan untuk mereset password akun Anda di <strong>Tension Track</strong>.
            Jika itu benar Anda, silakan klik tombol di bawah untuk melanjutkan.
        </p>

        <div style='text-align:center; margin:30px 0;'>
            <a href='{$url}'
               style='background:#2c7be5; color:#fff; padding:12px 24px; text-decoration:none; border-radius:6px; font-weight:bold;'>
                Reset Password
            </a>
        </div>

        <p>Jika tombol tidak berfungsi, gunakan link berikut:</p>

        <div style='background:#f0f4ff; padding:12px; border-radius:8px; word-break:break-all; color:#2c7be5;'>
            {$url}
        </div>

        <p>Link reset password ini berlaku selama <strong>60 menit</strong>.</p>

        <p style='margin-top:25px; color:#666; font-size:12px; text-align:center;'>
            Jika Anda tidak meminta reset password, abaikan email ini.
        </p>
    </div>
",
        ];
    }
}
