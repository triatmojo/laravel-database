<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private UserServices $userServices;

    /**
     * @param UserServices $userServices
     */
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }


    public function login() : Response
    {
        return response()->view('user.login');
    }

    public function doLogin(Request $request): Response | RedirectResponse
    {
        $username = $request->input("user");
        $password = $request->input("password");

        if(empty($username) || empty($password)) {
             return response()->view("user.login", [
                 "title" => "Login",
                 "error" => "Username or Password is empty"
             ]);
        }

        if($this->userServices->login($username, $password)) {
            $request->session()->put("user", $username);
            return redirect('/');
        }

        return response()->view("user.login", [
            'title' => "Login Page",
            'error' => "Username or Password not valid"
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/login');
    }
}
