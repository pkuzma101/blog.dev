<?php

class PostsController extends \BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('user')->paginate(4);
		$data = ['posts' => $posts];
		return View::make('posts.index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()  
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		
		if($validator->fails()) {
			Log::error('Failed to save post!', Input::all());
			Session::flash('errorMessage', "Post could not be saved.");
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			if(Input::has('title') && Input::has('body')){
				$post->user_id = Auth::id(); 
				$post->title = Input::get('title');
				$post->body = Input::get('body');
				$post->save();

				Session::flash('successMessage', "Post saved successfully!");

				return Redirect::action('PostsController@show', $post->id);
					}
				} 	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try {
		$post = Post::findorFail($id);
		} catch(Exception $e) {
			App::abort(404);
		}

		return View::make('posts.show')->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('posts.edit')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);

		if($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();

			Session::flash('sucessMessage', "Post saved successfuly!");

			return Redirect::action('PostsController@show', $post->id);
	}
}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		return Redirect::action('PostsController@index');
	}

}

