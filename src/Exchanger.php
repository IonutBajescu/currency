<?php

namespace Ionut\Currency;


use Ionut\Currency\Contracts\Amount;
use Ionut\Currency\Contracts\Currency;
use Ionut\Currency\Contracts\ExchangeRates;

class Exchanger
{
    /**
     * @var ExchangeRates
     */
    private $rates;

    public function __construct(ExchangeRates $rates)
    {
        $this->rates = $rates;
    }

    public function convert(Amount $amount, Currency $toCurrency)
    {
        $rate = $this->rates->getRate($amount->getCurrency(), $toCurrency);
        $converted = $amount->getValue() / $rate;

        $abstract = get_class($amount);
        return new $abstract($converted, $toCurrency);
    }
}