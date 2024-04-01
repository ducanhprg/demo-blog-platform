<?php

namespace App\Repositories\Contracts;

interface ActivityLogRepositoryInterface
{
    public function logActivity($userId, $activity);
}
