<?php

namespace App;

use App\Exceptions\FormValidationException;
use App\Exceptions\SignInValidationException;
use App\Repositories\MysqlUsersRepository;

class UserValidation
{
    private array $errors = [];

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function confirmedPasswordValidation($password, $passwordConfirmation)
    {
        if ($password !== $passwordConfirmation)
        {
            $this->errors[] = "Passwords do not match.";
        }

        if (count($this->errors) > 0)
        {
            throw new FormValidationException();
        }
    }

    public function userExistsValidation($user)
    {
        if (is_null($user))
        {
            $this->errors[] = "This email is not registered.";
        }

        if (count($this->errors) > 0)
        {
            throw new SignInValidationException();
        }
    }

    public function passwordCorrectValidation($passwordEntered, $passwordSaved)
    {
        if (!password_verify($passwordEntered, $passwordSaved))
        {
            $this->errors[] = "Password is incorrect.";
        }

        if (count($this->errors) > 0)
        {
            throw new SignInValidationException();
        }

    }
}