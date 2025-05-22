<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        // Attempt to authenticate the user
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
        // Generate a new token for the user
        $token = auth()->user()->createToken('auth_token')->plainTextToken;
        // Return the token in the response
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => auth()->user()
        ]);
        // Return the user information in the response
        return response()->json([
            'message' => 'Login successful',
            'user' => $request->user()
        ]); 

    }

    public function register(Request $request)
    {
        return response()->json([
            'message' => 'Registration successful',
            'user' => $request->user()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout successful'
        ]);
    }
}
