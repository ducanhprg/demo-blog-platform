<?php

namespace App\Domain\Entities;

use MongoDB\Laravel\Eloquent\Model;

class LoginAction extends Model {
    protected $connection = 'mongodb';
    protected $collection = 'login_actions';

    // Assuming LoginAction is directly mapped to a MongoDB collection,
    // and uses Jenssegers\Mongodb\Eloquent\Model for MongoDB support.
    protected $fillable = ['email', 'result', 'created_at'];
}
