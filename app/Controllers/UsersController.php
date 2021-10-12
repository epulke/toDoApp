<?php

namespace App\Controllers;

use App\Exceptions\FormValidationException;
use App\Exceptions\SignInValidationException;
use App\Models\User;
use App\Repositories\MysqlUsersRepository;
use App\Repositories\UsersRepository;
use App\UserValidation;


class UsersController
{
    private UsersRepository $repository;
    private UserValidation $userValidator;

    public function __construct()
    {
        $config = require_once "config.php";
        $this->repository = new MysqlUsersRepository($config);
        $this->userValidator = new UserValidation();
    }

    public function registrationForm()
    {
        var_dump($_SESSION["_errors"]);
        require_once "app/Views/registration.view.php";
    }

    public function addUser()
    {
        if (isset($_POST["register"]))
        {
            try {
                $this->userValidator->confirmedPasswordValidation($_POST["password1"], $_POST["password2"]);
                $user = new User(
                    $_POST["name"],
                    $_POST["surname"],
                    $_POST["email"],
                    $_POST["password2"]
                );
                $this->repository->addUser($user);
                header("Location: /signin");
            } catch (FormValidationException $error) {
                $_SESSION["_errors"] = $this->userValidator->getErrors();
                header("Location: /registration");
            }
        }
    }

    public function signInForm()
    {
        require_once "app/Views/signIn.view.php";
    }

    public function signInUser()
    {
        if (isset($_POST["signIn"]))
        {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $user = $this->repository->searchUser($email);

            try {
                $this->userValidator->userExistsValidation($user);
            } catch (SignInValidationException $error) {
                $_SESSION["_errors"] = $this->userValidator->getErrors();
                header("Location: /signin");
            }

            try {
                $this->userValidator->passwordCorrectValidation($password, $user->getPassword());
                $_SESSION["userName"] = $user->getName();
                $_SESSION["userSurname"] = $user->getSurname();
                $_SESSION["userEmail"] = $user->getEmail();
                header("Location: /welcome");
            } catch (SignInValidationException $error) {
                $_SESSION["_errors"] = $this->userValidator->getErrors();
                header("Location: /signin");
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
            unset($_SESSION["userName"]);
            unset($_SESSION["userSurname"]);
            unset($_SESSION["userEmail"]);
            header("Location: /signin");
        }
    }
}
