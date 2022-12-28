<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ToDosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;


Route::controller(AuthController::class)->group(function () {
	Route::post('/login', 'login');
	Route::post('/register', 'register');
	Route::post('/logout', 'logout')->middleware('auth:api');
});





Route::resource("users", UsersController::class)
	->only(["index", "show", "update"])
	->middleware(['auth:api', AdminMiddleware::class]);

Route::resource("users.todos", TodosController::class)
	->except(["create", "edit"])
	->middleware('auth:api');

Route::post("users/{user}/todos/{todo}/restore", [TodosController::class, "restore"])->middleware('auth:api');

Route::get('home-feed', [HomeController::class, "index"])->middleware('auth:api');
