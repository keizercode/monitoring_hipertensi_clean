<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;

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
            'body' => "
    <div style='background-color:#f5f7fa; padding:30px; font-family:Arial, sans-serif;'>
        <div style='max-width:600px; margin:0 auto; background:#ffffff; border-radius:10px; padding:30px; box-shadow:0 4px 12px rgba(0,0,0,0.08);'>

            <!-- HEADER LOGO -->
            <div style='display:flex; justify-content:center; align-items:center; gap:25px; margin-bottom:25px;'>
                <img src='" . url('images/ppn-logo.png') . "' alt='PPN UPI' style='height:60px;'>
                <img src='" . url('images/upi-logo.png') . "' alt='UPI' style='height:60px;'>
            </div>

            <h2 style='color:#2c7be5; margin-bottom:5px; text-align:center;'>Tension Track</h2>
            <p style='color:#555; margin-top:0; text-align:center; font-size:14px;'>Monitoring Hipertensi</p>

            <p style='color:#333;'>Halo {$notifiable->name},</p>

            <p style='color:#444;'>
                Terima kasih telah mendaftar di <strong>Tension Track</strong>.
                Untuk mengaktifkan akun Anda dan mulai menggunakan fitur pendataan serta pemantauan hipertensi,
                silakan melakukan verifikasi email terlebih dahulu.
            </p>

            <div style='text-align:center; margin:35px 0;'>
                <a href='{$verificationUrl}'
                   style='background:#2c7be5; padding:14px 28px; border-radius:8px; color:#fff; text-decoration:none; font-weight:bold; font-size:15px; display:inline-block;'>
                    Verifikasi Email Anda
                </a>
            </div>

            <p style='color:#444;'>
                Jika tombol di atas tidak berfungsi, silakan salin dan buka link berikut di browser Anda:
            </p>

            <div style='padding:12px; background:#f0f4ff; border-radius:8px; word-break:break-all; color:#2c7be5; font-size:14px;'>
                {$verificationUrl}
            </div>

            <p style='color:#444;'>
                Verifikasi email membantu memastikan keamanan akun Anda dan melindungi data Anda dari akses tidak sah.
                Kami senang Anda telah memilih Tension Track sebagai platform monitoring hipertensi digital.
            </p>

            <br>

            <hr style='border:none; border-top:1px solid #e6e6e6; margin:30px 0;'>

            <p style='font-size:12px; color:#777; text-align:center; line-height:1.5;'>
                Tension Track – Monitoring Hipertensi<br>
                PPN UPI – Indonesia University of Education<br>
                © 2025 PPN UPI | Program Profesi Ners
            </p>

        </div>
    </div>
",
        ];
    }


}
