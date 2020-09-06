<?php

namespace PhpAddons\BcAssert\Tests\StaticAnalysis;

use PhpAddons\BcAssert\Assert;

/**
 * @psalm-pure
 */
function greaterThanEq(string $value, string $limit): string
{
    Assert::bcGreaterThanEq($value, $limit);

    return $value;
}

/**
 * @psalm-pure
 */
function nullOrGreaterThanEq(string $value, string $limit): string
{
    Assert::nullOrBcGreaterThanEq($value, $limit);

    return $value;
}

/**
 * @psalm-pure
 */
function allGreaterThanEq(string $value, string $limit): string
{
    Assert::allBcGreaterThanEq($value, $limit);

    return $value;
}
