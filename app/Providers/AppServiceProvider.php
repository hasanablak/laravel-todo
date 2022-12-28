<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ITodosRepository;
use App\Repository\TodosRepository;

use App\Interfaces\IUsersRepository;
use App\Repository\UsersRepository;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(ITodosRepository::class, function ($app) {
			return new TodosRepository;
		});

		$this->app->bind(IUsersRepository::class, function ($app) {
			return new UsersRepository;
		});
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
