<?php

declare(strict_types=1);

namespace Service\Sms\Contract;

use Exception\SmsProviderException;

interface SmsProviderInterface
{
    /**
     * @param string $phone
     * @param string $message
     * @return void
     *
     * @throws SmsProviderException
     */
    public function send(string $phone, string $message): void;
}