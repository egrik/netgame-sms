<?php

declare(strict_types=1);

namespace Entity;

use Dictionary\SmsCode;
use Dictionary\SmsTransport;

class Sms
{
    public readonly ?int $id;

    public function __construct(public SmsCode $code, public string $message, public SmsTransport $transport)
    {
    }
}