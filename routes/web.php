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

Route::group(['as' => 'users.', 'prefix' => 'users'], function(){
	Route::get('', ['as' => 'index', 'uses' => 'UsersController@index']);
	Route::post('', ['as' => 'store', 'uses' => 'UsersController@store']);
	Route::get('create', ['as' => 'create', 'uses' => 'UsersController@create']);
	Route::get('{id}', ['as' => 'show', 'uses' => 'UsersController@show']);
	Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'UsersController@edit']);
	Route::put('{id}', ['as' => 'update', 'uses' => 'UsersController@update']);
});



Auth::routes();

Route::get('/home', 'HomeController@index');
