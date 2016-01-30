<?php

namespace Ionut\Currency\Tests;

use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        parent::tearDown();
        \Mockery::close();
    }

    public function mock($abstract)
    {
        return \Mockery::mock($abstract);
    }
}