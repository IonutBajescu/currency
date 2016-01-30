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

    /**
     * @param  float     $value
     * @param  Currency  $currency
     */
    public function __construct($value, Currency $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    /**
     * Format the amount's value with grouped thousands.
     *
     * @param  int     $decimals
     * @param  string  $dec_point
     * @param  string  $thousands_sep
     * @return string
     */
    public function format($decimals = 0 , $dec_point = '.' , $thousands_sep = ',')
    {
        return number_format($this->value, $decimals, $dec_point, $thousands_sep);
    }

    /**
     * Get the difference between this amount and another float number.
     *
     * @param  float  $otherFloatNumber
     * @return number
     */
    public function difference($otherFloatNumber)
    {
        return abs(
            ($this->value - $otherFloatNumber)
            / $otherFloatNumber
        );
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