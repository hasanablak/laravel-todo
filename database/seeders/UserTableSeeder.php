<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		if (config('admin.admin_name')) {
			User::firstOrCreate(
				['email' => config('admin.admin_email')],
				[
					'name' => config('admin.admin_name'),
					'password' => config('admin.admin_password'),
					'is_admin' => 1,
					'email_verified_at' => now(),
					'remember_token' => Str::random(10),
				]
			);
		}
	}
}
