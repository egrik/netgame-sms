<?php

declare(strict_types=1);

namespace Service\Sms;

use Dictionary\SmsCode;
use Repository\SmsRepositoryInterface;
use Service\Sms\Contract\SmsProviderRegistryInterface;
use Service\Sms\Contract\SmsServiceInterface;
use Service\Contract\TemplateEngineInterface;

class SmsService implements SmsServiceInterface
{
    public function __construct(
        private SmsRepositoryInterface $smsRepository,
        private SmsProviderRegistryInterface $smsProviderRegistry,
        private TemplateEngineInterface $templateEngine
    ) {

    }

    public function sendMessageAsTemplate(SmsCode $code, string $phone, array $variables): void
    {
        $sms = $this->smsRepository->getByCode($code);
        $message = $this->templateEngine->render($sms->message, $variables);

        $provider = $this->smsProviderRegistry->get($sms->transport->value);
        $provider->send($phone, $message);
    }
}