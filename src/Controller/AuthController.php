<?php

declare(strict_types=1);

namespace Controller;

use Service\Contract\UserServiceInterface;

class AuthController
{
    public function __construct(
        private UserServiceInterface $userService
    ) {
    }

    public function remind(string $phone): Response
    {
        $this->userService->remindPasswordByPhone($phone);

        return new Response(['message' => 'reminder_sent']);
    }
}