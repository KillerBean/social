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

Route::get('bmf-chart', 'PagesController@bmf')->middleware('auth');
Route::get('profile/{id}', 'UserController@show')->middleware('auth');
Route::get('befriend/{id}', 'FriendController@SendFriendRequest')->middleware('auth');
Route::get('acceptfriend/{id}', 'FriendController@AcceptFriendRequest')->middleware('auth');
Route::get('unfriend/{id}', 'FriendController@UnfriendOrCancelRequest')->middleware('auth');

Route::group(['as' => 'users.', 'middleware' => 'admin', 'prefix' => 'users'], function(){
	Route::get('', ['as' => 'index', 'uses' => 'UserController@index']);
	Route::post('', ['as' => 'store', 'uses' => 'UserController@store']);
	Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
	Route::get('{id}', ['as' => 'show', 'uses' => 'UserController@show']);
	Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
	Route::put('{id}', ['as' => 'update', 'uses' => 'UserController@update']);
	Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'UserController@destroy']);
});

Route::post('post.create', 'PostController@createPost')->name('post.create');
Route::get('post-delete/{post_id}', 'PostController@deletePost')->name('post.delete');
Route::post('post/edit','PostController@editPost')->name('post-edit');
Route::post('post/like','PostController@likePost')->name('post-like');
route::post('post-image/upload', 'PostController@uploadPostImage')->name('post.image-upload');

Route::get('search/{query?}', 'SearchController@search')->name('search');
Route::get('dashboard', 'PostController@dashboard')->name('dashboard')->middleware('auth');
Route::get('account', 'UserController@account')->name('account')->middleware('auth');
Route::get('friends', 'FriendController@index')->name('friends')->middleware('auth');
Route::post('update-account','UserController@saveAccount')->name('account.save')->middleware('auth');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Auth::routes();

Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index'])->middleware('admin');
Route::get('/admin/reports', ['as' => 'admin.reports', 'uses' => 'AdminController@reports'])->middleware('admin');
Route::get('/', 'PagesController@index');
