# Ionut\Currency

[![Total Downloads](https://poser.pugx.org/ionut/currency/d/total.svg)](https://packagist.org/packages/ionut/currency)
[![Latest Stable Version](https://poser.pugx.org/ionut/currency/v/stable.svg)](https://packagist.org/packages/ionut/currency)
[![Latest Unstable Version](https://poser.pugx.org/ionut/currency/v/unstable.svg)](https://packagist.org/packages/ionut/currency)
[![License](https://poser.pugx.org/ionut/currency/license.svg)](https://packagist.org/packages/ionut/currency)

Currency is a currency exchanger written in PHP that aims for ease of use and completely independency of any frameworks or CMSs.

Besides being fully unit-tested and well written, it also is one of the few libraries(if not the only) that uses the European Central Bank rates.
This doesn't only mean that you get the conversion rates for free, it also means that you do not tie one of the core responsibilities of your application to a fragile third-party service.

So far, it provides an out of the box service provider for Laravel. But besides that, the library is completely framework agnostic and it'll stay like this for the foreseeable future.

## Starting out

Let's say you want to convert $20.5 to EUR by using the latest rates provided by the European Central Bank, the code accomplishing that will look like this:
```php
// Replace the cache driver with one that suits your situation better
$cache = new ArrayCache;
$exchanger = new Exchanger(
    new EuropeanCentralBank(
        new Downloader($cache)
    )
);

$usdAmount = new Amount(20.5, 'USD');
$eurAmount = $exchanger->convert($usdAmount, 'EUR');
```

## Intermediate Usage

As you can see in the previous example, there are three distinct parts which form the core of the Currency library:
<dl>
  <dt>Exchanger</dt>
  <dd>The guy that converts the numbers by applying first grade math.</dd>
  <dt>ExchangeRates</dt>
  <dd><i>Whose implementation is the EuropeanCentralBank guy in the example.</i> <br/>It provides the exchanger with the latest exchange rates.</dd>
  <dt>Downloader</dt>
  <dd>The guy that comes and helps the ExchangeRates implementation with downloading and caching power.</dd>
</dl>

By remembering those and keeping in mind that the library fully respects the interfaces found in the `Contracts` namespace, you should be able to master everything there is to know about this library and write meaningful code with it.

## Contracts
Because libraries die more often that one would expect, Currency provides the developer with Contracts for every of the Currency's class, allowing his code to remain SOLID while using the best currency conversion library there is.

## Tests
The present library is fully unit-tested, contributors are welcome to check the aforementioned tests in the `tests` folder and run them by calling PHPUnit.

## License
The present package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).