<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTodolist()
    {
        $this->withSession([
            "user" => "Najib",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Najib"
                ],
                [
                    "id" => "2",
                    "todo" => "Ismail"
                ]
            ]
        ])->get("/todolist")
          ->assertSeeText("1")
          ->assertSeeText("Najib")
          ->assertSeeText("2")
          ->assertSeeText("Ismail");
    }

    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => "Najib",
        ])->post("/todolist", [
            "todo" => "Najib"
        ])->assertRedirect("/todolist");
    }

    public function testAddTodolistFailed()
    {
        $this->withSession([
            "user" => "Najib"
        ])->post("/todolist", [])
          ->assertSeeText("Todolist Is Required");
    }

    public function testRemoveTodo()
    {
        $this->withSession([
            "user" => "Najib",
            "todolist" => [
                [
                    "id" => "1",
                    "name" => "Najib",
                ]
            ]
        ])->post("/todolist/1/remove")->assertRedirect("/todolist");
    }
}
