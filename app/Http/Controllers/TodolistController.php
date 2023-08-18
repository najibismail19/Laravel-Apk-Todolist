<?php

namespace App\Http\Controllers;

use App\Service\TodolistService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodolistController extends Controller
{
    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function todoList(Request $request) : Response
    {
        $todolist = $this->todolistService->getTodo();
        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist
        ]);
    }

    public function addTodo(Request $request)
    {
        $todo = $request->input("todo");
        echo json_encode($todo);
        // $todolist = $this->todolistService->getTodo();
        // if(empty($todo)) {
        //     return response()->view("todolist.todolist", [
        //         "title" => "Todolist",
        //         "error" => "Todolist Is Required",
        //         "todolist" => $todolist
        //     ]);
        // }

        // $this->todolistService->saveTodo(uniqid(), $todo);
        // return redirect()->action([\App\Http\Controllers\TodolistController::class, "todoList"]);
    }

    public function removeTodo(string $id) : RedirectResponse
    {
        $this->todolistService->removeTodo($id);
        return redirect()->action([\App\Http\Controllers\TodeolistController::class, "todoList"]);
    }
}
