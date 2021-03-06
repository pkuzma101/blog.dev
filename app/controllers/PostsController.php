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
		// Establishes connection between the post and user who created it
		$post = Post::paginate(3);
		$query = Post::with('user');
		// Grabbing material from the search bar
		$search = Input::get('search');

		// If the search bar has info...
		if(!is_null($search)) {
			// Look for anything within the titles or bodies of entries that are similar to search material
			$query->where('title', 'LIKE', "%{$search}%")
				  ->orWhere('body', 'LIKE', "%{$search}%"); 
		}
		// Display the found posts starting with the latest-created ones
		$posts = $query->orderBy('created_at', 'desc')->paginate(3);

		return View::make('posts.index')->with('posts', $posts)->with('search', $search);
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
			
				$post = new Post();

				$post->user_id = Auth::id(); 
				$post->title = Input::get('title');
				$post->body = Input::get('body');
				if(Input::hasFile('image')) {
					$file = Input::file('image');
					$destinationPath = 'uploaded_images/';
					$filename = $file->getClientOriginalName();
					$file = $file->move($destinationPath, $filename);
					$post->image = $destinationPath . $filename;
					
				}	
				$post->save();

				Session::flash('successMessage', "Post saved successfully!");

				return Redirect::action('PostsController@show', $post->id);
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

