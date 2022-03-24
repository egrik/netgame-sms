<?php

declare(strict_types=1);

namespace Dictionary;

enum SmsTransport: string
{
    case LOCAL = 'local';
    case REMOTE = 'remote';
}