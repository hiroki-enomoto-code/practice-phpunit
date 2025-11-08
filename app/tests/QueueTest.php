<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Queue;

final class QueueTest extends TestCase
{
    private Queue $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function test_配列は空である(): void
    {
        $this->assertSame(0, $this->queue->getSize());
    }

    public function test_配列に要素を追加できること(): void
    {
        $this->queue->push('item1');
        $this->assertSame(1, $this->queue->getSize());
    }

    public function test_配列から要素を取り出せること(): void
    {
        $this->queue->push('item1');
        $this->assertSame('item1', $this->queue->pop());
        $this->assertSame(0, $this->queue->getSize());
    }
}