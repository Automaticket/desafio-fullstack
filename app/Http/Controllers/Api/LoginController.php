<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        $token = JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    private function responseToken($token)
    {
        return $token ? ['token' => $token] : response()->json([
            'error' => 'Credenciais inválidas'
        ], 400);
    }
}
