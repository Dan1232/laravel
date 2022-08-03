<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    

    Route::get('/tasks', 'TaskController@index')->name('task.index');
    Route::post('/task', 'TaskController@store')->name('task.add');
    Route::delete('/task/{task}', 'TaskController@destroy')->name('task.delete');


Route::get('/login', 'UserController@loginForm')->name('login.str');
Route::post('/login', 'UserController@loginvhod')->name('login');

Route::get('/register', 'UserController@registerForm')->name('register.str');
Route::post('/register', 'UserController@createUser')->name('register.create');

Route::get('/logout', 'UserController@logout')->name('logout');