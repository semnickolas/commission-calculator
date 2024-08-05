<?php

namespace App\DTO\ExchangeRate;

class ExchangeRate
{
    private const float DEFAULT_RATE = 0.0;

    private string $base;
    private string $date;
    private array $rates;

    public function getBase(): string
    {
        return $this->base;
    }

    public function setBase(string $base): ExchangeRate
    {
        $this->base = $base;

        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): ExchangeRate
    {
        $this->date = $date;

        return $this;
    }

    public function getRates(): array
    {
        return $this->rates;
    }

    public function getRate(string $currency): float
    {
        return $this->rates[$currency] ?? self::DEFAULT_RATE;
    }

    public function setRates(array $rates): ExchangeRate
    {
        $this->rates = $rates;

        return $this;
    }
}