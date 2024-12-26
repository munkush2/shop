<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(UserLoginRequest $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            if ($token) {
                return response()->json([
                'data' => [
                        'access_token' => $token,
                        'token_type' => 'Bearer',
                    ],
                'message' => 'Login successful',
                'user_status' => $user->user_status,
                'success' => true,
                'version' => 'v1'
                ]);
            } 
        }

        return response()->json([
            'error' => [],
            'message' => 'Invalid credentials',
            'success' => false,
            'version' => 'v1',
        ]);
    }
}
