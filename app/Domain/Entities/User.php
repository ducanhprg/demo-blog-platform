<?php

namespace App\Domain\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens;

    protected $fillable = ['name', 'email', 'password'];
}
