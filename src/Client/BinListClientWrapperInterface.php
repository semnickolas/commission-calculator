<?php

namespace App\Client;

use App\DTO\BinList\BinList;

interface BinListClientWrapperInterface
{
    public function getBinList(string $binMask): BinList;
}