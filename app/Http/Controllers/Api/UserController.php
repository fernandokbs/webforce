<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email','password' => 'required',]);
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        $token = $user->createToken('mobile')->plainTextToken;
        return response(['user' => new UserResource($user), 'token' => $token], 201);
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data["password"] = Hash::make($request->password);
        $user = User::create($data);
        
        return $user->createToken('mobile')->plainTextToken;
    }
}
