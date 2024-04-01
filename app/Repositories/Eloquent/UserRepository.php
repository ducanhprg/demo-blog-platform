<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::query()->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return User::query()->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $user = $this->find($id);
        $user->update($attributes);
        return $user;
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}
