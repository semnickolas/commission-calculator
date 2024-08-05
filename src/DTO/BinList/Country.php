<?php

namespace App\DTO\BinList;

class Country
{
    private string $numeric;
    private string $alpha2;
    private string $name;
    private string $emoji;
    private string $currency;
    private int $latitude;
    private int $longitude;

    public function getNumeric(): string
    {
        return $this->numeric;
    }

    public function setNumeric(string $numeric): Country
    {
        $this->numeric = $numeric;

        return $this;
    }

    public function getAlpha2(): string
    {
        return $this->alpha2;
    }

    public function setAlpha2(string $alpha2): Country
    {
        $this->alpha2 = $alpha2;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Country
    {
        $this->name = $name;

        return $this;
    }

    public function getEmoji(): string
    {
        return $this->emoji;
    }

    public function setEmoji(string $emoji): Country
    {
        $this->emoji = $emoji;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): Country
    {
        $this->currency = $currency;

        return $this;
    }

    public function getLatitude(): int
    {
        return $this->latitude;
    }

    public function setLatitude(int $latitude): Country
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): int
    {
        return $this->longitude;
    }

    public function setLongitude(int $longitude): Country
    {
        $this->longitude = $longitude;

        return $this;
    }
}