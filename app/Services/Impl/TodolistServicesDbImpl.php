<?php

namespace App\Services\Impl;

use App\Models\Todolist;
use App\Services\TodolistServices;

class TodolistServicesDbImpl implements TodolistServices
{

    public function saveTodo(string $id, string $todo): void
    {
        $todolist = new Todolist();
        $todolist->id = $id;
        $todolist->todo = $todo;
        $todolist->save();
    }

    public function getTodolist(): array
    {
        return Todolist::query()->get()->toArray();
    }

    public function removeTodo($todoId): void
    {
        $todo = Todolist::query()->where('id', $todoId);
        $todo->delete();
    }
}
