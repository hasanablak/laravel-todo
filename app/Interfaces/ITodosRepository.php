<?php

namespace App\Interfaces;

interface ITodosRepository
{

	public function createTodo(array $todo);

	public function deleteTodo(int $id);

	public function updateTodo(int $id, array $todo);

	public function getAllTodos();

	public function getTodoById(int $id);
}
