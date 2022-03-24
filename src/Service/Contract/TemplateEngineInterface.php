<?php

declare(strict_types=1);

namespace Service\Contract;

interface TemplateEngineInterface
{
    /**
     * @param string $text
     * @param array $variables
     * @return string
     *
     * @throws \RuntimeException
     */
    public function render(string $text, array $variables): string;
}