<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRigesterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function __invoke(UserRigesterRequest $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        
        $user = User::create($credentials);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            if ($token) {
                return response()->json([
                    'data' => [
                        'access_token' => $token,
                        'token_type' => 'Bearer',
                    ],
                    'message' => 'You have succesful registration',
                    'success' => true,
                    'version' => 'v1'
                    
                ]);
            } else {
                return response()->json([
                    'error' => [],
                    'message' => 'Something went wrong',
                    'success' => false,
                    'version' => 'v1',
                ]);
            }
        }
    }
}
