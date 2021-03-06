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

Route::get("/users/login", "UserController@show_login");
Route::get("users/create", "UserController@show_register");
Route::post("/users/create", "UserController@create");
Route::get("/users/verify_account/{token}", "UserController@verify_account");
Route::post("/users/login", "UserController@login");
Route::get("/users/dashboard", "UserController@user_dashboard");


//

