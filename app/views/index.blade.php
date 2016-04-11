
@extends('layouts.master')
<title>Paul Kuzma - Web Developer</title>
@section('content')

<div id="titlePage">
	<div class="container-fluid" id="introSection">
		<!-- <div class="space-filler90"></div> -->
		<div id="titlePitch">
			<h2 id="titlePitchText">
				I am a Full Stack Web Developer who can create a
				beautiful and enticing front end experience as well as smooth back end functionality.
			</h2>
		</div>
	</div>
	<div class="container-fluid" id="featuredSection">
		<span id="featuredTitle"><h2 id="featuredTitle">Featured Work</h2></span>
		<div class="space-filler"></div>
		<div class="row-fluid" id="featuredRow">
			<div class="col-md-4" id="mentrSquare">
				<a href="/projects/bakery/bakery.php">
					<img src="/css/images/bakery.png" class="imageSquare center-block">
					<span class="hoverSquare center-block" id="mentrHoverSquare">
						<p class="whiteTextHeader">Bakery</p>
						<p class="whiteTextContent">
							An AngularJS-based bake shop app where orders and prices are calculated in real time.
						</p>
					</span>
				</a>
			</div>
			<div class="col-md-4" id="fantasySquare">
				<a href="/projects/final_fantasy/characters.php">
					<img src="/css/images/fantasy.png" class="imageSquare center-block">
					<span class="hoverSquare center-block" id="fantasyHoverSquare">
						<p class="whiteTextHeader">Character Database</p>
						<p class="whiteTextContent">
							A database that stores information about characters in a 
							MySQL database.
						</p>
					</span>
				</a>
			</div>
			<div class="col-md-4">
				<a href="/projects/whackamole/puppy.html" id="whackSquare">
					<img src="/css/images/whack.png" class="imageSquare center-block">
					<span class="hoverSquare center-block" id="whackHoverSquare">
						<p class="whiteTextHeader">Pet All Puppies</p>
						<p class="whiteTextContent">
							This app utilizes JavaScript and jQuery to create
							a whack-a-mole game.
						</p>
					</span>
				</a>
			</div>
		</div>
		<div class="row-fluid">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div id="portfolioLinkRow">
					<div class="boxedButton">
						<p class="buttonText">
							{{ HTML::link("/portfolio", "View Portfolio") }}
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	@include('partials.footer')

</div>


@stop