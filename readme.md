# Ionut\Currency

[![Latest Stable Version](https://poser.pugx.org/ionut/currency/v/stable.svg)](https://packagist.org/packages/ionut/currency)
[![Build Status](https://img.shields.io/travis/IonutBajescu/currency/master.svg?style=flat-square)](https://travis-ci.org/IonutBajescu/currency)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/IonutBajescu/currency.svg?style=flat-square)](https://scrutinizer-ci.com/g/IonutBajescu/currency/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/IonutBajescu/currency.svg?style=flat-square)](https://scrutinizer-ci.com/g/IonutBajescu/currency)
[![Total Downloads](https://poser.pugx.org/ionut/currency/d/total.svg)](https://packagist.org/packages/ionut/currency)
[![License](https://poser.pugx.org/ionut/currency/license.svg)](https://packagist.org/packages/ionut/currency)

Currency is a currency exchanger written in PHP that aims for ease of use and complete independence of any frameworks or CMSs.

Besides being fully unit-tested and well written, it is also one of the few libraries(if not the only) that uses the European Central Bank rates.
This does not only mean that you get the conversion rates for free but also that you do not tie one of the core responsibilities of your application to a fragile third-party service.

So far, it provides an out of the box service provider for Laravel. But besides that, the library is completely framework agnostic and it'll stay like this for the foreseeable future.

## Starting out

Some applications do not need the complexity and verbosity of our OOP endeavours. For those, currency has a clean helper that would love to help you keep your code short.

Let's say you want to convert $20.5 to EUR by using the latest rates provided by the European Central Bank, the code accomplishing that will look like this:

```php
$eurAmount = currency(20.5, 'USD')->toEUR();
```

## Gain control of the exchanger's building

In case you don't fancy having helpers in your codebase you'll be happy to know that using the helper function is optional. Let's just rewrite the previous example and get rid of the helper:

```php
$exchanger = (new Ionut\Currency\Factory)->create();

$usdAmount = new Amount(20.5, 'USD');
$eurAmount = $exchanger->convert($usdAmount, 'EUR');
```

Of course, there's more code to write by using this approach. But such level of control couldn't be readily accomplished by using the helper function.

## Intermediate Usage

As seen in the previous example, there are three distinct parts which form the core of the Currency library:
<dl>
  <dt>Exchanger</dt>
  <dd>The guy that converts the numbers by applying first grade math.</dd>
  <dt>ExchangeRates</dt>
  <dd><i>Whose implementation is the EuropeanCentralBank guy in the example.</i> <br/>It provides the exchanger with the latest exchange rates.</dd>
  <dt>Downloader</dt>
  <dd>The guy that comes and helps ExchangeRates by downloading files and caching them locally. (for example an XML containing the exchange rates)</dd>
</dl>

By remembering those and keeping in mind that the library fully follows the interfaces found in the `Contracts` namespace, you should be able to master everything there is to know about this library.

## Contracts
Because libraries die more often that one would expect, Currency provides the developer with Contracts for every of the Currency's class, allowing his code to remain SOLID while using the best currency conversion library there is.

## Tests
The present library is fully unit-tested, contributors are welcome to check the aforementioned tests in the `tests` folder and run them by calling PHPUnit.

## License
The present package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).