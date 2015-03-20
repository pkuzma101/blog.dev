
@extends('layouts.master')
<title>Paul Kuzma's Portfolio</title>
@section('content')

<h1 id="port-header">Paul Kuzma's Portfolio</h1>
<div class="space-filler60"></div>
<div class="container-fluid" id="portfolioPage">
	<section id="squareSection">
		<div class="container" id="main-container">
			<div class="row" id="capstone-box">
				<div class="col-md-4"></div>
				<div class="col-md-4" id="portMentSquare">
					<a href="http://worldmentr.org">
						<img src="/css/images/mentr.png" class="portPic">
						<span class="portHover center-block" id="portMentHover">
							<p class="portAppName">World Mentor</p>
							<p class="portAppContent">
								An interactive website where people can give or receive mentoring advice across the web.
							</p>
						</span>
					</a> 
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="space-filler"></div>
			<div class="row">
				<div class="col-md-4" id="portWhackSquare">
					<a href="/projects/whackamole/puppy.html">
						<img src="/css/images/whack.png" class="portPic">
						<span class="portHover center-block" id="portWhackHover">
							<p class="portAppName">Pet All Puppies</p>
							<p class="portAppContent">
								This app utilizes JavaScript and jQuery to create
								a whack-a-mole game.
							</p>
						</span>
					</a>
				</div>
				<div class="col-md-4" id="portFantasySquare">
					<a href="/projects/final_fantasy/final_fantasy_characters.php">
						<img src="/css/images/fantasy.png" class="portPic">
						<span class="portHover center-block" id="portFantasyHover">
							<p class="portAppName">Character Database</p>
							<p class="portAppContent">
								A database that stores information about characters in a 
								MySQL database.
							</p>
						</span>
					</a>
				</div>
				<div class="col-md-4" id="portTodoSquare">
					<a href="/projects/todo_list/sql_todo_list.php">
						<img src="/css/images/todo.png" class="portPic">
						<span class="portHover center-block" id="portTodoHover">
							<p class="portAppName">To-Do List</p>
							<p class="portAppContent">
								A digital things-to-do list that uses MySQL to add and subtract tasks. 
							</p>
						</span>
					</a>
				</div>
			</div>
			<div class="space-filler"></div>
			<div class="row">
				<div class="col-md-4" id="portAlphabetSquare">
					<a href="/projects/alphabet_soup/alphabet_soup.php">
						<img src="/css/images/alphabet.png" class="portPic">
						<span class="portHover center-block" id="portAlphabetHover">
							<p class="portAppName">Alphabet Soup</p>
							<p class="portAppContent">
								An app that takes any string(s) fed to it and rearranges the letters in alphabetical order.
							</p>
						</span>
					</a>
				</div>
				<div class="col-md-4" id="portNationalSquare">
					<a href="/projects/national_parks/national_parks.php">
						<img src="/projects/national_parks/img/canoe.jpg" class="portPic">
						<span class="portHover center-block" id="portNationalHover">
							<p class="portAppName">National Parks Database</p>
							<p class="portAppContent">
								An app that uses MySQL to store information about various national parks in a table.
							</p>
						</span>
					</a>
				</div>
				<div class="col-md-4" id="portPalindromeSquare">
					<a href="/projects/palindrome/palindrome.php">
						<img src="/css/images/palindrome.png" class="portPic">
						<span class="portHover center-block" id="portPalindromeHover">
							<p class="portAppName">Palindrome</p>
							<p class="portAppContent">
								An app that takes an entered string and judges whether or not it is a palindrome.
							</p>
						</span>
					</a>
				</div>	
			</div> <!-- row -->
		</div> <!-- main-container closes here -->
	</section>
</div>


@stop