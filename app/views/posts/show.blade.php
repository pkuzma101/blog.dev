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
			<p id="blog-entry">
				{{{ $post->body }}}
			</p>
		</div> <!-- end content container -->
	</div> <!-- end blog body container -->
</div>  <!-- end container -->

@stop