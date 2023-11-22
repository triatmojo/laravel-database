<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testUserController()
    {
        $this->get('/login')
            ->assertSeeText("Login")
            ->assertSeeText("User")
            ->assertSeeText("Password");
    }

    public function testLoginFailed()
    {
        $this->post("/login", [])
            ->assertSeeText("Login")
            ->assertSeeText("User")
            ->assertSeeText("Password")
            ->assertSeeText("Username or Password is empty");
    }

    public function testLoginPasswordEmpty()
    {
        $this->post('/login',['user'=>'ahmad'])
            ->assertSeeText('Login')
            ->assertSeeText("Password")
            ->assertSeeText("User")
            ->assertSeeText('Username or Password is empty');

        $this->post('/login',['password'=>'ahmad'])
            ->assertSeeText('Login')
            ->assertSeeText("Password")
            ->assertSeeText("User")
            ->assertSeeText('Username or Password is empty');
    }

    public function testLoginUserAndPasswordNotEmpty()
    {
        $this->post('/login',['user'=>'ahmad','password'=>'salah'])
            ->assertSeeText('Login')
            ->assertSeeText("Password")
            ->assertSeeText("User")
            ->assertSeeText('Username or Password not valid');
    }


    public function testLoginSuccess()
    {
        $this->post('/login',['user'=>'triatmojo','password'=>'rahasia'])
            ->assertRedirect('/');
    }

}
