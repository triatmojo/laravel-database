<?php

namespace App\Services\Impl;

use App\Services\UserServices;

class UserServicesImpl implements UserServices
{
    private $users = [
        "triatmojo" => "rahasia",
    ];

    public function login(string $username, string $password): bool
    {
        if(!isset($username) || !isset($password)) {
            return false;
        }

        if(empty($username) || empty($password)) {
            return false;
        }

        if(!isset($this->users[$username])) {
            return false;
        }

        echo "Test";

        $correctPassword = $this->users[$username];
        return $correctPassword == $password;
    }
}
