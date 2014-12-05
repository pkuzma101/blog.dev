<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/blog.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="/posts">Home<span class="sr-only">(current)</span></a></li>
	        <li><a href="/posts/create">New<span class="sr-only">(current)</span></a></li>
	        <li><a href="/resume">Resume<span class="sr-only">(current)</span></a></li>
	        <li><a href="/portfolio">Portfolio<span class="sr-only">(current)</span></a></li>
	        <li><a href="https://github.com/pkuzma101">GitHub<span class="sr-only">(current)</span></a></li>
	        <li><a href="https://www.linkedin.com/pub/paul-kuzma/a9/a7b/170/">LinkedIn<span class="sr-only">(current)</span></a></li>
	       </ul>
	     </div><!-- /.navbar-collapse -->
	   </div><!-- /.container-fluid -->
	</nav>
    @yield('content')
    <script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>