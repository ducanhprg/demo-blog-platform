<?php

namespace App\Application\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginValidatorService {

    /**
     * @throws ValidationException
     */
    public function validate(array $data): array {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ])->validated();
    }
}
