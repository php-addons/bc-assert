# Bcmath Assert (extends Webmozart Assert)

Small library that implements assertions with bcmath functions.

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
