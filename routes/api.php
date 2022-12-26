<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ToDosController;
use App\Http\Controllers\AuthController;


Route::controller(AuthController::class)->group(function () {
	Route::post('/login', 'login');
	Route::post('/register', 'register');
	Route::post('/logout', 'logout');
});



Route::resource("users", UsersController::class);
Route::resource("todos", TodosController::class);
