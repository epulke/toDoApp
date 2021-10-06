<?php

namespace App\Repositories;

use App\Models\Collections\TasksCollection;
use App\Models\Task;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;

class CSVRepository implements Repository
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function downloadTasks(): TasksCollection
    {
        $csv = Reader::createFromPath($this->path, 'r');
        $stmt = Statement::create();
        $records = $stmt->process($csv);

        $collection = new TasksCollection();
        foreach ($records as $record) {
            $collection->addTask(new Task($record[0], $record[1]));
        }
        return $collection;
    }

    public function uploadNewTask(int $id, string $description): void
    {
        $task = new Task($id, $description);
        $writer = Writer::createFromPath($this->path, 'a+');
        $writer->insertOne($task->getTaskArray());
    }

    public function searchTask(int $id): Task
    {
        $collection = $this->downloadTasks();
        foreach ($collection->getTasks() as $task)
        {
            /** @var Task $task */
            if ($task->getNumber() === $id)
            {
                $search = $task;
            }
        }
        return $search;
    }

    public function deleteTask(int $id): void
    {
        $collection = $this->downloadTasks();

        $search = [];
        foreach ($collection->getTasks() as $task)
        {
            /** @var Task $task */
            if ($task->getNumber() !== $id)
            {
                $search[] = $task->getTaskArray();
            }
        }
        $writer = Writer::createFromPath($this->path, 'w+');
        $writer->insertAll($search);
    }
}