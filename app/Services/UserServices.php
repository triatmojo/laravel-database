<?php

namespace App\Services;

interface UserServices
{
    public function login(string $username, string $password) : bool;
}
