<?php

namespace App\Controllers;

use App\Repositories\MYSQLTasksRepository;
use App\Repositories\TasksRepository;

class TasksController
{
    private TasksRepository $repository;

    public function __construct()
    {
        $config = require_once "config.php";
        $this->repository = new MYSQLTasksRepository($config);
    }

    public function showTasks()
    {

        $tasks = $this->repository->downloadTasks();

        require_once "app/Views/tasks.view.php";
    }

    public function addNewTask()
    {
        if(isset($_POST["submit"]))
        {
            $this->repository
                ->uploadNewTask($_POST["number"], $_POST["description"]);
        }

        header("Location:/tasks");
    }

    public function searchTask()
    {
        if(isset($_GET["search"]))
        {
            $search = $this->repository
                ->searchTask((int) $_GET["numberSearch"]);
        }
        require_once "app/Views/search.view.php";
    }

    public function deleteTask()
    {
        if(isset($_POST["delete"]))
        {
            $this->repository
                ->deleteTask($_POST["deleteNumber"]);
        }

        header("Location:/tasks");
    }
}