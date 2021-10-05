<?php

namespace App\Controllers;

use App\Controllers\Repositories\CSVRepository;

class TasksController
{
    public function showTasks()
    {

        $tasks = (new CSVRepository("tasksDatabase.csv"))->downloadTasks();

        require_once "app/Views/tasks.view.php";
    }

    public function addNewTask()
    {
        if(isset($_POST["submit"]))
        {
            (new CSVRepository("tasksDatabase.csv"))
                ->uploadNewTask($_POST["number"], $_POST["description"]);
        }

        header("Location:/tasks");
    }

    public function searchTask()
    {
        if(isset($_GET["search"]))
        {
            $search = (new CSVRepository("tasksDatabase.csv"))
                ->searchTask((int) $_GET["numberSearch"]);
        }
        require_once "app/Views/search.view.php";
    }

    public function deleteTask()
    {
        if(isset($_POST["delete"]))
        {
            (new CSVRepository("tasksDatabase.csv"))
                ->deleteTask($_POST["deleteNumber"]);
        }

        header("Location:/tasks");
    }
}