<?php

declare(strict_types=1);

namespace Service\Sms;

use Dictionary\Queue;
use Dictionary\SmsCode;
use Dto\Queue\SmsDto;
use Repository\SmsRepositoryInterface;
use Service\Contract\ProducerInterface;
use Service\Sms\Contract\SmsServiceInterface;
use Service\Contract\TemplateEngineInterface;

class SmsService implements SmsServiceInterface
{
    public function __construct(
        private SmsRepositoryInterface $smsRepository,
        private TemplateEngineInterface $templateEngine,
        private ProducerInterface $producer
    ) {
    }

    public function produceMessageAsTemplate(SmsCode $code, string $phone, array $variables): void
    {
        $sms = $this->smsRepository->getByCode($code);
        $message = $this->templateEngine->render($sms->message, $variables);

        $this->producer->sendDtoToQueue(Queue::SMS_TRANSPORT->value, new SmsDto($phone, $message, $sms->transport));
    }
}