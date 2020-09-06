<?php

namespace PhpAddons\BcAssert\Tests\StaticAnalysis;

use PhpAddons\BcAssert\Assert;

/**
 * @psalm-pure
 */
function bcRange(string $value, string $min, string $max): string
{
    Assert::bcRange($value, $min, $max);

    return $value;
}

/**
 * @psalm-pure
 */
function nullOrBcRange(string $value, string $min, string $max): string
{
    Assert::nullOrBcRange($value, $min, $max);

    return $value;
}

/**
 * @psalm-pure
 */
function allBcRange(string $value, string $min, string $max): string
{
    Assert::allBcRange($value, $min, $max);

    return $value;
}
