<?php

namespace App\Domain\Contracts;

interface LoginActionRepositoryInterface
{
    public function logAction(string $email, bool $result): void;
}
