<?php

namespace Tests\Feature;

use App\Service\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistService;

    public function setUp() : void
    {
        parent::setUp();
        $this->todolistService = $this->app->make(TodolistService::class);
    }

    public function testTodolistNotNull()
    {
        self::assertNotNull($this->todolistService);
    }

    public function testSave()
    {
        $this->todolistService->saveTodo("1", "Najib");
        $todolist = $this->todolistService->getTodo();
        foreach($todolist as $todo) {
            $this->assertEquals("1", $todo["id"]);
            $this->assertEquals("Najib", $todo["name"]);
        }
    }

    public function getTodoListEmpty()
    {
        $this->assertEquals([], $this->todolistService->getTodo());
    }

    public function getTodoListNotEmpty()
    {
        $todolist = [
            [
                "id" => "1",
                "name" => "Najib"
            ],
            [
                "id" => "2",
                "name" => "Ismail"
            ]
        ];

        $this->todolistService->saveTodo("1", "Najib");
        $this->todolistService->saveTodo("2", "Ismail");

        $this->assertEquals($todolist, $this->todolistService->getTodo());
    }

    public function testRemoveTodo()
    {
        $this->todolistService->saveTodo("1", "Najib");
        $this->todolistService->saveTodo("2", "Ismail");

        $this->assertEquals("2", sizeof($this->todolistService->getTodo()));

        $this->todolistService->removeTodo("3");

        $this->assertEquals("2", sizeof($this->todolistService->getTodo()));

        $this->todolistService->removeTodo("2");

        $this->assertEquals("1", sizeof($this->todolistService->getTodo()));

        $this->todolistService->removeTodo("1");

        $this->assertEquals(0, sizeof($this->todolistService->getTodo()));

    }

}
