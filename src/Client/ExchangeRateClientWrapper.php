<?php

namespace App\Client;

use App\DTO\ExchangeRate\ExchangeRate;
use GuzzleHttp\ClientInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class ExchangeRateClientWrapper implements ExchangeRateClientWrapperInterface
{
    private const string EXCHANGE_RATES_KEY = '?access_key=';

    public function __construct(
        private readonly ClientInterface $exchangeRateApiClient,
        private readonly SerializerInterface $serializer,
        private readonly string $exchangeRateApiKey,
    ) {
    }

    public function getExchangeRate(): ExchangeRate
    {
        $response = $this->exchangeRateApiClient->get(self::EXCHANGE_RATES_KEY . $this->exchangeRateApiKey);
        $rawResponse = $response->getBody()->getContents();
        if (empty($rawResponse)) {
            return new ExchangeRate();
        }


        return $this->serializer->deserialize($rawResponse, ExchangeRate::class, JsonEncoder::FORMAT);
    }
}