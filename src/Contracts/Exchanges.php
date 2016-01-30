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

    /**
     * Download the files that contain the currencies rates, has to be called only once a day.
     */
    public function download();
}