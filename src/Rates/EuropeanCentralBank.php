<?php

namespace Ionut\Currency\Rates;


use Ionut\Currency\Contracts\Currency;
use Ionut\Currency\Contracts\Downloader;
use Ionut\Currency\Contracts\ExchangeRates;

class EuropeanCentralBank implements ExchangeRates
{

    /**
     * The URI that has the latest conversion rates.
     */
    const URI = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';

    /**
     * @var array
     */
    protected $rates;

    /**
     * @param Downloader $downloader
     */
    public function __construct(Downloader $downloader)
    {
        $this->rates = $this->getNormalizedRates($downloader);
    }

    /**
     * Get the conversion rate between two currencies.
     *
     * @param  Currency  $fromCurrency
     * @param  Currency  $toCurrency
     * @return float
     * @throws InvalidCurrencyException
     */
    public function getRate(Currency $fromCurrency, Currency $toCurrency)
    {
        return $this->getRelativeRate($fromCurrency) / $this->getRelativeRate($toCurrency);
    }

    /**
     * Get the exchange rate relative to the EUR currency.
     *
     * @param  Currency  $currency
     * @return float
     * @throws InvalidCurrencyException
     */
    public function getRelativeRate(Currency $currency)
    {
        $code = $currency->getCode();

        if (!isset($this->rates[$code])) {
            throw new InvalidCurrencyException("The currency with the code $code is not supported by ".get_class($this).".");
        }

        return $this->rates[$code];
    }


    /**
     * Normalize the ugly XML received from the European Central Bank into
     * a wonderful plain PHP array.
     *
     * @param  Downloader  $downloader
     * @return array
     */
    protected function getNormalizedRates(Downloader $downloader)
    {
        $xml = simplexml_load_string($downloader->getContents(static::URI));

        $rates = ['EUR' => 1];

        foreach ($xml->Cube->Cube->Cube as $Cube) {
            $rates[$Cube['currency']->__toString()] = (float)$Cube['rate']->__toString();
        }

        return $rates;
    }
}