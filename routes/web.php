<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'PagesController@index');

Route::get('profile', 'PagesController@profile');
Route::get('settings', 'PagesController@settings');
Route::get('curl', 'PagesController@curl');

Route::get('users', ['uses' => 'UsersController@index']);
Route::post('users', ['uses' => 'UsersController@store']);
Route::get('users/create', ['uses' => 'UsersController@create']);
Route::get('users/{id}', ['uses' => 'UsersController@show']);
Route::get('users/{id}/edit', ['uses' => 'UsersController@edit']);

Auth::routes();

Route::get('/home', 'HomeController@index');
