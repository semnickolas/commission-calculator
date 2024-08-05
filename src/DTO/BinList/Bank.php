<?php

namespace App\DTO\BinList;

class Bank
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Bank
    {
        $this->name = $name;

        return $this;
    }
}