<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{

    public function __construct()
    {
        UserResource::withoutWrapping();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::normalUser()->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());
        return (new UserResource( User::find($user->id) ))
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Login API
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Register API
     *
     * @return \Illuminate\Http\Response plainText
     */
    public function register(UserStoreRequest $request)
    {
        $data = $request->all();
        $data["password"] = Hash::make($request->password);
        $user = User::create($data);
        
        return $user->createToken('mobile')->plainTextToken;
    }
}
