<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('todo-app')->plainTextToken;

        return response()->json([
            'status' => 200,
            'token' => $token,
            'message' => 'Logged in successfully',
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->currentAccessToken()->delete();
            
            return response()->json([
                'status' => 200,
                'message' => 'Logged out successfully'
            ]);
        }

        return response()->json([
            'status' => 401,
            'message' => 'Unauthorized'
        ]);
    }
}
