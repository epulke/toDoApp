<?php

namespace App\Controllers;

use App\Exceptions\FormValidationException;
use App\Exceptions\SignInValidationException;
use App\Models\User;
use App\Redirect;
use App\Repositories\MysqlUsersRepository;
use App\Repositories\UsersRepository;
use App\UserValidation;
use App\View;


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

    public function registrationForm(): View
    {
        (!empty($_SESSION["_errors"])) ? $errors = $_SESSION["_errors"] : $errors = [];
        $view = new View("registration.view.twig", ["errors" => $errors]);
        return $view;
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
                Redirect::url("/signin");
            } catch (FormValidationException $error) {
                $_SESSION["_errors"] = $this->userValidator->getErrors();
                Redirect::url("/registration");
                exit;
            }
        }
    }

    public function signInForm(): View
    {
        (!empty($_SESSION["_errors"])) ? $errors = $_SESSION["_errors"] : $errors = [];
        $view = new View("signIn.view.twig", ["errors" => $errors]);
        return $view;
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
                Redirect::url("/signin");
                exit;
            }

            try {
                $this->userValidator->passwordCorrectValidation($password, $user->getPassword());
                $_SESSION["userName"] = $user->getName();
                $_SESSION["userSurname"] = $user->getSurname();
                $_SESSION["userEmail"] = $user->getEmail();
                Redirect::url("/welcome");
            } catch (SignInValidationException $error) {
                $_SESSION["_errors"] = $this->userValidator->getErrors();
                Redirect::url("/signin");
                exit;
            }
        }
    }

    public function signInSuccessful(): View
    {
        return new View("welcome.view.twig", ["user" => $_SESSION["userName"]]);
    }

    public function userInfo(): View
    {
        return new View("user.view.twig", [
            "userName" => $_SESSION["userName"],
            "userSurname" => $_SESSION["userSurname"],
            "userEmail" => $_SESSION["userEmail"]
        ]);
    }

    public function signOut()
    {
        if(isset($_POST["signOut"]))
        {
            unset($_SESSION["userName"]);
            unset($_SESSION["userSurname"]);
            unset($_SESSION["userEmail"]);
            Redirect::url("/signin");
        }
    }
}
