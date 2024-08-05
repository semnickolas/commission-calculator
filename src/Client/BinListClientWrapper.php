<?php

namespace App\Client;

use App\DTO\BinList\BinList;
use App\Exception\Client\EmptyResponseException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class BinListClientWrapper implements BinListClientWrapperInterface
{

    public function __construct(
        private readonly ClientInterface $binListApiClient,
        private readonly SerializerInterface $serializer
    ) {
    }

    public function getBinList(string $binMask): BinList
    {
        try {
            $response = $this->binListApiClient->get($binMask);
            $rawResponse = $response->getBody()->getContents();
            if (empty($rawResponse)) {
                throw new EmptyResponseException();
            }

            return $this->serializer->deserialize($rawResponse, BinList::class, JsonEncoder::FORMAT);
        } catch (RequestException) {
            return new BinList();
        }
    }
}