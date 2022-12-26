<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:api', ['except' => ['login', 'register']]);
	}

	public function login(AuthLoginRequest $request)
	{
		$credentials = $request->only('email', 'password');

		$token = auth('api')->attempt($credentials);

		return response(new AuthResource($token), $token ? 200 : 401);
	}


	public function register(AuthRegisterRequest $request)
	{

		$user = User::create($request->all());

		return response([
			'message' => 'User successfully registered',
			'user' => $user
		], 201);
	}


	public function logout()
	{
		auth()->logout();
		return response()->json(['message' => 'User successfully signed out']);
	}

	public function refresh()
	{
		return $this->createNewToken(auth()->refresh());
	}

	public function userProfile()
	{
		return response()->json(auth()->user());
	}
}
