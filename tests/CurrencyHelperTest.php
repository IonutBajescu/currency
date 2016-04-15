<?php

namespace Ionut\Currency\Tests;


class CurrencyHelperTest extends TestCase
{
    const FLOAT_PRECISION = .01;

    public function testBasicConversions()
    {
        $currency = currency(1, 'EUR');
        $this->assertNotEquals($currency->to('USD')->plain(), 1, '', static::FLOAT_PRECISION);
        $this->assertNotEquals($currency->toUSD()->plain(), 1, '', static::FLOAT_PRECISION);
        $this->assertEquals($currency->toUSD()->getCurrency()->getCode(), 'USD');
    }
}