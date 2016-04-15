<?php

namespace Ionut\Currency\Tests;


use Ionut\Currency\Exchanger;
use Ionut\Currency\Factory;

class FactoryTest extends TestCase
{
    public function testBuildingNormalExchanger()
    {
        $factory = new Factory();
        $this->assertInstanceOf(Exchanger::class, $factory->create());
    }
}