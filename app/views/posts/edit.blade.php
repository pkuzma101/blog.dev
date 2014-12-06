@extends('layouts.master')
@section('content')

{{ Form::model($post, (array('action' => ['PostsController@update', $post->id], 'method' => 'PUT')))}}
	<div class="container">
	{{$errors->first('title', '<span class="help-block">:message</span>');}}
	{{$errors->first('body', '<span class="help-block">:message</span>');}}
		<h1 class="heading">Create a Blog Entry</h1>
		<p class="heading">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" value="{{{ $post->title }}}"></input>
		</p>
		<p class="heading">
			<label for="body">Body</label>
			<textarea cols="130" rows="25" class ="form-control" name="body" value ="{{{ $post->body }}}"></textarea>
		</p>
		<input type="submit" value="Submit" class="btn btn-danger">
	</div>
	{{ Form::close()}}
	@stop



