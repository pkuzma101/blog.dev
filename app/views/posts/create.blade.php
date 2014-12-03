@extends('layouts.master')

@section('content')

{{ Form::open(array('action' => 'PostsController@store'))}}
	<input type="text" name="first_name" value="{{{ Input::old('first_name') }}}">First Name</input>
	<input type="text" name="last_name" value ="{{{ Input::old('last_name') }}}">Last Name</input>
	<input type="submit" value="submit">
	{{ Form::close()}}
	@stop