<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ITodosRepository;

class HomeController extends Controller
{
	public $todo;

	public function __construct(ITodosRepository $todo)
	{
		$this->todo = $todo;
	}
	public function index()
	{
		return response($this->todo->getAllTodos());
	}
}
