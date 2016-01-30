<?php

namespace Ionut\Currency\Contracts;


interface Exchanger
{

    /**
     * Convert an amount to another currency based on the exchange rates of the exchanger.
     *
     * @param  Amount    $amount
     * @param  Currency  $toCurrency
     * @return Currency
     */
    public function convert(Amount $amount, Currency $toCurrency);
}