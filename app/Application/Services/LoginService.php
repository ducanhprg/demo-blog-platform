<?php

namespace App\Application\Services;

use App\Application\DTOs\LoginDTO;
use App\Domain\Contracts\LoginActionRepositoryInterface;
use App\Domain\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LoginService {
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private LoginActionRepositoryInterface $loginActionRepository
    ) {}

    public function login(LoginDTO $loginDTO): ?string {
        $user = $this->userRepository->findByCredentials($loginDTO->email, $loginDTO->password);

        if ($user && Hash::check($loginDTO->password, $user->password)) {
            $this->loginActionRepository->logAction($loginDTO->email, true);
            return $user->createToken('appToken')->plainTextToken; // Sanctum token generation for API
        }

        $this->loginActionRepository->logAction($loginDTO->email, false);
        return null;
    }
}
