<?php

namespace Ionut\Currency\Contracts;


interface Currency
{
    /**
     * @return string
     */
    public function getCode();
}