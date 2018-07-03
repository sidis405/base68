<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeController extends Controller
{
    public function me(Request $request)
    {
        $user = JWTAuth::toUser($request->token);

        return response()->json(
            [
                'result' => [
                    'user' => $user,
                ],
            ]
        );
    }
}
