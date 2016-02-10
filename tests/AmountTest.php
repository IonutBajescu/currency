<?php

namespace Ionut\Currency\Tests;


use Ionut\Currency\Amount;

class AmountTest extends TestCase
{
    public function testAutomatedObjectValueConversion()
    {
        new Amount(20, 'USD');
    }
}