<?php

namespace App\Service;

use App\Dictionary\EuropeDictionary;
use App\DTO\BinList\BinList;
use App\DTO\ExchangeRate\ExchangeRate;
use App\DTO\Order\Payment;

class CommissionCalculator implements CalculatorInterface
{
    private const string BASE_CURRENCY = 'EUR';
    private const float BASE_RATE = 0.0;
    private const float EU_COEFFICIENT = 0.01;
    private const float ROW_COEFFICIENT = 0.02;

    public function calculate(ExchangeRate $exchangeRate, BinList $binList, Payment $payment): float
    {
        $rate = $exchangeRate->getRate($payment->getCurrency());
        $paymentAmount = $this->retrievePaymentAmount($payment, $rate);

        return $paymentAmount * $this->getCommissionCoefficient($binList);
    }

    private function retrievePaymentAmount(Payment $payment, float $rate): float
    {
        if ($payment->getCurrency() === self::BASE_CURRENCY || $rate === self::BASE_RATE) {
            return $payment->getAmount();
        }

        return ceil($payment->getAmount() / $rate);
    }

    private function getCommissionCoefficient(BinList $binList): float
    {
        return EuropeDictionary::isCountryEurope($binList->getCountryCode()) ? self::EU_COEFFICIENT : self::ROW_COEFFICIENT;
    }
}