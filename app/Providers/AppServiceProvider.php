<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ITodosRepository;
use App\Repository\TodosRepository;

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
