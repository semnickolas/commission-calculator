<?php

use App\DTO\BinList\BinList;
use App\DTO\BinList\Country;
use App\DTO\ExchangeRate\ExchangeRate;
use App\DTO\Order\Payment;
use App\Service\CalculatorInterface;
use App\Service\CommissionCalculator;
use PHPUnit\Framework\TestCase;

class CommissionCalculatorTest extends TestCase
{
    private CalculatorInterface $commissionCalculator;

    protected function setUp(): void
    {
        $this->commissionCalculator = new CommissionCalculator();
    }

    /**
     * @dataProvider commissionDataProvider
     */
    public function testCommissionCalculation(ExchangeRate $exchangeRate, BinList $binList, Payment $payment, float $expectedResult): void
    {
        $result = $this->commissionCalculator->calculate($exchangeRate, $binList, $payment);

        $this->assertEquals($expectedResult, $result);
    }


    public function commissionDataProvider(): array
    {
        return [
            'case1' => [
                'exchangeRate' => (new ExchangeRate())->setRates(['EUR']),
                'binList' => (new BinList())->setCountry((new Country())->setAlpha2('ES')),
                'payment' => (new Payment())->setAmount(100)->setCurrency('EUR'),
                'expectedResult' => 1.0
            ],
            'case2' => [
                'exchangeRate' => (new ExchangeRate())->setRates(['EUR']),
                'binList' => (new BinList())->setCountry((new Country())->setAlpha2('ZL')),
                'payment' => (new Payment())->setAmount(100)->setCurrency('EUR'),
                'expectedResult' => 2.0
            ],
            'case3' => [
                'exchangeRate' => (new ExchangeRate())->setRates(['AUD' => 0.5]),
                'binList' => (new BinList())->setCountry((new Country())->setAlpha2('MF')),
                'payment' => (new Payment())->setAmount(200)->setCurrency('AUD'),
                'expectedResult' => 8.0
            ],
            'case4' => [
                'exchangeRate' => (new ExchangeRate())->setRates(['USD' => 1.091995]),
                'binList' => (new BinList())->setCountry((new Country())->setAlpha2('MF')),
                'payment' => (new Payment())->setAmount(50)->setCurrency('USD'),
                'expectedResult' => 0.92
            ],
            'case5' => [
                'exchangeRate' => (new ExchangeRate())->setRates(['USD' => 1.091995]),
                'binList' => (new BinList())->setCountry((new Country())->setAlpha2('LT')),
                'payment' => (new Payment())->setAmount(50)->setCurrency('USD'),
                'expectedResult' => 0.46
            ],
        ];
    }
}