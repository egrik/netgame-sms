<?php

declare(strict_types=1);

namespace Service\Contract;

interface PasswordHasherInterface
{
    public function hash(string $plainPassword): string;

    public function verify(string $hashedPassword, string $plainPassword): bool;
}