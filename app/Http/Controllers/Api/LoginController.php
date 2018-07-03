<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = null;

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'result' => [
                    'response' => 'error',
                    'message' => 'invalid_credentials',
                ],
            ]);
        }

        return response()->json([
            'result' => [
                'response' => 'success',
                'token' => $token,
            ],
        ]);
    }
}
