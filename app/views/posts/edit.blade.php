@extends('layouts.master')

@section('content')

{{ Form::model($post, (array('action' => ['PostsController@update', $post->id], 'method' => 'PUT')))}}
	<div class="container">
		<h1>Welcome to the Nether Regions of the Soul</h1>
		<p>
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" value="{{{ $post->title }}}"></input>
		</p>
		<p>
			<label for="body">Body</label>
			<textarea cols="130" rows="25" class ="form-control" name="body" value ="{{{ $post->body }}}"></textarea>
		</p>
		<input type="submit" value="submit" class="btn btn-alert">
	</div>
	{{ Form::close()}}
	@stop



