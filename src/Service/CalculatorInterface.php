<?php

namespace App\Service;

use App\DTO\BinList\BinList;
use App\DTO\ExchangeRate\ExchangeRate;
use App\DTO\Order\Payment;

interface CalculatorInterface
{
    public function calculate(ExchangeRate $exchangeRate, BinList $binList, Payment $payment): float;
}