<?php

declare(strict_types=1);

namespace Processor;

use Dto\Queue\SmsDto;
use Service\Sms\Contract\SmsProviderRegistryInterface;

class SmsTransportProcessor
{
    public function __construct(private SmsProviderRegistryInterface $smsProviderRegistry)
    {
    }

    public function process(SmsDto $smsDto): void
    {
        $provider = $this->smsProviderRegistry->get($smsDto->transport->value);
        $provider->send($smsDto->phone, $smsDto->message);
    }
}