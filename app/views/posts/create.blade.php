@extends('layouts.master')

@section('content')

{{ Form::open(array('action' => 'PostsController@store'))}}
	<div class="container">
		<h1>Welcome to the Nether Regions of the Soul</h1>
		<p>
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" value="{{{ Input::old('title') }}}"></input>
		</p>
		<p>
			<label for="body">Post</label>
			<textarea cols="130" rows="25" class ="form-control" name="body" value ="{{{ Input::old('body') }}}"></textarea>
		</p>
		<input type="submit" value="submit">
	</div>
	{{ Form::close()}}
	@stop



