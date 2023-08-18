<?php

namespace Tests\Feature;

use App\Service\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{

    private UserService $userService;

    protected function setUp() : void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("Najib", "Rahasia"));
    }

    public function testLoginNotFound()
    {
        self::assertFalse($this->userService->login("salah", "salah"));
    }

    public function testLoginWrongPassword()
    {
        self::assertFalse($this->userService->login("Najib", "salah"));
    }



}
