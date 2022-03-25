<?php

declare(strict_types=1);

namespace Entity;

class User
{
    public readonly ?int $id;

    public function __construct(public string $name, public string $passwordHash)
    {
    }
}