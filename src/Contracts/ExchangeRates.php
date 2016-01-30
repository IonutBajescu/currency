<?php

namespace Ionut\Currency\Contracts;


use Ionut\Currency\Rates\InvalidCurrencyException;

interface ExchangeRates
{

    /**
     * Get the conversion rate between two currencies.
     *
     * @param  Currency  $fromCurrency
     * @param  Currency  $toCurrency
     * @return float
     * @throws InvalidCurrencyException
     */
    public function getRate(Currency $fromCurrency, Currency $toCurrency);
}