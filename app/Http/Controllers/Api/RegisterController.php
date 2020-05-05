<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        $attributes = request()->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password'])
        ]);

        $token = $user->createToken('TutsForWeb')->accessToken;

        return response()->json([
            "success" => true,
            "data" => [
                "token" => $token,
                "user_id" => $user->user_id
            ]
        ]);
    }
}
