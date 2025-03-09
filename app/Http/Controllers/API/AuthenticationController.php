<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ResponseJson;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthenticationController extends Controller
{
    use ResponseJson;
    public function profile()
    {
        $user = Auth()->user();
        return $this->responseJson('success', ['user' => $user]);
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required']
        ];
        $validator = Validator::make($request->all(), $rules);
        if (count($validator->errors()) > 0) {
            return $this->responseJson('error', $validator->errors()->first(), 401);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->responseJson('success', ['token' => $token]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->responseJson('error', ['message' => 'invalid credentials'], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->responseJson('success', ['message' => 'login successful', 'token' => $token]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return $this->responseJson('success', ['message'=>'logged out successfully']);
    }
}
