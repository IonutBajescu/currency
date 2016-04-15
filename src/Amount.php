<?php

namespace Ionut\Currency;

use Ionut\Currency\Contracts\Currency as CurrencyContract;

class Amount implements \Ionut\Currency\Contracts\Amount
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @var CurrencyContract
     */
    protected $currency;

    /**
     * @param  float                    $value
     * @param  string|CurrencyContract  $currency
     */
    public function __construct($value, $currency)
    {
        $this->value    = $value;
        $this->currency = is_string($currency) ? new Currency($currency) : $currency;
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
     * @return CurrencyContract
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

    /**
     * Alias to ->getValue()
     * 
     * @return string
     */
    public function plain()
    {
        return $this->getValue();
    }
}