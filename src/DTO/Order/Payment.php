<?php

namespace App\DTO\Order;

class Payment
{
    private string $bin;
    private string $amount;
    private string $currency;

    public function getBin(): string
    {
        return $this->bin;
    }

    public function setBin(string $bin): Payment
    {
        $this->bin = $bin;

        return $this;
    }

    public function getAmount(): float
    {
        return (float) $this->amount;
    }

    public function setAmount(string $amount): Payment
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): Payment
    {
        $this->currency = $currency;

        return $this;
    }
}