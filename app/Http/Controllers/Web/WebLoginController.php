<?php

namespace App\Http\Controllers\Web;

use App\Application\DTOs\LoginDTO;
use App\Application\Services\LoginService;
use App\Application\Services\LoginValidatorService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebLoginController extends Controller {
    private LoginService $loginService;
    private LoginValidatorService $loginValidatorService;

    public function __construct(LoginService $loginService, LoginValidatorService $loginValidatorService) {
        $this->loginService = $loginService;
        $this->loginValidatorService = $loginValidatorService;
    }

    public function login(Request $request) {
        $validatedData = $this->loginValidatorService->validate($request->all());
        $loginDTO = new LoginDTO($validatedData['email'], $validatedData['password']);

        if ($this->loginService->login($loginDTO)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
