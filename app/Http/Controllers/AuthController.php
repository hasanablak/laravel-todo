<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Resources\AuthResource;
use App\Interfaces\IUsersRepository;

class AuthController extends Controller
{
	public $user;


	public function __construct(IUsersRepository $user)
	{
		$this->user = $user;
	}

	public function login(AuthLoginRequest $request)
	{
		$credentials = $request->only('email', 'password');

		$token = $this->user->login($credentials);

		return response(new AuthResource($token), $token ? 200 : 401);
	}


	public function register(AuthRegisterRequest $request)
	{
		return response([
			'message' => 'User successfully registered',
			'user' => $this->user->create($request->all())
		], 201);
	}


	public function logout()
	{
		$this->user->logout();
		return response([
			'message' => 'User successfully signed out'
		]);
	}
}
