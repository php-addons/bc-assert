<?php

/**
 * provides type inference and auto-completion for magic static methods of Assert.
 */

namespace PhpAddons\BcAssert;

use InvalidArgumentException;

interface Mixin
{
    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrBcGreaterThan(
        string $value,
        string $limit,
        string $message = '',
        ?int $scale = null
    ): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function allBcGreaterThan(
        string $value,
        string $limit,
        string $message = '',
        ?int $scale = null
    ): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrBcGreaterThanEq(
        string $value,
        string $limit,
        string $message = '',
        ?int $scale = null
    ): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function allBcGreaterThanEq(
        string $value,
        string $limit,
        string $message = '',
        ?int $scale = null
    ): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrBcLessThan(
        string $value,
        string $limit,
        string $message = '',
        ?int $scale = null
    ): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function allBcLessThan(string $value, string $limit, string $message = '', ?int $scale = null): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrBcLessThanEq(
        string $value,
        string $limit,
        string $message = '',
        ?int $scale = null
    ): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function allBcLessThanEq(
        string $value,
        string $limit,
        string $message = '',
        ?int $scale = null
    ): void;
}
