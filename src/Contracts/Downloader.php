<?php

namespace Ionut\Currency\Contracts;


interface Downloader
{
    /**
     * Get the content of an URI.
     *
     * @return string
     */
    public function getContents($uri);
}