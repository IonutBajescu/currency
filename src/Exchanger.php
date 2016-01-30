<?php

namespace Ionut\Currency;


use Ionut\Currency\Contracts\Amount;
use Ionut\Currency\Contracts\Currency;
use Ionut\Currency\Contracts\ExchangeRates;

class Exchanger implements \Ionut\Currency\Contracts\Exchanger
{
    /**
     * @var ExchangeRates
     */
    protected $rates;

    /**
     * @param ExchangeRates $rates
     */
    public function __construct(ExchangeRates $rates)
    {
        $this->rates = $rates;
    }

    /**
     * Convert an amount to another currency based on the exchange rates of the exchanger.
     *
     * @param  Amount    $amount
     * @param  Currency  $toCurrency
     * @return Amount
     */
    public function convert(Amount $amount, Currency $toCurrency)
    {
        $rate = $this->rates->getRate($amount->getCurrency(), $toCurrency);
        $converted = $amount->getValue() / $rate;

        $abstract = get_class($amount);
        return new $abstract($converted, $toCurrency);
    }
}