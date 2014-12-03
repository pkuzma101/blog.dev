<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('resume', 'HomeController@showResume');

Route::get('sayhello/{name}', 'HomeController@sayHello');
Route::get('/rolldice/{guess}', 'HomeController@rollDice');

Route::resource('posts', 'PostsController');


Route::get('portfolio', function() {
	return View::make('portfolio');
});

