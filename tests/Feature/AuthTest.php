<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
	public $newUser = [
		"email"	=>	"test@test.com",
		"password"	=>	"123456",
		"name"	=>	"John Doe"
	];

	public function test_can_i_register()
	{
		$response = $this->post('/api/register', [
			'email'	=>	$this->newUser["email"],
			'password'	=>	$this->newUser["password"],
			'name'	=>	$this->newUser["name"]
		]);

		$response->assertStatus(201);

		$userQuery = User::where('email', $this->newUser["email"])->firstOrFail();
	}

	public function test_can_i_login()
	{
		$response = $this->post('/api/login', [
			"email"		=>	$this->newUser["email"],
			"password"	=>	$this->newUser["password"]
		]);

		$response->assertStatus(200);

		User::where('email', $this->newUser["email"])->delete();
	}
}
