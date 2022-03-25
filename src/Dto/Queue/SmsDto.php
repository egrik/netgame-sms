<?php

declare(strict_types=1);

namespace Dto\Queue;

use Dictionary\SmsTransport;

class SmsDto
{
    public function __construct(
        public readonly string $phone,
        public readonly string $message,
        public readonly SmsTransport $transport
    ) {
    }
}