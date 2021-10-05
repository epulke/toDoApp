<?php

namespace App\Models\Collections;

use App\Models\Task;


class TasksCollection
{
    private array $tasks = [];

    public function __construct(array $tasks = [])
    {
        foreach ($tasks as $task) {
            if($task instanceof Task) $this->addTask($task);
        }
    }

    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

}