<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/add/board', 'MainController@PostAddBoard')->name('add.board');
Route::post('/add/todo', 'MainController@PostTodo')->name('add.todo');
Route::get('/delete/todo/{id}', 'MainController@DeleteTodo')->name('delete.todo');
Route::get('/completed/todo/{id}', 'MainController@CompletedTodo')->name('completed.todo');
Route::Post('/edit/todo', 'MainController@PostEditTodo')->name('edit.todo');
