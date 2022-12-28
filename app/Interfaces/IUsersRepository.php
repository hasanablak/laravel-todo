<?php

namespace App\Interfaces;

interface IUsersRepository
{
	public function getAllUsers();

	public function getUserById(int $id);

	public function create(array $user);

	public function updateUserById(int $id, array $user);

	public function login(array $credentials);

	public function logout();
}
