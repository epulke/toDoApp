<?php

namespace App\Repositories;

use App\Models\Collections\TasksCollection;
use App\Models\Task;

interface TasksRepository
{
    public function downloadTasks(): TasksCollection;
    public function uploadNewTask(int $id, string $description): void;
    public function searchTask(int $id): Task;
    public function deleteTask(int $id): void;
}