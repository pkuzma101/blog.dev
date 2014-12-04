@extends('layouts.master')

@section('content')

	@foreach($posts as $post)
	<p>
		{{{ $post->id }}}
		{{{ $post->title }}}
	</p>
	<p>
		{{{ $post->body }}}
	</p>
	@endforeach

@stop