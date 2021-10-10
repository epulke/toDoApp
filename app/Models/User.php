<?php

namespace App\Models;

class User
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;

    public function __construct(string $name, string $surname, string $email, string $password)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getUserArray(): array
    {
        return [
            $this->name,
            $this->surname,
            $this->email,
            $this->password

        ];
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}