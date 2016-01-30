<?php

namespace Ionut\Currency\Contracts;


interface Exchanges
{

    /**
     * Get the exchanging rate for two currencies.
     *
     * @param  Currency  $fromCurrency
     * @param  Currency  $toCurrency
     * @return float
     */
    public function getRate(Currency $fromCurrency, Currency $toCurrency);
}