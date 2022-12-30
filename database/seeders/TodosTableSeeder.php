<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TodosTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$todosFile = File::get("database/data/todos.txt");
		$todos = explode(PHP_EOL, $todosFile);

		foreach ($todos as $todo) {
			$user = User::inRandomOrder()->first();

			Todo::create([
				"title"	=>	$todo,
				"is_complated"	=> rand(0, 1),
				"usersQid"	=>	$user->id
			]);
		}
	}
}
