@extends('layouts.master')

@section('content')

<div class="container">
	<div class="container" id="blog-body">
		<h1>Paul Kuzma's Blog</h1>
		<div class="container" id="title">
			@foreach($posts as $post)
			<p class="heading">
				{{{ $post->id }}} 
				{{{ $post->title }}}
				{{{$post->created_at->diffForHumans()}}}
			</p>
		</div>
		<div class="container" id="content">
			<p id="blog-entry">
				{{{ $post->body }}}
			</p>

			@endforeach
		</div> <!-- ends blog entry container -->
		{{ $posts->links() }}
	</div>  <!-- ends blog body container -->
			
	
</div> <!-- ends overall container -->

@stop