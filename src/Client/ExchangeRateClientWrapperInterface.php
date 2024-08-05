<?php

namespace App\Client;

use App\DTO\ExchangeRate\ExchangeRate;

interface ExchangeRateClientWrapperInterface
{
    public function getExchangeRate(): ExchangeRate;
}