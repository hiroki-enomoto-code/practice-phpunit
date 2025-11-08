<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\TodoManager;
use App\Task;

final class TodoManagerTest extends TestCase
{

    private TodoManager $manager;

    protected function setUp(): void
    {
        $this->manager = new TodoManager();
    }

    public function test_初期状態でタスクは空です(): void
    {
        $tasks = $this->manager->getTasks();
        $this->assertEmpty($tasks);
    }

    public function test_リストにタスクを追加することに成功する(): void
    {
        $task = new Task('タイトル');

        $this->manager->add($task);
        $tasks = $this->manager->getTasks();

        $this->assertCount(1, $tasks);
        $this->assertSame($task, $tasks[0]);
    }

    public function test_タスクのIDからタスクを削除できる(): void
    {
        $task1 = new Task('タイトル1');
        $task2 = new Task('タイトル2');
        $this->manager->add($task1);
        $this->manager->add($task2);

        $id = $task1->getId();
        $this->manager->delete($id);

        $tasks = $this->manager->getTasks();
        $this->assertCount(1, $tasks);
        $this->assertSame($task2, $tasks[0]);
    }
}