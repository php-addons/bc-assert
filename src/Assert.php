<?php

declare(strict_types=1);

namespace PhpAddons\BcAssert;

use InvalidArgumentException;
use Webmozart\Assert\Assert as WebmozartAssert;
use Webmozart\Assert\Mixin as WebmozartMixin;

/**
 * @mixin WebmozartMixin
 * @mixin Mixin
 *
 * @method static numeric($value, $message = '')
 * @method static isIterable($value, $message = '')
 */
final class Assert
{
    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function bcSame(string $value, string $expect, string $message = '', ?int $scale = null): void
    {
        static::numeric($value);
        static::numeric($expect);
        $bcScale = $scale ?? bcscale();

        if (bccomp($value, $expect, $bcScale) !== 0) {
            static::reportInvalidArgument(
                \sprintf($message ?: 'Expected a value identical to %2$s. Got: %s', $value, $expect)
            );
        }
    }

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function bcNotSame(string $value, string $expect, string $message = '', ?int $scale = null): void
    {
        static::numeric($value);
        static::numeric($expect);
        $bcScale = $scale ?? bcscale();

        if (bccomp($value, $expect, $bcScale) === 0) {
            static::reportInvalidArgument(
                \sprintf($message ?: 'Expected a value not identical to %s.', $expect)
            );
        }
    }

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function bcGreaterThan(string $value, string $limit, string $message = '', ?int $scale = null): void
    {
        static::numeric($value);
        static::numeric($limit);
        $bcScale = $scale ?? bcscale();

        if (bccomp($value, $limit, $bcScale) < 1) {
            static::reportInvalidArgument(
                \sprintf($message ?: 'Expected a value greater than %2$s. Got: %s', $value, $limit)
            );
        }
    }

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function bcGreaterThanEq(string $value, string $limit, string $message = '', ?int $scale = null): void
    {
        static::numeric($value);
        static::numeric($limit);
        $bcScale = $scale ?? bcscale();

        if (bccomp($value, $limit, $bcScale) === -1) {
            static::reportInvalidArgument(
                \sprintf($message ?: 'Expected a value greater than or equal to %2$s. Got: %s', $value, $limit)
            );
        }
    }

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function bcLessThan(string $value, string $limit, string $message = '', ?int $scale = null): void
    {
        static::numeric($value);
        static::numeric($limit);
        $bcScale = $scale ?? bcscale();

        if (bccomp($value, $limit, $bcScale) >= 0) {
            static::reportInvalidArgument(
                \sprintf($message ?: 'Expected a value less than %2$s. Got: %s', $value, $limit)
            );
        }
    }

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function bcLessThanEq(string $value, string $limit, string $message = '', ?int $scale = null): void
    {
        static::numeric($value);
        static::numeric($limit);
        $bcScale = $scale ?? bcscale();

        if (bccomp($value, $limit, $bcScale) === 1) {
            static::reportInvalidArgument(
                \sprintf($message ?: 'Expected a value less than or equal to %2$s. Got: %s', $value, $limit)
            );
        }
    }

    /**
     * Inclusive range, so Assert::('3', '3', '5') passes.
     *
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function bcRange(
        string $value,
        string $min,
        string $max,
        string $message = '',
        ?int $scale = null
    ): void {
        static::numeric($value);
        static::numeric($min);
        static::numeric($max);
        $bcScale = $scale ?? bcscale();

        if (bccomp($value, $min, $bcScale) === -1 || bccomp($value, $max, $bcScale) === 1) {
            static::reportInvalidArgument(
                \sprintf($message ?: 'Expected a value between %2$s and %3$s. Got: %s', $value, $min, $max)
            );
        }
    }

    public static function __callStatic($name, $arguments)
    {
        if (\strpos($name, 'nullOr') === 0) {
            if (null !== $arguments[0]) {
                $method = \lcfirst(\substr($name, 6));
                \call_user_func_array([static::class, $method], $arguments);
            }

            return;
        }

        if (\strpos($name, 'all') === 0) {
            static::isIterable($arguments[0]);

            $method = \lcfirst(\substr($name, 3));
            $args = $arguments;

            foreach ($arguments[0] as $entry) {
                $args[0] = $entry;

                \call_user_func_array([static::class, $method], $args);
            }

            return;
        }

        \call_user_func_array([WebmozartAssert::class, $name], $arguments);
    }

    /**
     * @throws InvalidArgumentException
     *
     * @psalm-pure
     */
    private static function reportInvalidArgument(string $message): void
    {
        throw new InvalidArgumentException($message);
    }

    private function __construct()
    {
    }
}
