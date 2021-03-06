<?php

declare(strict_types=1);

namespace Service\Sms\Contract;

use Dictionary\SmsCode;

interface SmsServiceInterface
{
    public function sendMessageAsTemplate(SmsCode $code, string $phone, array $variables): void;
}