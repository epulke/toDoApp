<?php

namespace App\Repositories;

use App\Models\User;
use PDO;

class MysqlUsersRepository implements UsersRepository
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

    public function addUser(User $user): void
    {
        $statement = $this->pdo->prepare("insert into users (name, surname, email, password) values (?, ?, ?, ?)");
        $statement->execute($user->getUserArray());
    }

    public function searchUser($email): ?User
    {
        $statement = $this->pdo->prepare("select * from users where email='{$email}'");
        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        if ($results === false)
        {
            $user = null;
        } else {
            $user = new User(
                $results["name"],
                $results["surname"],
                $results["email"],
                $results["password"]
            );
            $user->setPassword($results["password"]);
        }
        return $user;
    }
}