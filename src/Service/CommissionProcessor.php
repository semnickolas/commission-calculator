<?php

namespace App\Service;

use App\Client\BinListClientWrapperInterface;
use App\Client\ExchangeRateClientWrapperInterface;
use App\FileSystem\ReaderInterface;
use App\DTO\Order\Payment;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class CommissionProcessor implements CommissionProcessorInterface
{
    public function __construct(
        private readonly ReaderInterface $fileReader,
        private readonly SerializerInterface $serializer,
        private readonly BinListClientWrapperInterface $binListClient,
        private readonly ExchangeRateClientWrapperInterface $exchangeRateClient,
        private readonly CalculatorInterface $calculator,
    ) {
    }

    public function process(string $filename): \Generator
    {
        $this->fileReader->open($filename);
        $paymentRow = $this->fileReader->read($filename);

        while (!empty($paymentRow)) {
            $payment = $this->serializer->deserialize($paymentRow, Payment::class, JsonEncoder::FORMAT);
            $binList = $this->binListClient->getBinList($payment->getBin());
            $exchangeRate = $this->exchangeRateClient->getExchangeRate();

            yield $this->calculator->calculate($exchangeRate, $binList, $payment);

            $paymentRow = $this->fileReader->read($filename);
        }

        $this->fileReader->close();
    }
}