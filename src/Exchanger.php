<?php

namespace Ionut\Currency;

use Ionut\Currency\Contracts\Amount as AmountContract;
use Ionut\Currency\Contracts\Currency as CurrencyContract;
use Ionut\Currency\Contracts\ExchangeRates as ExchangeRatesContract;

class Exchanger implements \Ionut\Currency\Contracts\Exchanger
{
    /**
     * @var ExchangeRatesContract
     */
    protected $rates;

    /**
     * @param ExchangeRatesContract $rates
     */
    public function __construct(ExchangeRatesContract $rates)
    {
        $this->rates = $rates;
    }

    /**
     * Convert an amount to another currency based on the exchange rates of the exchanger.
     *
     * @param  AmountContract           $amount
     * @param  CurrencyContract|string  $toCurrency
     * @return AmountContract
     */
    public function convert(AmountContract $amount, $toCurrency)
    {
        $toCurrency = is_string($toCurrency) ? new Currency($toCurrency) : $toCurrency;

        $rate = $this->rates->getRate($amount->getCurrency(), $toCurrency);
        $converted = $amount->getValue() / $rate;

        $abstract = get_class($amount);
        return new $abstract($converted, $toCurrency);
    }
}