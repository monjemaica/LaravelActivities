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
});

Auth::routes();

Route::get('/user/{id}', function($id){
    return 'User '.$id;
});

Route::get('/user/{name?}', function($name=null){
    return 'User '.$name;
});

Route::get('/home', function(){
    return 'Not Allowed';
});

Route::get('/check', function(){
    return "Allowed";
})->middleware('check.age');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@index')->name('users');
Route::resource('/users', 'UserController');
Route::resource('/posts', 'PostController');
