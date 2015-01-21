<nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
    	</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
	            <li><a href="/posts">Home</a></li>
	            <li>
	                @if (Auth::check())
	                <a href="/posts/create">New<span class="sr-only">(current)</span></a>
	                @endif
	            </li>
	            <li><a href="/resume">Resume</a></li>
	            <li><a href="/portfolio">Portfolio</a></li>
	            @if(Auth::guest())
	            <li>
	                <a href="{{{ action('HomeController@showLogin') }}}">Login</a>
	            </li>
	            @else
	            <li>
	                <a href="{{{ action('HomeController@doLogout') }}}">Logout</a>
	            </li>
	            @endif
	            <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Links<span class="caret"></span></a>
	                <ul class="dropdown-menu" role="menu">
	                    <li><a href="https://www.linkedin.com/pub/paul-kuzma/a9/a7b/170/">LinkedIn</a></li>
	                    <li><a href="https://github.com/pkuzma101">GitHub</a></li>
	                </ul>
	            </li>
	        </ul>
	    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>