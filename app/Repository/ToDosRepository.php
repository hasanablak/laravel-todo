<?php

namespace App\Repository;

use App\Interfaces\ITodosRepository;
use App\Models\Todo;

class TodosRepository implements ITodosRepository
{

	public function createTodo(array $todo, int $usersQid)
	{

		return Todo::create([
			...$todo,
			"usersQid" => $usersQid
		]);
	}

	public function deleteTodo(int $id)
	{
		Todo::softDeleted($id);
	}

	public function updateTodo(int $id, array $todo)
	{
		return Todo::where('id', $id)->update($todo);
	}

	public function getAllTodos()
	{
		return Todo::query()
			->where(function ($query) {
				if (!auth()->user()->is_admin) {
					return $query->where('usersQid', auth()->id);
				}
			})
			->get();
	}

	public function getTodoById(int $id)
	{
		return Todo::query()
			->where('id', $id)
			->where(function ($query) {
				if (!auth()->user()->is_admin) {
					return $query->where('usersQid', auth()->id);
				}
			})
			->firstOrFail();
	}

	public function revokeTodoById(int $id)
	{
		Todo::query()
			->where('id', $id)
			->where(function ($query) {
				if (!auth()->user()->is_admin) {
					return $query->where('usersQid', auth()->id);
				}
			})
			->update(["deleted_at", ""]);
	}
}
