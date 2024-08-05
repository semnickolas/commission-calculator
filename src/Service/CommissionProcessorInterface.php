<?php

namespace App\Service;

interface CommissionProcessorInterface
{
    public function process(string $filename): \Generator;
}