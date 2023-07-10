<?php

namespace App\Http\Controllers;

use App\Services\TodoListService;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    private TodoListService $todoListService;

    function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }
    //
    public function todoList()
    {
        $todolists = $this->todoListService->getTodo();
        return response()->view('todolist.todolist',[
            'title'=>'List Todo',
            'todolist' => $todolists
        ]);
    }

    public function addTodo(Request $request)
    {
        $todo = $request->input('todo');

        if(empty($todo)){

            $todolists = $this->todoListService->getTodo();
            return response()->view('todolist.todolist',[
                'title'=>'List Todo',
                'todolist' => $todolists,
                'error' => 'todo is required'
            ]);
        }
        $this->todoListService->saveTodo(uniqid(),$todo);

        return redirect()->action([TodoListController::class,'todoList']);
    }

    public function removeTodo(Request $request, string $id)
    {
        $this->todoListService->removeTodo($id);
        return redirect()->action([TodoListController::class,'todoList']);
    }
}
