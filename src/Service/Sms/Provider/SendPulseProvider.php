<?php

declare(strict_types=1);

namespace Service\Sms\Provider;

use Service\Sms\Contract\SmsProviderInterface;

class SendPulseProvider implements SmsProviderInterface
{
    public function send(string $phone, string $message): void
    {
        // TODO: Implement send() method.
    }
}