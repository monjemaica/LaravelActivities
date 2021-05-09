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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', function () {
    return redirect('/posts');
});

Auth::routes();

Route::get('/user/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('/user/{name?}', function ($name = null) {
    return 'User ' . $name;
});


Route::get('/check', function () {
    return "Allowed";
})->middleware('check.age');

Auth::routes();

Route::resource('/users', 'UserController');
Route::resource('/posts', 'PostController');
Route::resource('/comments', 'CommentController');
