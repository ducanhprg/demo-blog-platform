<?php

namespace App\Http\Controllers\Api;

use App\Application\DTOs\LoginDTO;
use App\Application\Services\LoginService;
use App\Application\Services\LoginValidatorService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiLoginController extends Controller {
    private LoginService $loginService;
    private LoginValidatorService $loginValidatorService;

    public function __construct(LoginService $loginService, LoginValidatorService $loginValidatorService) {
        $this->loginService = $loginService;
        $this->loginValidatorService = $loginValidatorService;
    }

    public function login(Request $request) {
        $validatedData = $this->loginValidatorService->validate($request->all());
        $loginDTO = new LoginDTO($validatedData['email'], $validatedData['password']);

        if ($token = $this->loginService->login($loginDTO)) {
            return response()->json(['token' => $token], Response::HTTP_OK);
        }

        return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }
}
