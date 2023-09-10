<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        $token = Auth::user()->createToken('AppName')->accessToken;

        return response()->json(['token' => $token, 'role' => Auth::user()->role]);
    }

    public function logout(Request $request)
    {
        // Get the currently authenticated user's token
        $token = $request->user()->token();

        // Revoke the token
        $token->revoke();

        // Respond with a message
        return response()->json(['message' => 'Successfully logged out']);
    }
}