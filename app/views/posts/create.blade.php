@extends('layouts.master')
@section('content')

{{ Form::open(array('action' => 'PostsController@store'))}}
	<div class="container">  
	{{$errors->first('title', '<span class="help-block">:message</span>');}}
	{{$errors->first('body', '<span class="help-block">:message</span>');}}
		<h1>Welcome to the Nether Regions of the Soul</h1>
		<p>
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" value="{{{ Input::old('title') }}}"></input>
		</p>
		<p>
			<label for="body">Body</label>
			<textarea cols="100" rows="25" class="form-control" name="body" value ="{{{ Input::old('body') }}}"></textarea>
		</p>
		<input type="submit" value="Submit" class="btn btn-danger">
	</div>
	{{ Form::close()}}
	@stop



