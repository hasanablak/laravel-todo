<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;
use App\Interfaces\ITodosRepository;

class TodosController extends Controller
{
	public $todo;

	public function __construct(ITodosRepository $todo)
	{
		$this->todo = $todo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($usersQid)
	{
		return $this->todo->getTodosByUserId($usersQid);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(TodoCreateRequest $request)
	{
		$usersQid = auth()->user()->is_admin && isset($request->usersQid)
			? $request->usersQid
			: auth()->id();


		$todo = $this->todo->createTodo($request->only(["title", "is_complated"]), $usersQid);
		return response($todo);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return response($this->todo->getTodoById($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		return $this->todo->updateTodoById($id, $request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->todo->deleteTodoById($id);
	}

	public function restore($id)
	{
		$this->todo->restoreTodoById($id);
	}

	public function trashedTodos()
	{
		return $this->todo->getTrashedTodos();
	}
}
