<?php

namespace App\Interfaces;

interface ITodosRepository
{

	public function createTodo(array $todo, int $usersQid);

	public function deleteTodoById(int $id);

	public function updateTodoById(int $id, array $todo);

	public function getAllTodos();

	public function getTodosByUserId(int $id);

	public function getTodoById(int $id);

	public function restoreTodoById(int $id);
}
