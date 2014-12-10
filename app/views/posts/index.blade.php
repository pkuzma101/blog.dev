@extends('layouts.master')

@section('content')

<div class="container">
	<div class="container" id="blog-body">
		<h1>Paul Kuzma's Blog</h1>
		@if(Auth::check())
		<h4>Welcome {{{ Auth::user()->email }}}</h4>
		@endif
		<br>
		<div class="container" id="title">
			@foreach($posts as $post)
			<p class="heading"> 
				{{{ $post->title }}} - {{{$post->created_at->diffForHumans()}}}
			</p>
		</div>
		<div class="container" id="content">
			<div class="blog-entry">
				<p>
					{{{ $post->body }}}
				</p>
				<p>
					<img src="{{{ asset($post->image) }}}" class="blog-image">
				</p>
			</div>
			<p>
				<button class="btn btn-danger delete-btn" data-post-id="{{{ $post->id }}}">Delete</button>
				{{ HTML::link('http://blog.dev/posts/' . $post->id . '/edit', 'Edit', array('class' => 'btn btn-primary')) }}
			</p>
			<br>
			@endforeach			
		</div> <!-- ends blog entry container -->
		<div id="pagination">
			{{ $posts->appends(['search' => $search])->links() }}
		</div>
		{{ Form::open(['method' => 'delete', 'id' => 'delete-form']) }}
		{{ Form::close() }}
	</div>  <!-- ends blog body container -->
</div> <!-- ends overall container -->

@stop