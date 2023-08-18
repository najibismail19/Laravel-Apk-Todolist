<?php
namespace App\Service\Impl;

use App\Service\UserService;

Class UserServiceImpl implements UserService {

    private array $users = [
        "Najib" => "Rahasia"
    ];

    public function login(string $user, string $password) : bool
    {
        if(empty($this->users[$user])) {
            return false;
        }
        $correctPassword = $this->users[$user];
        return $correctPassword == $password;
    }
}
