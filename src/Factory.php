<?php

namespace Ionut\Currency;


use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\Cache;
use Ionut\Currency\Rates\EuropeanCentralBank;

class Factory
{
    /**
     * @param  Cache|null $cache
     * @return Exchanger
     */
    public function create(Cache $cache = null)
    {
        return new Exchanger(
            new EuropeanCentralBank(
                new Downloader(
                    $cache ?: $this->buildDefaultCacheDriver()
                )
            )
        );
    }

    /**
     * @return ArrayCache
     */
    protected function buildDefaultCacheDriver()
    {
        return new ArrayCache;
    }
}