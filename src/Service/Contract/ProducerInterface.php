<?php

declare(strict_types=1);

namespace Service\Contract;

interface ProducerInterface
{
    public function sendDtoToQueue(string $queue, object $dto): self;
}