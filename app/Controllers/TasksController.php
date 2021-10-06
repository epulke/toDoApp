<?php

namespace App\Controllers;

use App\Controllers\Repositories\CSVRepository;
use App\Controllers\Repositories\MYSQLRepository;

class TasksController
{
    public function showTasks()
    {

        $tasks = (new MYSQLRepository())->downloadTasks();

        require_once "app/Views/tasks.view.php";
    }

    public function addNewTask()
    {
        if(isset($_POST["submit"]))
        {
            (new MYSQLRepository())
                ->uploadNewTask($_POST["number"], $_POST["description"]);
        }

        header("Location:/tasks");
    }

    public function searchTask()
    {
        if(isset($_GET["search"]))
        {
            $search = (new MYSQLRepository())
                ->searchTask((int) $_GET["numberSearch"]);
        }
        require_once "app/Views/search.view.php";
    }

    public function deleteTask()
    {
        if(isset($_POST["delete"]))
        {
            (new MYSQLRepository())
                ->deleteTask($_POST["deleteNumber"]);
        }

        header("Location:/tasks");
    }
}