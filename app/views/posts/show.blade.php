@extends('layouts.master')

@section('content')
<div class="container">
	<div class="container" id="blog-body">
		<div class="container" id="title">
			<br>
			<p class="heading">
				{{{ $post->title }}} - {{{$post->created_at->diffForHumans()}}}
			</p>
		</div>
		<div class="container" id="content">
			<div class="blog-entry">
				<p>
					{{{ $post->body }}}
				</p>
				@if(isset($post->image))
				<p>
					<img src="{{ asset($post->image) }}" class="blog-image" class="blog-entry">
				</p>
				@endif
			</div>
			{{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'delete']) }}
			<p class="buttons">{{ HTML::link('http://blog.dev/posts/' . $post->id . '/edit', 'Edit', array('class' => 'btn btn-primary')) }}
				{{ Form::submit('Delete!', ['class' => 'btn btn-danger']) }}
			{{ Form::close() }}</p>
		</div> <!-- end content container -->

	</div> <!-- end blog body container -->
</div>  <!-- end container -->

@stop

@section('bottomscript')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#delete-form').submit(function(e) {
				if(!confirm('Are you sure you want to delete this post?')) {
					e.preventDefault();
				}

		});
	</script>