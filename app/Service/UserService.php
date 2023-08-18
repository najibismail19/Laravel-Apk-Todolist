<?php
namespace App\Service;
interface UserService {
    public function login(string $user, string $password) : bool;
}
