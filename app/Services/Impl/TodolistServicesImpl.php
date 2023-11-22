<?php

namespace App\Services\Impl;

use App\Services\TodolistServices;
use Illuminate\Support\Facades\Session;


class TodolistServicesImpl implements TodolistServices
{
    public function saveTodo(string $id, string $todo): void
    {
        if(!Session::exists("todolist")){
            Session::put("todolist",[]);
        }

        Session::push("todolist",[
            "id" => $id,
            "todo"=>$todo
        ]);
    }

    public function getTodolist(): array
    {
        return Session::get("todolist",[]);
    }

    public function removeTodo($todoId): void
    {
        $todolist = Session::get("todolist");
        foreach ($todolist as $index => $value){
            if($todoId == $value['id']){
                unset($todolist[$index]);
                break;
            }
        }

        Session::put('todolist', $todolist);
    }
}
