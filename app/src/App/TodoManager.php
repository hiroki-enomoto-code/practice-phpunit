<?php

declare(strict_types=1);

namespace App;

use App\Task;

final class TodoManager
{
    private array $tasks = [];

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function add(Task $task): void
    {
        $this->tasks[] = $task;
    }

    public function delete(string $id): void
    {
        $this->tasks = array_filter(
            $this->tasks,
            function(Task $task) use ($id){
                return $task->getId() !== $id;
            }
        );

        $this->tasks = array_values($this->tasks);
    }
}