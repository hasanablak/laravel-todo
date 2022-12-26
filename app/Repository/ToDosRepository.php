<?php

namespace App\Repository;

use App\Interfaces\ITodosRepository;
use App\Models\ToDo;

class ToDosRepository implements ITodosRepository
{

	public function createTodo(array $todo)
	{
		return ToDo::create($todo);
	}

	public function deleteTodo(int $id)
	{
		ToDo::softDeleted($id);
	}

	public function updateTodo(int $id, array $todo)
	{
		return ToDo::where('id', $id)->update($todo);
	}

	public function getAllTodos()
	{
		return ToDo::query()
			->where(function ($query) {
				if (!auth()->user()->is_admin) {
					return $query->where('usersQid', auth()->id);
				}
			})
			->get();
	}

	public function getTodoById(int $id)
	{
		return ToDo::query()
			->where('id', $id)
			->where(function ($query) {
				if (!auth()->user()->is_admin) {
					return $query->where('usersQid', auth()->id);
				}
			})
			->firstOrFail();
	}
}
