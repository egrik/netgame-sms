<?php

declare(strict_types=1);

namespace Service\Contract;

use Dictionary\SmsCode;

interface PhoneNumberService
{
    /**
     * @param string $phone
     * @return SmsCode
     *
     * @throws \RuntimeException
     */
    public function getCountryByPhone(string $phone): SmsCode;
}