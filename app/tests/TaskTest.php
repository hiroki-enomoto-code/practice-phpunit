<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Task;

final class TaskTest extends TestCase
{
    public function test_タスクをタイトル付きで作成できる(): void
    {
        $task = new Task('タイトル');
        $this->assertSame(('タイトル'), $task->getTitle());
    }

    public function test_タスクをタイトルなしでは作成できない(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $task = new Task();
    }

    public function test_タスクを空文字のタイトルでは作成できない(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $task = new Task('  ');
    }

    public function test_タスクにはユニークなIDが割り当てられる(): void
    {
        $task1 = new Task('タイトル1');
        $task2 = new Task('タイトル2');

        $this->assertNotSame($task1->getId(), $task2->getId());
    }
}