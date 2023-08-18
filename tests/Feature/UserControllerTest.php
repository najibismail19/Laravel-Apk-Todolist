<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLogin()
    {
       $this->get("/login")->assertSeeText("Login");
    }

    public function testLoginSucces()
    {
        $this->post("/login", [
            "user" => "Najib",
            "password" => "Rahasia"
        ])->assertSessionHas("user", "Najib")
          ->assertRedirect("/todolist");
    }

    public function testLoginEmpty()
    {
        $this->post("/login", [])->assertSeeText("User or password is required");
    }

    public function testLoginUserInvalid()
    {
        $this->post("/login", [
            "user" => "salah",
            "password" => "salah"
        ])->assertSeeText("User or password is wrong");
    }
}
