<?php

namespace App\Repositories\Mongo;

use App\Models\Mongo\UserActivity; // Assume this model is set up for MongoDB
use App\Repositories\Contracts\ActivityLogRepositoryInterface;

class ActivityLogRepository implements ActivityLogRepositoryInterface
{
    public function logActivity($userId, $activity): void
    {
        $log = new UserActivity();
        $log->user_id = $userId;
        $log->activity = $activity;
        $log->save();
    }
}
