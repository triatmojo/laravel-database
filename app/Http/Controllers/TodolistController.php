<?php

namespace App\Http\Controllers;

use App\Services\TodolistServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodolistController extends Controller
{
    private TodolistServices $todolistServices;

    /**
     * @param TodolistServices $todolistServices
     */
    public function __construct(TodolistServices $todolistServices)
    {
        $this->todolistServices = $todolistServices;
    }


    public function getTodo(Request $request) : Response
    {
        $todolist = $this->todolistServices->getTodolist();
        return response()->view("todolist.todolist", [
            "todolist" => $todolist,
            "title" => "Todolist"
        ]);
    }

    public function addTodo(Request $request) : Response | RedirectResponse
    {
        $todo = $request->input("todo");
        if(empty($todo)) {
            $todolist = $this->todolistServices->getTodolist();

            return response()->view("todolist.todolist", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todolist is required"
            ]);
        }

        $this->todolistServices->saveTodo(uniqid(), $todo);
        return redirect()->action([TodolistController::class, 'getTodo']);
    }

    public function removeTodo(Request $request, string $todoId) : RedirectResponse
    {
        $this->todolistServices->removeTodo($todoId);
        return redirect()->action([TodolistController::class, 'getTodo']);
    }

}
