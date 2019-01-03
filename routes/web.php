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

//Book Route
Route::post('book/create', 'BookController@create');
Route::post('book/edit/{id}', "BookController@edit");
Route::get("book/{id}", "BookController@show");
Route::post("book/delete/{id}", "BookController@destroy");

//Borrow Book Rout


//user Route
Route::post("user/create", "UserController$create");
Route::get("user/verify_account/{$token}", "UserController@verify_account");
Route::get("user/login", "UserController@login");

