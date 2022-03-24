<?php

declare(strict_types=1);

namespace Controller;

use Dictionary\SmsCode;
use Service\Sms\Contract\SmsServiceInterface;

class AuthController
{
    public function __construct(
        private SmsServiceInterface $smsService
    ) {
    }

    public function remind(): Response
    {
        $phone = '3800000000';
        $name = 'Tester';

        $this->smsService->sendMessageAsTemplate(SmsCode::REMIND, $phone, ['name' => $name]);

        return new Response(['message' => 'reminder_sent']);
    }
}