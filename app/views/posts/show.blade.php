@extends('layouts.master')

@section('content')

	<p>
		{{{ $post->id }}}
		{{{ $post->title }}}
	</p>
	<p>
		{{{ $post->body }}}
	</p>

@stop