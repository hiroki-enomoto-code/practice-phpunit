<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

use Queue;

final class QueueTest extends TestCase
{
    public function test_配列は空である(): Queue
    {
        $queue = new Queue();
        $this->assertSame(0, $queue->getSize());
        return $queue;
    }

    #[Depends('test_配列は空である')]
    public function test_配列に要素を追加できること(Queue $queue): Queue
    {
        $queue->push('item1');
        $this->assertSame(1, $queue->getSize());
        return $queue;
    }

    #[Depends('test_配列に要素を追加できること')]
    public function test_配列から要素を取り出せること(Queue $queue): void
    {
        $this->assertSame('item1', $queue->pop());
        $this->assertSame(0, $queue->getSize());
    }
}