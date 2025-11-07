<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../libs/functions.php';

final class FunctionsTest extends TestCase
{
    public function testAddInteger(): void
    {
        $this->assertSame(5, addInteger(2, 3));
    }
}