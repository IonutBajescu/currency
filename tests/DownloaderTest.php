<?php

namespace Ionut\Currency\Tests;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\Cache;
use Ionut\Currency\Downloader;

class DownloaderTest extends TestCase
{
    public function testPainGetContents()
    {
        $downloader = new Downloader(new ArrayCache);

        $this->assertSame($downloader->getContents('data:text/plain,heyworld'), 'heyworld');
    }

    public function testCachingOfGetContents()
    {
        $cache = $this->mock(ArrayCache::class)
            ->shouldReceive('contains')->once()->andReturn(false)
            ->shouldReceive('contains')->once()->andReturn(true)
            ->shouldReceive('fetch')->once()
            ->shouldReceive('save')->once()
            ->getMock();

        $downloader = new Downloader($cache);

        $downloader->getContents('data:text/plain,heyworld');
        $downloader->getContents('data:text/plain,heyworld');
    }
}