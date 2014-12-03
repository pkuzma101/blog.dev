@extends('layouts.master')

@section('content')

{{ Form::open(array('action' => 'PostsController@store'))}}
	<h1>Welcome to the Nether Regions of the Soul</h1>
	<p>
		<label for="title">Title</label>
		<input type="text" name="title" value="{{{ Input::old('first_name') }}}"></input>
	</p>
	<p>
		<label for="content">Post</label>
		<textarea cols="130" rows="25" name="content" value ="{{{ Input::old('content') }}}"></textarea>
	</p>
	<input type="submit" value="submit">
	{{ Form::close()}}
	@stop



