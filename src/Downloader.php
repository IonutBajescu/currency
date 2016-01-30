<?php

namespace Ionut\Currency;


use Doctrine\Common\Cache\Cache;

class Downloader implements \Ionut\Currency\Contracts\Downloader
{
    /**
     * How many seconds should the value be kept in cache. Default: one hour.
     *
     * @var int
     */
    const CACHE_LIFETIME = 3600;

    /**
     * One of the Doctrine's wonderful cache drivers.
     *
     * @var Cache
     */
    protected $cache;

    /**
     * @param Cache $cache
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Get the content of an URI, in case we don't have it in cache already
     * we're going to download it.
     *
     * @param  string  $uri
     * @return string
     */
    public function getContents($uri)
    {
        if ( ! $this->cache->contains($uri)) {
            $this->cache->save($uri, $contents = $this->download($uri), static::CACHE_LIFETIME);
            return $contents;
        }

        return $this->cache->fetch($uri);
    }

    /**
     * Get the contents of an external URI.
     *
     * @param  string  $uri
     * @return string
     */
    protected function download($uri)
    {
        return file_get_contents($uri);
    }
}