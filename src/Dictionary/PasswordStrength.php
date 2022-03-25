<?php

declare(strict_types=1);

namespace Dictionary;

enum PasswordStrength
{
    case SIMPLE;
    case MEDIUM;
    case STRONG;
}