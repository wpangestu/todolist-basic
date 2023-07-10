<?php

namespace App\Services\Impl;

use App\Services\TodoListService;
use Illuminate\Support\Facades\Session;

class TodoListImpl implements TodoListService
{
    public function saveTodo(string $id, string $todo): void
    {
        if(!Session::exists("todolist")){
            Session::put("todolist",[]);
        }

        Session::push("todolist",[
            "id" => $id,
            "todo" => $todo
        ]);
    }

    public function getTodo(): array
    {
        return Session::get("todolist",[]);
    }

    public function removeTodo(string $id)
    {
        $todoList = Session::get("todolist");

        foreach ($todoList as $key => $value) {
            if($value['id']==$id){
                unset($todoList[$key]);
                break;
            }
        }

        Session::put("todolist",$todoList);
    }
}