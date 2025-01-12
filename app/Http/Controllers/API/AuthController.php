<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register API
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Create an access token for the user
        $token = $user->createToken('Personal Access Token')->plainTextToken;
    
        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token,  // Include the token in the response
        ], 201);
    }
    

    // Login API
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Find the user by email
        $user = User::where('email', $request->email)->first();
    
        // Check if user exists and if password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect.'], 401);
        }
    
        // Create a token for the user
        $token = $user->createToken('Personal Access Token')->plainTextToken;
    
        return response()->json([
            'token' => $token,  // Return the generated token
        ], 200);
    }
    

    // Logout API
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
