@extends('layouts.master')

@section('content')

<div class="container">
	<div class="container" id="blog-body">
		<h1>Paul Kuzma's Blog</h1>
		<br>
		<div class="container" id="title">
			@foreach($posts as $post)
			<p class="heading"> 
				{{{ $post->title }}} - {{{$post->created_at->diffForHumans()}}}
			</p>
		</div>
		<div class="container" id="content">
			<p id="blog-entry">
				{{{ $post->body }}}
			</p>
			<br>
			@endforeach
		</div> <!-- ends blog entry container -->
		<div id="pagination">
			{{ $posts->links() }}
		</div>
	</div>  <!-- ends blog body container -->
</div> <!-- ends overall container -->

@stop