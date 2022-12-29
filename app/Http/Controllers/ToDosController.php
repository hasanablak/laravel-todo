<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;
use App\Interfaces\ITodosRepository;
use App\Notifications\AssignedTodoNotification;
use Illuminate\Support\Facades\Notification;

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

		//	Notification::send(new AssignedTodoNotification($usersQid, auth()->id()));

		$todo = $this->todo->createTodo($request->only(["title", "is_complated"]), $usersQid);
		return response($todo);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($usersQid, $todosQid)
	{
		return response($this->todo->getTodoById($todosQid));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $usersQid, $todosQid)
	{
		return $this->todo->updateTodoById($todosQid, $request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($usersQid, $todosQid)
	{
		$this->todo->deleteTodoById($todosQid);
	}

	public function restore($usersQid, $todosQid)
	{
		$this->todo->restoreTodoById($todosQid);
	}

	public function trashedTodos()
	{
		return $this->todo->getTrashedTodos();
	}
}
