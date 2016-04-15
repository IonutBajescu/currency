<?php

namespace Ionut\Currency;

use Ionut\Currency\Contracts\Amount as AmountContract;
use Ionut\Currency\Contracts\Currency as CurrencyContract;
use Ionut\Currency\Contracts\Exchanger as ExchangerContract;

/**
 * @method AmountContract toUSD(string|CurrencyContract $toCurrency)
 * @method AmountContract toEUR(string|CurrencyContract $toCurrency)
 * @method AmountContract toGBP(string|CurrencyContract $toCurrency)
 * @method AmountContract toRON(string|CurrencyContract $toCurrency)
 */
class Chaining
{
    /**
     * @var AmountContract
     */
    protected $amount;

    /**
     * @var ExchangerContract
     */
    protected $exchanger;

    /**
     * @param  AmountContract     $amount
     * @param  ExchangerContract  $exchanger
     */
    public function __construct(AmountContract $amount, ExchangerContract $exchanger)
    {
        $this->amount = $amount;
        $this->exchanger = $exchanger;
    }

    /**
     * @param  string|CurrencyContract  $toCurrency
     * @return Contracts\Amount
     */
    public function to($toCurrency)
    {
        return $this->exchanger->convert($this->amount, $toCurrency);
    }

    /**
     * @param  string  $method
     * @param  array   $arguments
     * @return mixed
     */
    public function __call($method, array $arguments = [])
    {
        if (preg_match('/^to(.*?)$/', $method, $matches)) {
            return $this->to($matches[1]);
        }

        throw new \InvalidArgumentException("The $method method does not exist.");
    }
}