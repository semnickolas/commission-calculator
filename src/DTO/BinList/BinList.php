<?php

namespace App\DTO\BinList;

class BinList
{
    private string $schema;
    private string $type;
    private string $brand;
    private Country|null $country = null;
    private Bank $bank;

    public function getSchema(): string
    {
        return $this->schema;
    }

    public function setSchema(string $schema): BinList
    {
        $this->schema = $schema;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): BinList
    {
        $this->type = $type;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): BinList
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCountry(): Country
    {
        return $this->country;
    }

    public function getCountryCode(): string
    {
        return $this->country?->getAlpha2() ?? '';
    }

    public function setCountry(Country $country): BinList
    {
        $this->country = $country;

        return $this;
    }

    public function getBank(): Bank
    {
        return $this->bank;
    }

    public function setBank(Bank $bank): BinList
    {
        $this->bank = $bank;

        return $this;
    }
}