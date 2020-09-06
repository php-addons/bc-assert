<?php

namespace PhpAddons\BcAssert\Tests\StaticAnalysis;

use PhpAddons\BcAssert\Assert;

/**
 * @psalm-pure
 */
function bcNotSame(string $value, string $expect): string
{
    Assert::bcNotSame($value, $expect);

    return $value;
}

/**
 * @psalm-pure
 */
function nullOrBcNotSame(string $value, string $expect): string
{
    Assert::nullOrBcNotSame($value, $expect);

    return $value;
}

/**
 * @psalm-pure
 */
function allBcNotSame(string $value, string $expect): string
{
    Assert::allBcNotSame($value, $expect);

    return $value;
}
