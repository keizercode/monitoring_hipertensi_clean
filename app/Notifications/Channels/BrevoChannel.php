<?php

namespace App\Notifications\Channels;

use App\Services\BrevoService;

class BrevoChannel
{
    public function send($notifiable, $notification)
    {
        if (!method_exists($notification, 'toBrevo')) {
            return;
        }

        $data = $notification->toBrevo($notifiable);

        return app(BrevoService::class)->sendEmail(
            $data['to'],
            $data['subject'],
            $data['body']
        );
    }
}
