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

	public function deleteTodoById(int $id)
	{
		Todo::query()
			->where('id', $id)
			->filterByUserId()
			->delete();
	}

	public function updateTodoById(int $id, array $todo)
	{
		return Todo::query()
			->where('id', $id)
			->filterByUserId()
			->update($todo);
	}

	public function getAllTodos()
	{
		return Todo::query()
			->filterByUserId()
			->filter()
			->get();
	}

	public function getTodosByUserId(int $id)
	{
		return Todo::query()
			->filterByUserId()
			->filter()
			->where('usersQid', $id)
			->get();
	}

	public function getTodoById(int $id)
	{
		return Todo::query()
			->where('id', $id)
			->filterByUserId()
			->firstOrFail();
	}

	public function restoreTodoById(int $id)
	{
		Todo::onlyTrashed()
			->where('id', $id)
			->filterByUserId()
			->restore();
	}
}
