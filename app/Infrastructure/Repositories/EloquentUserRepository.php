<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Contracts\UserRepositoryInterface;
use App\Domain\Entities\User;

class EloquentUserRepository implements UserRepositoryInterface {
    public function findByCredentials(string $email, string $password): ?User {
        // Assume $password is already hashed and checked elsewhere
        return User::where('email', $email)->first();
    }
}
