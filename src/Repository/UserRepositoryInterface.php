<?php

declare(strict_types=1);

namespace Repository;

use Entity\User;
use Exception\EntityNotFoundException;

interface UserRepositoryInterface
{
    /**
     * @param string $phone
     * @return User
     *
     * @throws EntityNotFoundException
     */
    public function getByPhone(string $phone): User;

    public function save(User $user): void;

    public function flush(): void;
}