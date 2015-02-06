
@extends('layouts.master')
<title>Paul Kuzma - Web Developer</title>
@section('content')

<div id="titlePage">
	<div class="container-fluid" id="introSection">
		<!-- <div class="space-filler90"></div> -->
		<div id="titlePitch">
			<h2 id="titlePitchText">
				I am a Full Stack Web Developer in Indianapolis, Indiana who can create a
				beautiful and enticing front end experience as well as smooth back end functionality.
			</h2>
		</div>
	</div>
	<div class="container-fluid" id="featuredSection">
		<span id="featuredTitle"><h2 id="featuredTitle">Featured Work</h2></span>
		<div class="space-filler"></div>
		<div class="row-fluid" id="featuredRow">
			<div class="col-md-4 featuredSquare" id="mentrSquare">
				<a href="http://worldmentr.org">
					<img src="/css/images/mentr.png" class="imageSquare">
					<span class="hoverSquare" id="mentrHoverSquare">
						<p class="whiteTextHeader">World Mentor</p>
						<p class="whiteTextContent">
							An interactive website where people can give or receive mentoring
							advice across the web.
						</p>
					</span>
				</a>
			</div>
			<div class="col-md-4 featuredSquare" id="fantasySquare">
				<a href="/projects/final_fantasy/final_fantasy_characters.php">
					<img src="/css/images/fantasy.png" class="imageSquare">
					<span class="hoverSquare" id="fantasyHoverSquare">
						<p class="whiteTextHeader">Character Database</p>
						<p class="whiteTextContent">
							A database that stores information about characters in a 
							MySQL database.
						</p>
					</span>
				</a>
			</div>
			<div class="col-md-4 featuredSquare">
				<a href="/projects/whackamole/puppy.html" id="whackSquare">
					<img src="/css/images/whack.png" class="imageSquare">
					<span class="hoverSquare" id="whackHoverSquare">
						<p class="whiteTextHeader">Pet All Puppies</p>
						<p class="whiteTextContent">
							This app utilizes JavaScript and jQuery to create
							a whack-a-mole game.
						</p>
					</span>
				</a>
			</div>
		</div>
		<div id="portfolioLinkRow">
			<div class="boxedButton">
				<p class="buttonText">
					{{ HTML::link("/portfolio", "View Portfolio") }}
				</p>
			</div>
		</div>
	</div>
	<div id="footerContainer">
		<footer class="footerSection">
			<div class="footerRow">
				<div class="row-fluid">
					<div class="col-xs-6 col-sm-3">
						<h3 class="footerLogo">Paul Kuzma</h3>
					</div>
					<div class="col-xs-6 col-sm-3">
						{{ HTML::mailto('kuzma.paul@gmail.com', 'Email') }}

					</div>
					<div class="col-xs-6 col-sm-3">
						<a href="https://www.linkedin.com/pub/paul-kuzma/a9/a7b/170/"><p>LinkedIn</p></a>
					</div>
					<div class="col-xs-6 col-sm-3">
						<a href="https://github.com/pkuzma101"><p>Github</p></a>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>


@stop