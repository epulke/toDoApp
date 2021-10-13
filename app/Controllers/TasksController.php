<?php

namespace App\Controllers;

use App\Redirect;
use App\Repositories\MYSQLTasksRepository;
use App\Repositories\TasksRepository;
use App\View;

class TasksController
{
    private TasksRepository $repository;

    public function __construct()
    {
        $config = require_once "config.php";
        $this->repository = new MYSQLTasksRepository($config);
    }

    public function showTasks(): View
    {
        $tasks = $this->repository->downloadTasks();

        if (isset($_SESSION["userName"])) {
            $user = "Hello, " . $_SESSION["userName"] . "!";
        } else {
            $user ="";
        }

        $view = new View("tasks.view.twig", ["tasks" => $tasks->getTasks(), "user" => $user]);
        return $view;
    }

    public function addNewTask()
    {
        if(isset($_POST["submit"]))
        {
            $this->repository
                ->uploadNewTask($_POST["number"], $_POST["description"]);
        }

        Redirect::url("/tasks");
    }

    public function searchTask(): View
    {
        if(isset($_GET["search"]))
        {
            $search = $this->repository
                ->searchTask((int) $_GET["numberSearch"]);
        }
        $view = new View("search.view.twig", ["search" => $search]);
        return $view;
    }

    public function deleteTask()
    {
        if(isset($_POST["delete"]))
        {
            $this->repository
                ->deleteTask($_POST["deleteNumber"]);
        }

        Redirect::url("/tasks");
    }
}