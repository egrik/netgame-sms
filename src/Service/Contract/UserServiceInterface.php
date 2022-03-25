<?php

declare(strict_types=1);

namespace Service\Contract;

interface UserServiceInterface
{
    public function remindPasswordByPhone(string $phone): void;
}