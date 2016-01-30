<?php

namespace Ionut\Currency;

use Ionut\Currency\Contracts\Currency;

class Amount implements \Ionut\Currency\Contracts\Amount
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @var Currency
     */
    protected $currency;

    public function __construct($value, Currency $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}