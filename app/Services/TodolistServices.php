<?php

namespace App\Services;

interface TodolistServices
{
    public function saveTodo(string $id, string $todo): void;
    public function getTodolist(): array;
    public function removeTodo($todoId): void;
}
