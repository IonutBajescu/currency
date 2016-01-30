<?php

namespace Ionut\Currency\Contracts;


interface Amount
{

    /**
     * @return float
     */
    public function getValue();

    /**
     * @return Currency
     */
    public function getCurrency();
}