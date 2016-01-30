<?php

namespace Ionut\Currency\Exchange;


use Ionut\Currency\Contracts\Currency;
use Ionut\Currency\Contracts\Exchanges;

class EuropeanCentralBank implements Exchanges
{

    public function __construct()
    {

    }

    public function getRate(Currency $fromCurrency, Currency $toCurrency)
    {        // TODO: Implement getRate() method.

    }

    public function download()
    {

    }
}