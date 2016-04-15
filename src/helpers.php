<?php

use Ionut\Currency\Amount;
use Ionut\Currency\Chaining;
use Ionut\Currency\Factory;
use Ionut\Currency\Contracts\Currency as CurrencyContract;

/**
 * @param  float  $amount
 * @param  string|CurrencyContract  $currency
 * @return Chaining
 */
function currency($amount, $currency)
{
    static $exchanger;

    if (!$exchanger) {
        $exchanger = (new Factory)->create();
    }

    return new Chaining(
        new Amount($amount, $currency),
        $exchanger
    );
}