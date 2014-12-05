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

Route::get('portfolio', 'HomeController@showPortfolio');

Route::get('sayhello/{name}', 'HomeController@sayHello');
Route::get('/rolldice/{guess}', 'HomeController@rollDice');

Route::resource('posts', 'PostsController');

Route::get('orm-test', function ()
{
 //    $post1 = new Post();
	// $post1->title = 'Eloquent is awesome!';
	// $post1->body  = 'It is super easy to create a new post.';
	// $post1->save();

	// $post2 = new Post();
	// $post2->title = 'Post number two';
	// $post2->body  = 'The body for post number two.';
	// $post2->save();

	// $posts = Post::all();
	// return $posts;

});



// Route::get('portfolio', function() {
// 	return View::make('portfolio');
// });

