<?php

namespace PhpAddons\BcAssert\Tests\StaticAnalysis;

use PhpAddons\BcAssert\Assert;

/**
 * @psalm-pure
 */
function bcLessThanEq(string $value, string $limit): string
{
    Assert::bcLessThanEq($value, $limit);

    return $value;
}

/**
 * @psalm-pure
 */
function nullOrBcLessThanEq(string $value, string $limit): string
{
    Assert::nullOrBcLessThanEq($value, $limit);

    return $value;
}

/**
 * @psalm-pure
 */
function allBcLessThanEq(string $value, string $limit): string
{
    Assert::allBcLessThanEq($value, $limit);

    return $value;
}
