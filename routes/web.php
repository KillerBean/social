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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'PagesController@index');

Route::get('profile', 'PagesController@profile');
Route::get('settings', 'PagesController@settings');
Route::get('blade', 'PagesController@blade');
Route::get('curl', 'PagesController@curl');

Route::get('users', ['uses' => 'UsersController@index']);
//Route::get('users/create', ['uses' => 'UsersController@create']);
//Route::post('users', ['uses' => 'UsersController@store']);

/*
Route::get('users', function(){
	$users = [
		'0' => [
			'first_name' => 'Renato',
			'last_name' => 'Hysa',
			'location' => 'Albania'
		],
		'1' => [
			'first_name' => 'Jessica',
			'last_name' => 'Alba',
			'location' => 'USA'
		],
	];
	return $users;
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index');
