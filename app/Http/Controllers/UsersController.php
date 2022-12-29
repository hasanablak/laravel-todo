<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterRequest;
use App\Interfaces\IUsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	public $user;

	public function __construct(IUsersRepository $user)
	{
		$this->user = $user;
	}

	/**
	 * Bütün Kullanıcıları Gösterelim
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return response($this->user->getAllUsers());
	}


	/**
	 * ID'si verilen kullanıcının bilgilerini getirelim
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return response($this->user->getUserById($id));
	}

	public function update(Request $request)
	{
		return response($this->user->updateUserById($request->user, $request->all()));
	}

	public function store(AuthRegisterRequest $request)
	{
		return response($this->user->create($request->only("email", "password", "name", "is_admin")));
	}
}
