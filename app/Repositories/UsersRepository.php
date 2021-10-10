<?php

namespace App\Repositories;

use App\Models\User;

interface UsersRepository
{
    public function addUser(User $user): void;
    public function searchUser($email): ?User;

}