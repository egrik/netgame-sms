<?php

declare(strict_types=1);

namespace Repository;

use Dictionary\SmsCode;
use Entity\Sms;
use Exception\EntityNotFoundException;

interface SmsRepositoryInterface
{
    /**
     * @param SmsCode $code
     * @return Sms
     *
     * @throws EntityNotFoundException
     */
    public function getByCode(SmsCode $code): Sms;
}