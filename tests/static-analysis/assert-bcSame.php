<?php

namespace PhpAddons\BcAssert\Tests\StaticAnalysis;

use PhpAddons\BcAssert\Assert;

/**
 * @psalm-pure
 */
function bcSame(string $value, string $expect): string
{
    Assert::bcSame($value, $expect);

    return $value;
}

/**
 * @psalm-pure
 */
function nullOrBcSame(string $value, string $expect): string
{
    Assert::nullOrBcSame($value, $expect);

    return $value;
}

/**
 * @psalm-pure
 */
function allBcSame(string $value, string $expect): string
{
    Assert::allBcSame($value, $expect);

    return $value;
}
