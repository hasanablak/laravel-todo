<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Todo;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ExampleTest extends TestCase
{
	/**
	 * A basic test example.
	 *
	 * @return void
	 */


	public function test_kullanici_kendisine_todo_ekliyor()
	{
		$user = User::first();

		$response = $this->actingAs($user)
			->post('/api/users/' . $user->id . '/todos', [
				"title"	=>	"test"
			]);


		$response->assertStatus(200);
	}

	public function test_admin_baskasina_todo_ekliyor()
	{
		$user = User::where('is_admin', 1)->first();

		$anotherUser = User::inRandomOrder()->first();

		$response = $this->actingAs($user)
			->post('/api/users/' . $anotherUser->id . '/todos', [
				"title"	=>	"test"
			]);


		$response->assertStatus(200);
	}

	public function test_admin_olmayan_kisi_baskasina_todo_eklemeye_calisirsa_kendisine_eklemis_olur()
	{
		$user = User::where('is_admin', 0)->first();

		$anotherUser = User::inRandomOrder()->first();
		$title = date("dmyhis");
		$response = $this->actingAs($user)
			->post('/api/users/' . $anotherUser->id . '/todos', [
				"title"	=>	$title
			]);

		$todo = Todo::where('usersQid', $user->id)->latest()->first();

		$this->assertEquals($title, $todo->title);

		//$todo->assertJson(["title" => $randomStr]);
	}
}
