<?php

declare(strict_types=1);

namespace Dictionary;

enum SmsCode: string
{
    case REMIND = 'REMIND';
    case REGISTER = 'REGISTER';
}