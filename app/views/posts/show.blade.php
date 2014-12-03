@extends('layouts.master')

@section('content')

	<p>
		{{{ $post->id }}}
		{{{ $post->title }}}
		{{{ $post->content }}}
	</p>

@stop