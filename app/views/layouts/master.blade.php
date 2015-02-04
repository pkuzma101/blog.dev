<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/blog.css" type="text/css">
    <link rel="stylesheet" href="/css/small_device_blog.css">
</head>
<body>
	@include('partials.navbar')

	@if (Session::has('successMessage'))
    	<div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif
	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="/js/parallax.js" type="text/javascript"></script>
    <script src="/js/blog.js" type="text/javascript"></script> 
</body>
</html>