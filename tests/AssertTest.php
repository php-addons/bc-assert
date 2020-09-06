<?php

namespace PhpAddons\BcAssert\Tests;

use ArrayIterator;
use InvalidArgumentException;
use PhpAddons\BcAssert\Assert;
use PHPUnit\Framework\TestCase;

class AssertTest extends TestCase
{
    public function getTests(): array
    {
        return [
            ['bcSame', ['1.23', '1.23'], 2, null, true],
            ['bcSame', ['1.234', '1.235'], 2, null, true],
            ['bcSame', ['1.23', '1.24'], 2, null, false],
            ['bcSame', ['1.23', '1.24'], 1, null, true],
            ['bcSame', ['1.23', '1.24'], 1, 2, false],
            ['bcSame', ['1.23', '1.24'], 2, 1, true],
            ['bcSame', ['1.23', '1.24'], 2, 0, true],
            ['bcSame', ['not_numeric', '1.24'], 2, null, false],
            ['bcSame', ['1.23', 'not_numeric'], 2, null, false],
            ['bcSame', ['not_numeric', 'not_numeric'], 2, null, false],
            ['bcNotSame', ['1.23', '1.23'], 2, null, false],
            ['bcNotSame', ['1.23', '1.23'], 2, 0, false],
            ['bcNotSame', ['1.234', '1.235'], 2, null, false],
            ['bcNotSame', ['1.23', '1.24'], 2, null, true],
            ['bcNotSame', ['1.23', '1.24'], 1, null, false],
            ['bcNotSame', ['1.23', '1.24'], 1, 2, true],
            ['bcNotSame', ['1.23', '1.24'], 2, 1, false],
            ['bcNotSame', ['not_numeric', '1.24'], 2, null, false],
            ['bcNotSame', ['1.23', 'not_numeric'], 2, null, false],
            ['bcNotSame', ['not_numeric', 'not_numeric'], 2, null, false],
            ['bcGreaterThan', ['1.23', '1.23'], 2, null, false],
            ['bcGreaterThan', ['1.234', '1.235'], 2, null, false],
            ['bcGreaterThan', ['1.23', '1.24'], 2, null, false],
            ['bcGreaterThan', ['1.24', '1.23'], 2, null, true],
            ['bcGreaterThan', ['1.24', '1.23'], 1, null, false],
            ['bcGreaterThan', ['1.24', '1.23'], 1, 2, true],
            ['bcGreaterThan', ['1.24', '1.23'], 2, 1, false],
            ['bcGreaterThan', ['1.24', '1.23'], 2, 0, false],
            ['bcGreaterThan', ['not_numeric', '1.24'], 2, null, false],
            ['bcGreaterThan', ['1.23', 'not_numeric'], 2, null, false],
            ['bcGreaterThan', ['not_numeric', 'not_numeric'], 2, null, false],
            ['bcGreaterThanEq', ['1.23', '1.23'], 2, null, true],
            ['bcGreaterThanEq', ['1.234', '1.235'], 2, null, true],
            ['bcGreaterThanEq', ['1.234', '1.235'], 2, 3, false],
            ['bcGreaterThanEq', ['1.235', '1.234'], 2, null, true],
            ['bcGreaterThanEq', ['1.23', '1.24'], 2, null, false],
            ['bcGreaterThanEq', ['1.24', '1.23'], 2, null, true],
            ['bcGreaterThanEq', ['1.23', '1.24'], 1, 2, false],
            ['bcGreaterThanEq', ['1.23', '1.24'], 2, 1, true],
            ['bcGreaterThanEq', ['1.23', '1.24'], 2, 0, true],
            ['bcGreaterThanEq', ['not_numeric', '1.24'], 2, null, false],
            ['bcGreaterThanEq', ['1.23', 'not_numeric'], 2, null, false],
            ['bcGreaterThanEq', ['not_numeric', 'not_numeric'], 2, null, false],
            ['bcLessThan', ['1.23', '1.23'], 2, null, false],
            ['bcLessThan', ['1.234', '1.235'], 2, null, false],
            ['bcLessThan', ['1.23', '1.24'], 2, null, true],
            ['bcLessThan', ['1.23', '1.24'], 1, null, false],
            ['bcLessThan', ['1.23', '1.24'], 1, 2, true],
            ['bcLessThan', ['1.23', '1.24'], 2, 1, false],
            ['bcLessThan', ['1.23', '1.24'], 2, 0, false],
            ['bcLessThan', ['not_numeric', '1.24'], 2, null, false],
            ['bcLessThan', ['1.23', 'not_numeric'], 2, null, false],
            ['bcLessThan', ['not_numeric', 'not_numeric'], 2, null, false],
            ['bcLessThanEq', ['1.23', '1.23'], 2, null, true],
            ['bcLessThanEq', ['1.235', '1.234'], 2, null, true],
            ['bcLessThanEq', ['1.235', '1.234'], 2, 3, false],
            ['bcLessThanEq', ['1.234', '1.235'], 2, null, true],
            ['bcLessThanEq', ['1.24', '1.23'], 2, null, false],
            ['bcLessThanEq', ['1.23', '1.24'], 2, null, true],
            ['bcLessThanEq', ['1.24', '1.23'], 1, 2, false],
            ['bcLessThanEq', ['1.24', '1.23'], 2, 1, true],
            ['bcLessThanEq', ['1.24', '1.23'], 2, 0, true],
            ['bcLessThanEq', ['not_numeric', '1.24'], 2, null, false],
            ['bcLessThanEq', ['1.23', 'not_numeric'], 2, null, false],
            ['bcLessThanEq', ['not_numeric', 'not_numeric'], 2, null, false],
            ['bcRange', ['1.23', '1.23', '1.25'], 2, null, true],
            ['bcRange', ['1.24', '1.23', '1.25'], 2, null, true],
            ['bcRange', ['1.25', '1.23', '1.25'], 2, null, true],
            ['bcRange', ['1.22', '1.23', '1.25'], 2, null, false],
            ['bcRange', ['1.26', '1.23', '1.25'], 2, null, false],
            ['bcRange', ['1.23', '1.23', '1.23'], 2, null, true],
            ['bcRange', ['1.233', '1.234', '1.235'], 2, null, true],
            ['bcRange', ['1.232', '1.234', '1.235'], 2, null, true],
            ['bcRange', ['1.236', '1.234', '1.235'], 2, null, true],
            ['bcRange', ['1.220', '1.234', '1.235'], 2, null, false],
            ['bcRange', ['1.240', '1.234', '1.235'], 2, null, false],
            ['bcRange', ['1.22', '1.23', '1.25'], 2, 1, true],
            ['bcRange', ['1.26', '1.23', '1.25'], 2, 1, true],
            ['bcRange', ['1.26', '1.23', '1.25'], 2, 0, true],
            ['bcRange', ['1.22', '1.23', '1.25'], 1, 2, false],
            ['bcRange', ['1.26', '1.23', '1.25'], 1, 2, false],
            ['bcRange', ['not_numeric', '1.24', '1.25'], 2, null, false],
            ['bcRange', ['1.23', 'not_numeric', '1.25'], 2, null, false],
            ['bcRange', ['1.23', '1.24', 'not_numeric'], 2, null, false],
            ['bcRange', ['not_numeric', 'not_numeric', 'not_numeric'], 2, null, false],
        ];
    }

