<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use MongoDB\Laravel\Sanctum\HasApiTokens;


class AuthController extends Controller
{
    public function login (Request $request) : JsonResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'The Provided credentials are incorrect.',
            ], 401);
        }

        $token = $user->createToken($user->email.'Auth-Token')->plainTextToken;

        return response()->json([
            'message' => 'Login Successful',
            'token_type' => 'Bearer',
            'token' => $token,
        ], 200);
    }


    public function register(Request $request): JsonResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255',
        ]);
    
        try {
            // Create the new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            // Check if the user is created successfully
            if ($user) {
                // Create a token for the user
                $token = $user->createToken($user->email.'Auth-Token')->plainTextToken;
    
                return response()->json([
                    'message' => 'Registration Successful',
                    'token_type' => 'Bearer',
                    'token' => $token,
                ], 201);
            } else {
                return response()->json([
                    'message' => 'Something went wrong during registration.',
                ], 500);
            }
        } catch (\Exception $e) {
            // Catch any unexpected errors and return them
            return response()->json([
                'message' => 'Something went wrong: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function logout (Request $request) : JsonResponse
    {
        $user = User::where('id', $request->user()->id)->first();
        if ($user) 
        {
            $user->tokens()->delete();
            return response()->json([
                'message' => 'Logout Successful',
            ], 200);
        } 
        else 
        {
            return response()->json([
                'message' => 'User Not Found',
            ], 500);
        }
    }   

    public function profile (Request $request) : JsonResponse
    {
        if($request->user())
        {
            return response()->json([
                'message' => 'Profile Fetched',
                'data' => $request->user(),
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Not Authenticated',
            ], 401);
        }
    }
}
