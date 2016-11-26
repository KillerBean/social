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
Route::get('/', 'PagesController@index')->middleware('auth');

Route::get('profile', 'PagesController@profile')->middleware('auth');
Route::get('settings', 'PagesController@settings')->middleware('auth');
Route::get('curl', 'PagesController@curl')->middleware('auth');

Route::group(['as' => 'users.', 'prefix' => 'users'], function(){
	Route::get('', ['as' => 'index', 'uses' => 'UserController@index'])->middleware('auth');
	Route::post('', ['as' => 'store', 'uses' => 'UserController@store'])->middleware('auth');
	Route::get('create', ['as' => 'create', 'uses' => 'UserController@create'])->middleware('auth');
	Route::get('{id}', ['as' => 'show', 'uses' => 'UserController@show'])->middleware('auth');
	Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'UserController@edit'])->middleware('auth');
	Route::put('{id}', ['as' => 'update', 'uses' => 'UserController@update'])->middleware('auth');
});

Route::post('post.create', 'PostController@postCreatePost')->name('post.create');
Route::get('post-delete/{post_id}', 'PostController@deletePost')->name('post.delete');
Route::post('post/edit','PostController@editPost')->name('post-edit');

Route::get('dashboard', 'PostController@getDashboard')->name('dashboard')->middleware('auth');
Route::get('account', 'UserController@account')->name('account')->middleware('auth');
Route::post('update-account','UserController@saveAccount')->name('account.save')->middleware('auth');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index'])->middleware('admin');
