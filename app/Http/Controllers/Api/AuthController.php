<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'message' => 'Invalid request.',
            ];
        }
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return [
                'seccess' => false,
                'message' => 'The provided credentials are incorrect.',
            ];
        }
     
        $token = $user->createToken($request->device_name)->plainTextToken;
        return [
            'success' => true,
            'data' => [
                'token' => $token,
            ]
        ];
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'message' => 'Invalid request.',
            ];
        }

        if (User::firstWhere('email', $request->email)) {
            return [
                'success' => false,
                'message' => 'Email has been registered.',
            ];
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
        ]);

        $token = $user->createToken($request->device_name)->plainTextToken;
        return [
            'success' => true,
            'token' => $token,
        ];
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return [
            'success' => true
        ];
    }
}
