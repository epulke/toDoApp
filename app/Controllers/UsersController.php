<?php

namespace App\Controllers;

use App\Models\User;
use App\Repositories\MysqlUsersRepository;
use App\Repositories\UsersRepository;



class UsersController
{
    private UsersRepository $repository;

    public function __construct()
    {
        $config = require_once "config.php";
        $this->repository = new MysqlUsersRepository($config);
    }

    public function registrationForm()
    {
        require_once "app/Views/registration.view.php";
    }

    public function addUser()
    {
        if (isset($_POST["register"]))
        {
            if ($_POST["password1"] !== $_POST["password2"])
            {
                $message = "<p class='text-center text-danger'>Passwords do not match.</p>";
            } else {
                $user = new User(
                    $_POST["name"],
                    $_POST["surname"],
                    $_POST["email"],
                    $_POST["password2"]
                );
                $this->repository->addUser($user);
                $message = "<p class='text-center text-primary'>Your registration was successful.</p>";
            }
            require_once "app/Views/registration.view.php";
        }
    }

    public function signInForm()
    {
        $error = "";
        require_once "app/Views/signIn.view.php";
    }

    public function signInUser()
    {
        $error = "";
        if (isset($_POST["signIn"]))
        {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $user = $this->repository->searchUser($email);

            if (is_null($user))
            {
                $error = "This email is not registered.";
                require_once "app/Views/signIn.view.php";
            }

            if (password_verify($password, $user->getPassword())) {
                $_SESSION["userName"] = $user->getName();
                $_SESSION["userSurname"] = $user->getSurname();
                $_SESSION["userEmail"] = $user->getEmail();
                header("Location: /welcome");
            } else {
                $error = "<p class='text-center text-danger'>Password is incorrect.</p>";
                require_once "app/Views/signIn.view.php";
            }
        }
    }

    public function signInSuccessful()
    {
        require_once "app/Views/welcome.view.php";
    }

    public function userInfo()
    {
        require_once "app/Views/user.view.php";
    }

    public function signOut()
    {
        if(isset($_POST["signOut"]))
        {
            session_destroy();
            header("Location: /signin");
        }
    }
}
