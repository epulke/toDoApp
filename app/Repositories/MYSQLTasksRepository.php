<?php

namespace App\Repositories;


use App\Models\Collections\TasksCollection;
use App\Models\Task;
use PDO;

class MYSQLTasksRepository implements TasksRepository
{
    private PDO $pdo;

    public function __construct($config)
    {
        $this->pdo = new PDO(
            $config["connection"].";dbname=".$config["name"],
            $config["username"],
            $config["password"],
            $config["options"]
        );

    }

    public function downloadTasks(): TasksCollection
    {
        $statement = $this->pdo->prepare("select * from Tasks");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $collection = new TasksCollection();

        foreach ($results as $item)
        {
            $collection->addTask(new Task($item["id"], $item["description"]));
        }

        return $collection;
    }

    public function uploadNewTask(int $id, string $description): void
    {
        $statement = $this->pdo->prepare("insert into Tasks (description) values (:description)");
        $statement->execute([
            ":description" => $description
        ]);
    }

    public function searchTask(int $id): Task
    {
        $statement = $this->pdo->prepare("select * from Tasks where id={$id}");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $search = new Task($results[0]["id"], $results[0]["description"]);
        return $search;
    }

    public function deleteTask(int $id): void
    {
        $statement = $this->pdo->prepare("delete from Tasks where id={$id}");
        $statement->execute();
    }
}
