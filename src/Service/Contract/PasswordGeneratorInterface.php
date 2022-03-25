<?php

declare(strict_types=1);

namespace Service\Contract;

use Dictionary\PasswordStrength;

interface PasswordGeneratorInterface
{
    public function generate(PasswordStrength $passwordStrength = PasswordStrength::MEDIUM): string;
}