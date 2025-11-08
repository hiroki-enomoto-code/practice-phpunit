<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class FunctionsTest extends TestCase
{

    #[DataProvider('additionProvider')]
    public function testAddIntegers(int $a, int $b, int $expected):void
    {
        $this->assertSame($expected, addInteger($a, $b));
    }

    public static function additionProvider(): array
    {
        return [
            [2, 3, 5],
            [-2, -3, -5],
            [3, 0, 3],
        ];
    }
    
    public function testAddTwoPositiveIntegers(): void
    {
        $this->assertSame(5, addInteger(2, 3));
    }

    public function testAddTwoNegativeIntegers(): void
    {
        $this->assertSame(-5, addInteger(-2, -3));
    }
}