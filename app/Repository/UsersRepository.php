<?php

namespace App\Repository;

use App\Interfaces\IUsersRepository;

use App\Models\User;

class UsersRepository implements IUsersRepository
{
	public function getAllUsers()
	{
		return User::query()
			->where('id', '!=', auth()->id())
			->filter()
			->get();
	}

	public function getUserById(int $id)
	{
		return User::where('id', $id)->firstOrFail();
	}


	public function create($user)
	{
		return User::create($user);
	}

	public function updateUserById(int $id, array $userArray)
	{
		$user = User::findOrFail($id);
		$user->update($userArray);

		return $user;
	}

	public function login($credentials)
	{
		$token = auth('api')->attempt($credentials);

		return $token;
	}

	public function logout()
	{
		auth()->logout();
	}
}
