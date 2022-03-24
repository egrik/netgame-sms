<?php

declare(strict_types=1);

namespace Service\Sms\Provider;

use Service\Contract\PhoneNumberService;
use Service\Sms\Contract\SmsProviderInterface;
use Service\Sms\Contract\SmsProviderRegistryInterface;

class CompoundProvider implements SmsProviderInterface
{
    public function __construct(
        private SmsProviderRegistryInterface $providerRegistry,
        private PhoneNumberService $phoneNumberService
    ) {
    }

    public function send(string $phone, string $message): void
    {
        $country = $this->phoneNumberService->getCountryByPhone($phone);

        $this->providerRegistry->get($country->value)->send($phone, $message);
    }
}