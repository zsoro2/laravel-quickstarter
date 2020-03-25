<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $attributes = request()->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($attributes)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $token = Auth::user()->createToken('Personal Access Token')->accessToken;

        return response()->json([
            "success" => true,
            "data" => [
                "token" => $token,
                "user_id" => Auth::user()->user_id
            ]
        ]);
    }
}
