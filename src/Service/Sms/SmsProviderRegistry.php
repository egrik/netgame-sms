<?php

declare(strict_types=1);

namespace Service\Sms;

use Service\Sms\Contract\SmsProviderInterface;
use Service\Sms\Contract\SmsProviderRegistryInterface;

class SmsProviderRegistry implements SmsProviderRegistryInterface
{
    /** @var SmsProviderInterface[] */
    private array $providers;

    public function __construct(iterable $providers)
    {
        $this->providers = iterator_to_array($providers);
    }

    public function get(string $index): SmsProviderInterface
    {
        if (!isset($this->providers[$index])) {
            throw new \RuntimeException(sprintf('Not found sms provider by: %s', $index));
        }

        return $this->providers[$index];
    }
}