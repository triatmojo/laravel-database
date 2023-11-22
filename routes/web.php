<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodolistController;
use App\Http\Middleware\MemberMiddleware;
use App\Http\Middleware\GuestMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view("welcome");
//});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);

Route::get('/template', function(){
    return view('template');
});

//Route::get('/login', UserController::class, 'login');
//Route::post('/dologin', UserController::class, 'doLogin');
//Route::post('/logout', UserController::class, 'logout');


Route::controller(UserController::class)
    ->group(function(){
        Route::get('/login', 'login')->middleware([GuestMiddleware::class]);
        Route::post('/login', 'dologin')->middleware([GuestMiddleware::class]);
        Route::post('/logout', 'logout')->middleware([MemberMiddleware::class]);
    });

Route::controller(TodolistController::class)
    ->middleware([MemberMiddleware::class])
    ->group(function (){
        Route::get("/todolist", "getTodo");
        Route::post("/todolist", "addTodo");
        Route::post("/todolist/{id}/delete", "removeTodo");
    });

Route::controller(App\Http\Controllers\CategoryController::class)
    ->middleware([MemberMiddleware::class])
    ->group(function (){
        Route::get("/category", "getCategory");
        Route::post("/category", "addCategory");
        Route::post("/category/{id}/delete", "removeCategory");
    });

