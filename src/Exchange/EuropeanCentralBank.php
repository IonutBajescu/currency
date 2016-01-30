<?php

namespace Ionut\Currency\Exchange;


use Ionut\Currency\Contracts\Currency;
use Ionut\Currency\Contracts\Downloader;
use Ionut\Currency\Contracts\Exchanges;

class EuropeanCentralBank implements Exchanges
{

    const URI = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';

    /**
     * @var string
     */
    protected $rates;

    public function __construct(Downloader $downloader)
    {
        $this->rates = $downloader->getContents(static::URI);
    }

    public function getRate(Currency $fromCurrency, Currency $toCurrency)
    {
        $xml = simplexml_load_file($this->file->getContent());
    }
}