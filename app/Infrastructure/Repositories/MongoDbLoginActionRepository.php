<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Contracts\LoginActionRepositoryInterface;
use App\Domain\Entities\LoginAction;

class MongoDbLoginActionRepository implements LoginActionRepositoryInterface {
    public function logAction(string $email, bool $result): void {
        LoginAction::create(['email' => $email, 'result' => $result, 'created_at' => now()]);
    }
}
