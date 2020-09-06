<?php

namespace PhpAddons\BcAssert\Tests\StaticAnalysis;

use PhpAddons\BcAssert\Assert;

/**
 * @psalm-pure
 */
function greaterThan(string $value, string $limit): string
{
    Assert::bcGreaterThan($value, $limit);

    return $value;
}

/**
 * @psalm-pure
 */
function nullOrGreaterThan(string $value, string $limit): string
{
    Assert::nullOrBcGreaterThan($value, $limit);

    return $value;
}

/**
 * @psalm-pure
 */
function allGreaterThan(string $value, string $limit): string
{
    Assert::allBcGreaterThan($value, $limit);

    return $value;
}
