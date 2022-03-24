<?php

declare(strict_types=1);

namespace Service\Sms\Contract;

interface SmsProviderRegistryInterface
{
    /**
     * @param string $index
     * @return SmsProviderInterface
     *
     * @throws \RuntimeException
     */
    public function get(string $index): SmsProviderInterface;
}