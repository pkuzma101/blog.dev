<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	 <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        	<ul class="nav navbar-nav">
		        	<li class="active">
		        		<a href="/posts">Home<span class="sr-only">(current)</span>
		        		</a>
		        	</li>
		        	<li>
		        		@if (Auth::check())
		        		<a href="/posts/create">New<span class="sr-only">(current)</span></a>
		        		@endif
		        	</li>
		        	<li>
		        		<a href="/resume">Resume<span class="sr-only">(current)</span></a>
		        	</li>
		        	<li>
		        		<a href="/portfolio">Portfolio<span class="sr-only">(current)</span></a>
		        	</li>
		        	<li>
		        		<a href="https://github.com/pkuzma101">GitHub<span class="sr-only">(current)</span></a>
		        	</li>
		        	<li>
		        		<a href="https://www.linkedin.com/pub/paul-kuzma/a9/a7b/170/">LinkedIn<span class="sr-only">(current)</span></a>
		        	</li>
		        </ul>
		        <ul class="nav navbar-nav navbar-right">
		        	@if(Auth::guest())
		        	<li>
		        		<a href="{{{ action('HomeController@showLogin') }}}">Login<span class="sr-only">(current)</span></a>
		        	</li>
		        	@else
		        	<li id="user-email">
		        		<p>
		        			Welcome {{{ Auth::user()->email }}}
		        		</p>
		        	</li>
		        	<li>
		        		<a href="{{{ action('HomeController@doLogout') }}}">Logout</a>
		        	</li>
		        	@endif
	       		</ul>
	        </div><!-- /.navbar-collapse -->
	    </div><!-- /.container-fluid -->
	</div>
</nav>