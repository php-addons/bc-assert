# Bcmath Assert

[![Build Status](https://travis-ci.org/php-addons/bc-assert.svg?branch=master)](https://travis-ci.com/github/php-addons/bc-assert)

A wrapper around [webmozart/assert](https://github.com/webmozart/assert) that implements assertions with [bcmath](https://www.php.net/manual/en/ref.bc.php) functions.

**Required PHP 7.3.0 or above.**

### Installation
```shell script
composer require php-addons/bc-assert
```

### How to use

```php
use PhpAddons\BcAssert\Assert;

class Money
{
    public function __construct(string $value)
    {
        Assert::bcGreaterThan($value, '0', 'The money must be a positive number. Got: %s', 2);
    }
}
```
