<?php

/**
 * provides type inference and auto-completion for magic static methods of Assert.
 */

namespace PhpAddons\BcAssert;

use Closure;
use Countable;
use InvalidArgumentException;
use Throwable;

interface Mixin
{
    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrBcSame(string $value, string $expect, string $message = '', ?int $scale = null): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function allBcSame(string $value, string $expect, string $message = '', ?int $scale = null): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrBcNotSame(string $value, string $expect, string $message = '', ?int $scale = null): void;

    /**
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function allBcNotSame(string $value, string $expect, string $message = '', ?int $scale = null): void;

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

    /**
     * Inclusive range, so Assert::('3', '3', '5') passes.
     *
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrBcRange(
        string $value,
        string $min,
        string $max,
        string $message = '',
        ?int $scale = null
    ): void;

    /**
     * Inclusive range, so Assert::('3', '3', '5') passes.
     *
     * @psalm-pure
     *
     * @throws InvalidArgumentException
     */
    public static function allBcRange(
        string $value,
        string $min,
        string $max,
        string $message = '',
        ?int $scale = null
    ): void;

    /**
     * @psalm-pure
     * @psalm-assert string $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function string($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert non-empty-string $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function stringNotEmpty($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert int $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function integer($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert numeric $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function integerish($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert float $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function float($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert numeric $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function numeric($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert int $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function natural($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert bool $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function boolean($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert scalar $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function scalar($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert object $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function object($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert resource $value
     *
     * @param mixed       $value
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function resource($value, $type = null, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert callable $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isCallable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert array $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isArray($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable $value
     *
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isTraversable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert array|ArrayAccess $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isArrayAccessible($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert countable $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isCountable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isIterable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert ExpectedType $value
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function isInstanceOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert !ExpectedType $value
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function notInstanceOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param mixed                $value
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @throws InvalidArgumentException
     */
    public static function isInstanceOfAny($value, array $classes, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert ExpectedType|class-string<ExpectedType> $value
     *
     * @param object|string $value
     * @param string        $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function isAOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template UnexpectedType of object
     * @psalm-param class-string<UnexpectedType> $class
     * @psalm-assert !UnexpectedType $value
     * @psalm-assert !class-string<UnexpectedType> $value
     *
     * @param object|string $value
     * @param string        $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function isNotA($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param object|string $value
     * @param string[]      $classes
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function isAnyOf($value, array $classes, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert empty $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isEmpty($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert !empty $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notEmpty($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function null($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert !null $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notNull($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert true $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function true($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert false $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function false($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert !false $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notFalse($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function ip($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function ipv4($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function ipv6($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function email($value, $message = '');

    /**
     * Does non strict comparisons on the items, so ['3', 3] will not pass the assertion.
     *
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function uniqueValues(array $values, $message = '');

    /**
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function eq($value, $expect, $message = '');

    /**
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notEq($value, $expect, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function same($value, $expect, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notSame($value, $expect, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function greaterThan($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function greaterThanEq($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function lessThan($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function lessThanEq($value, $limit, $message = '');

    /**
     * Inclusive range, so Assert::(3, 3, 5) passes.
     *
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $min
     * @param mixed  $max
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function range($value, $min, $max, $message = '');

    /**
     * A more human-readable alias of Assert::inArray().
     *
     * @psalm-pure
     *
     * @param mixed  $value
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function oneOf($value, array $values, $message = '');

    /**
     * Does strict comparison, so Assert::inArray(3, ['3']) does not pass the assertion.
     *
     * @psalm-pure
     *
     * @param mixed  $value
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function inArray($value, array $values, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $subString
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function contains($value, $subString, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $subString
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notContains($value, $subString, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notWhitespaceOnly($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $prefix
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function startsWith($value, $prefix, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $prefix
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notStartsWith($value, $prefix, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function startsWithLetter($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $suffix
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function endsWith($value, $suffix, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $suffix
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notEndsWith($value, $suffix, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $pattern
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function regex($value, $pattern, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $pattern
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notRegex($value, $pattern, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function unicodeLetters($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function alpha($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function digits($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function alnum($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert lowercase-string $value
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function lower($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert !lowercase-string $value
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function upper($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param int    $length
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function length($value, $length, $message = '');

    /**
     * Inclusive min.
     *
     * @psalm-pure
     *
     * @param string    $value
     * @param int|float $min
     * @param string    $message
     *
     * @throws InvalidArgumentException
     */
    public static function minLength($value, $min, $message = '');

    /**
     * Inclusive max.
     *
     * @psalm-pure
     *
     * @param string    $value
     * @param int|float $max
     * @param string    $message
     *
     * @throws InvalidArgumentException
     */
    public static function maxLength($value, $max, $message = '');

    /**
     * Inclusive , so Assert::lengthBetween('asd', 3, 5); passes the assertion.
     *
     * @psalm-pure
     *
     * @param string    $value
     * @param int|float $min
     * @param int|float $max
     * @param string    $message
     *
     * @throws InvalidArgumentException
     */
    public static function lengthBetween($value, $min, $max, $message = '');

    /**
     * Will also pass if $value is a directory, use Assert::file() instead if you need to be sure it is a file.
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function fileExists($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function file($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function directory($value, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function readable($value, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function writable($value, $message = '');

    /**
     * @psalm-assert class-string $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function classExists($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert class-string<ExpectedType>|ExpectedType $value
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function subclassOf($value, $class, $message = '');

    /**
     * @psalm-assert class-string $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function interfaceExists($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $interface
     * @psalm-assert class-string<ExpectedType> $value
     *
     * @param mixed  $value
     * @param mixed  $interface
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function implementsInterface($value, $interface, $message = '');

    /**
     * @psalm-pure
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param mixed         $property
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function propertyExists($classOrObject, $property, $message = '');

    /**
     * @psalm-pure
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param mixed         $property
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function propertyNotExists($classOrObject, $property, $message = '');

    /**
     * @psalm-pure
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param mixed         $method
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function methodExists($classOrObject, $method, $message = '');

    /**
     * @psalm-pure
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param mixed         $method
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function methodNotExists($classOrObject, $method, $message = '');

    /**
     * @psalm-pure
     *
     * @param array      $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws InvalidArgumentException
     */
    public static function keyExists($array, $key, $message = '');

    /**
     * @psalm-pure
     *
     * @param array      $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws InvalidArgumentException
     */
    public static function keyNotExists($array, $key, $message = '');

    /**
     * Checks if a value is a valid array key (int or string).
     *
     * @psalm-pure
     * @psalm-assert array-key $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function validArrayKey($value, $message = '');

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param Countable|array $array
     * @param int             $number
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function count($array, $number, $message = '');

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param Countable|array $array
     * @param int|float       $min
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function minCount($array, $min, $message = '');

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param Countable|array $array
     * @param int|float       $max
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function maxCount($array, $max, $message = '');

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param Countable|array $array
     * @param int|float       $min
     * @param int|float       $max
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function countBetween($array, $min, $max, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert list $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isList($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert non-empty-list $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isNonEmptyList($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param mixed|array<T> $array
     * @psalm-assert array<string, T> $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isMap($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param mixed|array<T> $array
     * @psalm-assert array<string, T> $array
     * @psalm-assert !empty $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isNonEmptyMap($array, $message = '');

    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function uuid($value, $message = '');

    /**
     * @psalm-param class-string<Throwable> $class
     *
     * @param Closure $expression
     * @param string  $class
     * @param string  $message
     *
     * @throws InvalidArgumentException
     */
    public static function throws(Closure $expression, $class = 'Exception', $message = '');
    /**
     * @psalm-pure
     * @psalm-assert null|string $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrString($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<string> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allString($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|non-empty-string $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrStringNotEmpty($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<non-empty-string> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allStringNotEmpty($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|int $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrInteger($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<int> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allInteger($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|numeric $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIntegerish($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<numeric> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIntegerish($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|float $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrFloat($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<float> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allFloat($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|numeric $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNumeric($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<numeric> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNumeric($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|int $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNatural($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<int> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNatural($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|bool $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrBoolean($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<bool> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allBoolean($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|scalar $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrScalar($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<scalar> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allScalar($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|object $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrObject($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<object> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allObject($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|resource $value
     *
     * @param mixed       $value
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrResource($value, $type = null, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<resource> $value
     *
     * @param mixed       $value
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function allResource($value, $type = null, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|callable $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsCallable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<callable> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsCallable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|array $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsArray($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<array> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsArray($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|iterable $value
     *
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsTraversable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<iterable> $value
     *
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsTraversable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|array|ArrayAccess $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsArrayAccessible($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<array|ArrayAccess> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsArrayAccessible($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|countable $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsCountable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<countable> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsCountable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|iterable $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsIterable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<iterable> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsIterable($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert null|ExpectedType $value
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsInstanceOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<ExpectedType> $value
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsInstanceOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotInstanceOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotInstanceOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param mixed                $value
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsInstanceOfAny($value, $classes, $message = '');

    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param mixed                $value
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsInstanceOfAny($value, $classes, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert null|ExpectedType|class-string<ExpectedType> $value
     *
     * @param null|object|string $value
     * @param string             $class
     * @param string             $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsAOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<ExpectedType|class-string<ExpectedType>> $value
     *
     * @param iterable<object|string> $value
     * @param string                  $class
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsAOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template UnexpectedType of object
     * @psalm-param class-string<UnexpectedType> $class
     *
     * @param null|object|string $value
     * @param string             $class
     * @param string             $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsNotA($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template UnexpectedType of object
     * @psalm-param class-string<UnexpectedType> $class
     *
     * @param iterable<object|string> $value
     * @param string                  $class
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsNotA($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param null|object|string $value
     * @param string[]           $classes
     * @param string             $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsAnyOf($value, $classes, $message = '');

    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param iterable<object|string> $value
     * @param string[]                $classes
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsAnyOf($value, $classes, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert empty $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsEmpty($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<empty> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsEmpty($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotEmpty($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotEmpty($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<null> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNull($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotNull($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|true $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrTrue($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<true> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allTrue($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|false $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrFalse($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<false> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allFalse($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotFalse($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotFalse($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIp($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIp($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIpv4($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIpv4($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIpv6($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIpv6($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrEmail($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allEmail($value, $message = '');

    /**
     * @param null|array $values
     * @param string     $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrUniqueValues($values, $message = '');

    /**
     * @param iterable<array> $values
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function allUniqueValues($values, $message = '');

    /**
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrEq($value, $expect, $message = '');

    /**
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allEq($value, $expect, $message = '');

    /**
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotEq($value, $expect, $message = '');

    /**
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotEq($value, $expect, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrSame($value, $expect, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allSame($value, $expect, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotSame($value, $expect, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $expect
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotSame($value, $expect, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrGreaterThan($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allGreaterThan($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrGreaterThanEq($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allGreaterThanEq($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrLessThan($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allLessThan($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrLessThanEq($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $limit
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allLessThanEq($value, $limit, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $min
     * @param mixed  $max
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrRange($value, $min, $max, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param mixed  $min
     * @param mixed  $max
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allRange($value, $min, $max, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrOneOf($value, $values, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allOneOf($value, $values, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrInArray($value, $values, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allInArray($value, $values, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $subString
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrContains($value, $subString, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $subString
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allContains($value, $subString, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $subString
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotContains($value, $subString, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $subString
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotContains($value, $subString, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotWhitespaceOnly($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotWhitespaceOnly($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $prefix
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrStartsWith($value, $prefix, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $prefix
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allStartsWith($value, $prefix, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $prefix
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotStartsWith($value, $prefix, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $prefix
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotStartsWith($value, $prefix, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrStartsWithLetter($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allStartsWithLetter($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $suffix
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrEndsWith($value, $suffix, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $suffix
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allEndsWith($value, $suffix, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $suffix
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotEndsWith($value, $suffix, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $suffix
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotEndsWith($value, $suffix, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $pattern
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrRegex($value, $pattern, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $pattern
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allRegex($value, $pattern, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $pattern
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrNotRegex($value, $pattern, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $pattern
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allNotRegex($value, $pattern, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrUnicodeLetters($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allUnicodeLetters($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrAlpha($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allAlpha($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrDigits($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allDigits($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrAlnum($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allAlnum($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|lowercase-string $value
     *
     * @param null|string $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrLower($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<lowercase-string> $value
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allLower($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrUpper($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allUpper($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param int         $length
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrLength($value, $length, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param int              $length
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allLength($value, $length, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param int|float   $min
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrMinLength($value, $min, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param int|float        $min
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allMinLength($value, $min, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param int|float   $max
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrMaxLength($value, $max, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param int|float        $max
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allMaxLength($value, $max, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param int|float   $min
     * @param int|float   $max
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrLengthBetween($value, $min, $max, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param int|float        $min
     * @param int|float        $max
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allLengthBetween($value, $min, $max, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrFileExists($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allFileExists($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrFile($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allFile($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrDirectory($value, $message = '');

    /**
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allDirectory($value, $message = '');

    /**
     * @param null|string $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrReadable($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allReadable($value, $message = '');

    /**
     * @param null|string $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrWritable($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allWritable($value, $message = '');

    /**
     * @psalm-assert null|class-string $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrClassExists($value, $message = '');

    /**
     * @psalm-assert iterable<class-string> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allClassExists($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert null|class-string<ExpectedType>|ExpectedType $value
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrSubclassOf($value, $class, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<class-string<ExpectedType>|ExpectedType> $value
     *
     * @param mixed         $value
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function allSubclassOf($value, $class, $message = '');

    /**
     * @psalm-assert null|class-string $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrInterfaceExists($value, $message = '');

    /**
     * @psalm-assert iterable<class-string> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allInterfaceExists($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $interface
     * @psalm-assert null|class-string<ExpectedType> $value
     *
     * @param mixed  $value
     * @param mixed  $interface
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrImplementsInterface($value, $interface, $message = '');

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $interface
     * @psalm-assert iterable<class-string<ExpectedType>> $value
     *
     * @param mixed  $value
     * @param mixed  $interface
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allImplementsInterface($value, $interface, $message = '');

    /**
     * @psalm-pure
     * @psalm-param null|class-string|object $classOrObject
     *
     * @param null|string|object $classOrObject
     * @param mixed              $property
     * @param string             $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrPropertyExists($classOrObject, $property, $message = '');

    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param mixed                   $property
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     */
    public static function allPropertyExists($classOrObject, $property, $message = '');

    /**
     * @psalm-pure
     * @psalm-param null|class-string|object $classOrObject
     *
     * @param null|string|object $classOrObject
     * @param mixed              $property
     * @param string             $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrPropertyNotExists($classOrObject, $property, $message = '');

    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param mixed                   $property
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     */
    public static function allPropertyNotExists($classOrObject, $property, $message = '');

    /**
     * @psalm-pure
     * @psalm-param null|class-string|object $classOrObject
     *
     * @param null|string|object $classOrObject
     * @param mixed              $method
     * @param string             $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrMethodExists($classOrObject, $method, $message = '');

    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param mixed                   $method
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     */
    public static function allMethodExists($classOrObject, $method, $message = '');

    /**
     * @psalm-pure
     * @psalm-param null|class-string|object $classOrObject
     *
     * @param null|string|object $classOrObject
     * @param mixed              $method
     * @param string             $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrMethodNotExists($classOrObject, $method, $message = '');

    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param mixed                   $method
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     */
    public static function allMethodNotExists($classOrObject, $method, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|array $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrKeyExists($array, $key, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<array> $array
     * @param string|int      $key
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function allKeyExists($array, $key, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|array $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrKeyNotExists($array, $key, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<array> $array
     * @param string|int      $key
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function allKeyNotExists($array, $key, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|array-key $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrValidArrayKey($value, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<array-key> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allValidArrayKey($value, $message = '');

    /**
     * @param null|Countable|array $array
     * @param int                  $number
     * @param string               $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrCount($array, $number, $message = '');

    /**
     * @param iterable<Countable|array> $array
     * @param int                       $number
     * @param string                    $message
     *
     * @throws InvalidArgumentException
     */
    public static function allCount($array, $number, $message = '');

    /**
     * @param null|Countable|array $array
     * @param int|float            $min
     * @param string               $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrMinCount($array, $min, $message = '');

    /**
     * @param iterable<Countable|array> $array
     * @param int|float                 $min
     * @param string                    $message
     *
     * @throws InvalidArgumentException
     */
    public static function allMinCount($array, $min, $message = '');

    /**
     * @param null|Countable|array $array
     * @param int|float            $max
     * @param string               $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrMaxCount($array, $max, $message = '');

    /**
     * @param iterable<Countable|array> $array
     * @param int|float                 $max
     * @param string                    $message
     *
     * @throws InvalidArgumentException
     */
    public static function allMaxCount($array, $max, $message = '');

    /**
     * @param null|Countable|array $array
     * @param int|float            $min
     * @param int|float            $max
     * @param string               $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrCountBetween($array, $min, $max, $message = '');

    /**
     * @param iterable<Countable|array> $array
     * @param int|float                 $min
     * @param int|float                 $max
     * @param string                    $message
     *
     * @throws InvalidArgumentException
     */
    public static function allCountBetween($array, $min, $max, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|list $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsList($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<list> $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsList($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert null|non-empty-list $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsNonEmptyList($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-assert iterable<non-empty-list> $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsNonEmptyList($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param null|mixed|array<T> $array
     * @psalm-assert null|array<string, T> $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsMap($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param iterable<mixed|array<T>> $array
     * @psalm-assert iterable<array<string, T>> $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsMap($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param null|mixed|array<T> $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrIsNonEmptyMap($array, $message = '');

    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param iterable<mixed|array<T>> $array
     *
     * @param mixed  $array
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function allIsNonEmptyMap($array, $message = '');

    /**
     * @psalm-pure
     *
     * @param null|string $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrUuid($value, $message = '');

    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     */
    public static function allUuid($value, $message = '');

    /**
     * @psalm-param class-string<Throwable> $class
     *
     * @param null|Closure $expression
     * @param string       $class
     * @param string       $message
     *
     * @throws InvalidArgumentException
     */
    public static function nullOrThrows($expression, $class = 'Exception', $message = '');

    /**
     * @psalm-param class-string<Throwable> $class
     *
     * @param iterable<Closure> $expression
     * @param string            $class
     * @param string            $message
     *
     * @throws InvalidArgumentException
     */
    public static function allThrows($expression, $class = 'Exception', $message = '');
}
