# Ionut\Currency

[![Total Downloads](https://poser.pugx.org/ionut/currency/d/total.svg)](https://packagist.org/packages/ionut/currency)
[![Latest Stable Version](https://poser.pugx.org/ionut/currency/v/stable.svg)](https://packagist.org/packages/ionut/currency)
[![Latest Unstable Version](https://poser.pugx.org/ionut/currency/v/unstable.svg)](https://packagist.org/packages/ionut/currency)
[![License](https://poser.pugx.org/ionut/currency/license.svg)](https://packagist.org/packages/ionut/currency)

Currency is a currency exchanger written in PHP that aims for ease of use and completely independency of any frameworks or CMSs.

So far, it provides an out of the box service provider for Laravel. But besides that, the library is completely framework agnostic and it'll stay like this for the time being.

## Starting out

Let's say you want to convert $20.5 to EUR by using the latest rates provided by the European Central Bank, the code accomplishing that will look like this:
```php
// Replace the cache with one that suits your use-case better
$cache = new ArrayCache;
$exchanger = new Exchanger(
    new EuropeanCentralBank(
        new Downloader($cache)
    )
);

$usdAmount = new Amount(20.5, 'USD');
$eurAmount = $exchanger->convert($usdAmount, new Currency('EUR'));
```

## Intermediate Usage

As you can see in the previous example, the currency's power comes from three main parts:
- The Exchanger, the guy that converts the numbers by applying first grade math.
- The ExchangeRates whose implementation is the EuropeanCentralBank class in this example, that provides the exchanger with the latest exchange rates.
- The Downloader, the guy that comes and helps the ExchangeRates implementation with files downloading and caching power.

By remembering those and keeping in mind that the library fully respects the interfaces found in the `Contracts` namespace, you should be able to master everything there is to know about this library and write meaningful code with it.

## Contracts
Because libraries die more often that one would expect, Currency provides the developer with Contracts for every of the Currency's class, allowing his code to remain SOLID while using the best currency conversion library there is.

## Tests
The present library is fully tested, contributors are welcome to check the aforementioned tests in the `tests` folder and run them by calling PHPUnit.

## License
The present package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).