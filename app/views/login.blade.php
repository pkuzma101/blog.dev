@extends('layouts.master')

@section('content')

{{ Form::open(['action' => 'HomeController@doLogin'])}}

{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email']) }}
{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

{{ Form::submit('Log in!', ['class' => 'btn btn-primary']) }}


{{ Form::close() }}


@stop