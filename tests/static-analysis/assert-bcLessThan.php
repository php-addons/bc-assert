<?php

namespace PhpAddons\BcAssert\Tests\StaticAnalysis;

use PhpAddons\BcAssert\Assert;

/**
 * @psalm-pure
 */
function bcLessThan(string $value, string $limit): string
{
    Assert::bcLessThan($value, $limit);

    return $value;
}

/**
 * @psalm-pure
 */
function nullOrBcLessThan(string $value, string $limit): string
{
    Assert::nullOrBcLessThan($value, $limit);

    return $value;
}

/**
 * @psalm-pure
 */
function allBcLessThan(string $value, string $limit): string
{
    Assert::allBcLessThan($value, $limit);

    return $value;
}
