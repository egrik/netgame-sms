<?php

declare(strict_types=1);

namespace Service;

use Dictionary\SmsCode;
use Repository\UserRepositoryInterface;
use Service\Contract\PasswordGeneratorInterface;
use Service\Contract\PasswordHasherInterface;
use Service\Contract\UserServiceInterface;
use Service\Sms\Contract\SmsServiceInterface;

class UserService implements UserServiceInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private SmsServiceInterface $smsService,
        private PasswordGeneratorInterface $passwordGenerator,
        private PasswordHasherInterface $passwordHasher
    ) {
    }

    public function remindPasswordByPhone(string $phone): void
    {
        $user = $this->userRepository->getByPhone($phone);
        $password = $this->passwordGenerator->generate();

        $passwordHash = $this->passwordHasher->hash($password);
        $user->passwordHash = $passwordHash;

        $this->userRepository->save($user);
        $this->userRepository->flush();

        $this->smsService->produceMessageAsTemplate(SmsCode::REMIND, $phone, [
            'name' => $user->name,
            'password' => $password
        ]);
    }
}