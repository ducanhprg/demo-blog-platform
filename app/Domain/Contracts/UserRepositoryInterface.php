<?php

namespace App\Domain\Contracts;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function findByCredentials(string $email, string $password): ?User;
}
