# Bcmath Assert

[![Build Status](https://travis-ci.org/php-addons/bc-assert.svg?branch=master)](https://travis-ci.com/github/php-addons/bc-assert)

A wrapper around [webmozart/assert](https://github.com/webmozart/assert) that implements assertions with [bcmath](https://www.php.net/manual/en/ref.bc.php) functions.

**Required PHP 7.3.0 or above.**

Installation
----------
```shell script
composer require php-addons/bc-assert
```

How to use
----------

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

If the last parameter (`$scale`) is not set, the default scale from the system will be used.

Assertions
----------

The [`Assert`] class provides the following assertions:

### Comparison Assertions

Method                                                           | Description
---------------------------------------------------------------- | ------------------------------------------------------------------
`bcSame($value, $value2, $message = '', $scale = null)`          | Check that a value is identical to another (`bccomp($value, $value2, $scale) === 0`)
`bcNotSame($value, $value2, $message = '', $scale = null)`       | Check that a value is not identical to another (`bccomp($value, $value2, $scale) !== 0`)
`bcGreaterThan($value, $value2, $message = '', $scale = null)`   | Check that a value is greater than another
`bcGreaterThanEq($value, $value2, $message = '', $scale = null)` | Check that a value is greater than or equal to another
`bcLessThan($value, $value2, $message = '', $scale = null)`      | Check that a value is less than another
`bcLessThanEq($value, $value2, $message = '', $scale = null)`    | Check that a value is less than or equal to another
`bcRange($value, $min, $max, $message = '', $scale = null)`      | Check that a value is within a range

 
