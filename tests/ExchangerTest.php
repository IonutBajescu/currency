<?php

namespace Ionut\Currency\Tests;


use Doctrine\Common\Cache\ArrayCache;
use Ionut\Currency\Amount;
use Ionut\Currency\Currency;
use Ionut\Currency\Downloader;
use Ionut\Currency\Exchanger;
use Ionut\Currency\Rates\EuropeanCentralBank;

class ExchangerTest extends TestCase
{

    const FLOAT_PRECISION = 0.00000001;

    public function testBasicExchanges()
    {
        $cache = new ArrayCache();
        $cache->save(EuropeanCentralBank::URI, file_get_contents(__DIR__.'/fixtures/eurofxref-daily.xml'));

        $exchanger = new Exchanger(new EuropeanCentralBank(new Downloader($cache)));

        $tenRON = new Amount(10, new Currency('RON'));
        $itsUSD = $exchanger->convert($tenRON, new Currency('USD'));

        $this->assertEquals($itsUSD->getValue(), 2.4078320691479984, '', static::FLOAT_PRECISION);
        $this->assertEquals($exchanger->convert($itsUSD, new Currency('RON'))->getValue(), $tenRON->getValue(), '', static::FLOAT_PRECISION);
    }
}