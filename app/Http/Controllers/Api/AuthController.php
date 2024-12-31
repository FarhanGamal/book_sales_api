<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

use function Pest\Laravel\json;

class AuthController extends Controller
{
    public function register(Request $request) {
        // setup validator
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8"
        ]);

        // Check validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // Return response JSON user is created
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ], 201);

            // Return response if process failed
            return response()->json([
                'success' => false,
                'message' => 'User creation failed'
            ], 409); // Conflict
        }
    }


    //Login

    public function login(Request $request) {
        // setup validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Check validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Get credential from request 
        $credentials = $request->only('email', 'password');

        // If auth failed
        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah!'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successfully',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);

    }


    // Logout

    public function logout(Request $request) {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            // if logout succes
            return response()->json([
                'success' => true,
                'massege' => 'Logout succesfully!'
            ], 200);

        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'massege' => 'Logout failed!'
            ], 500);
        }
    }
}
