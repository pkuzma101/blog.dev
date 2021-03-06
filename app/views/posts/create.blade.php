@extends('layouts.master')
@section('content')

{{ Form::open(array('action' => 'PostsController@store', 'files' => true)) }}
	<div class="container">  
	{{$errors->first('title', '<span class="help-block">:message</span>');}}
	{{$errors->first('body', '<span class="help-block">:message</span>');}}
		<h1>Create a Blog Entry</h1>
		<p>
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" value="{{{ Input::old('title') }}}"></input>
		</p>
		<p>
			<label for="body">Body</label>
			<textarea cols="100" rows="25" class="form-control" name="body" value ="{{{ Input::old('body') }}}"></textarea>
		</p>
		<p>
			<label for="image">Upload an Image - optional</label>
			<input type="file" class="form-control" name="image" placeholder="Upload an Image">
		</p>
		<input type="submit" value="Submit" class="btn btn-danger">
	</div>
	{{ Form::close()}}
	@stop



