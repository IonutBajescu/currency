<?php

namespace Ionut\Currency\Integrations\Laravel;


use Doctrine\Common\Cache\FilesystemCache;
use Ionut\Currency\Contracts\Exchanger as ExchangerContract;
use Ionut\Currency\Downloader;
use Ionut\Currency\Exchanger;
use Ionut\Currency\Rates\EuropeanCentralBank;
use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(ExchangerContract::class, function () {
            $directory = storage_path('currency');

            if (!file_exists($directory)) {
                mkdir($directory);
            }

            $cache = new FilesystemCache($directory);

            return new Exchanger(
                new EuropeanCentralBank(
                    new Downloader($cache)
                )
            );
        });
    }
}