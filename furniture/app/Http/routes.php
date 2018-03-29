<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Set the default documentation version...
 */
define('DEFAULT_VERSION', '5.1');

/**
 * Convert some text to Markdown...
 */
function markdown($text) {
	return (new ParsedownExtra)->text($text);
}

Route::get('/', 'HomeController@index');
Route::get('/executors', 'HomeController@executors');
Route::get('/executor/{id}', 'UserController@show');
Route::get('/search', 'HomeController@modelsearch');

Route::resource('user', 'UserController');
Route::resource('model', 'ModelController');


// Authentication routes...
Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

// Registration routes...
Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@register');

Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@profile');
Route::get('/photo/{hash}', 'UserController@photo');

Route::get('/model_photo/{hash}', 'ModelController@photo');
Route::post('/model/photo/add/{id}', 'ModelController@photo_add');
Route::post('/model/photo/main/{id}', 'ModelController@photo_set_main');
Route::post('/model/photo/delete/{id}', 'ModelController@photo_delete');

Route::post('/model/execute/{id}', 'ModelController@execute');
