<?php
namespace App\Service\Impl;

use App\Service\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService {

    public function saveTodo(string $id, string $name): void
    {
        if(!Session::exists("todolist")) {
            Session::put("todolist", []);
        }

        Session::push("todolist", [
            "id" => $id,
            "name" => $name
        ]);
    }

    public function getTodo() : array
    {
        return Session::get("todolist", []);
    }

    public function removeTodo(string $id): void
    {
        $todolist = Session::get("todolist");
        foreach($todolist as $index => $todo) {
            if($todo["id"] == $id) {
                unset($todolist[$index]);
                break;
            }
        }
        Session::put("todolist", $todolist);
    }
}