    public function getMethods(): array
    {
        $methods = [];

        foreach ($this->getTests() as $params) {
            $methods[$params[0]] = [$params[0]];
        }

        return array_values($methods);
    }

    /**
     * @dataProvider getTests
     */
    public function testAssert(string $method, array $args, int $currentScale, ?int $scale, bool $success): void
    {
        bcscale($currentScale);

        if ($scale !== null) {
            $args = array_merge($args, ['', $scale]);
        }

        if (!$success) {
            $this->expectException(InvalidArgumentException::class);
        }

        call_user_func_array([Assert::class, $method], $args);
        $this->addToAssertionCount(1);
    }

    /**
     * @dataProvider getTests
     */
    public function testNullOr(string $method, array $args, int $currentScale, ?int $scale, bool $success): void
    {
        bcscale($currentScale);

        if ($scale !== null) {
            $args = array_merge($args, ['', $scale]);
        }

        if (!$success && null !== reset($args)) {
            $this->expectException(InvalidArgumentException::class);
        }

        call_user_func_array([Assert::class, 'nullOr'.ucfirst($method)], $args);
        $this->addToAssertionCount(1);
    }

    /**
     * @dataProvider getMethods
     */
    public function testNullOrAcceptsNull(string $method): void
    {
        call_user_func([Assert::class, 'nullOr'.ucfirst($method)], null);
        $this->addToAssertionCount(1);
    }

    /**
     * @dataProvider getTests
     */
    public function testAllArray(string $method, array $args, int $currentScale, ?int $scale, bool $success): void
    {
        bcscale($currentScale);

        if ($scale !== null) {
            $args = array_merge($args, ['', $scale]);
        }

        if (!$success) {
            $this->expectException(InvalidArgumentException::class);
        }

        $arg = array_shift($args);
        array_unshift($args, [$arg]);

        call_user_func_array([Assert::class, 'all'.ucfirst($method)], $args);
        $this->addToAssertionCount(1);
    }

    /**
     * @dataProvider getTests
     */
    public function testAllTraversable(string $method, array $args, int $currentScale, ?int $scale, bool $success): void
    {
        bcscale($currentScale);

        if ($scale !== null) {
            $args = array_merge($args, ['', $scale]);
        }

        if (!$success) {
            $this->expectException(InvalidArgumentException::class);
        }

        $arg = array_shift($args);
        array_unshift($args, new ArrayIterator([$arg]));

        call_user_func_array([Assert::class, 'all'.ucfirst($method)], $args);
        $this->addToAssertionCount(1);
    }
}
