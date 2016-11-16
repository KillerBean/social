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

Route::get('profile', 'PagesController@profile')->middleware('auth');
Route::get('settings', 'PagesController@settings')->middleware('auth');
Route::get('curl', 'PagesController@curl')->middleware('auth');

Route::group(['as' => 'users.', 'prefix' => 'users'], function(){
	Route::get('', ['as' => 'index', 'uses' => 'UsersController@index'])->middleware('auth');
	Route::post('', ['as' => 'store', 'uses' => 'UsersController@store'])->middleware('auth');
	Route::get('create', ['as' => 'create', 'uses' => 'UsersController@create'])->middleware('auth');
	Route::get('{id}', ['as' => 'show', 'uses' => 'UsersController@show'])->middleware('auth');
	Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'UsersController@edit'])->middleware('auth');
	Route::put('{id}', ['as' => 'update', 'uses' => 'UsersController@update'])->middleware('auth');
});

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index'])->middleware('admin');
