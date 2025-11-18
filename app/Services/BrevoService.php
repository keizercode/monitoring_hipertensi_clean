<?php

namespace App\Services;

use Brevo\Client\Configuration;
use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Model\SendSmtpEmail;

class BrevoService
{
    protected $api;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()
            ->setApiKey('api-key', config('services.brevo.key'));

        $this->api = new TransactionalEmailsApi(null, $config);
    }

    public function sendEmail($to, $subject, $html)
    {
        $email = new SendSmtpEmail([
            'sender' => [
                'name'  => 'Tension Track – Monitoring Hipertensi',
                'email' => config('mail.from.address'),
            ],
            'to' => [['email' => $to]],
            'subject' => $subject,
            'htmlContent' => $html,
        ]);

        return $this->api->sendTransacEmail($email);
    }
}
