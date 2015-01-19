
@extends('layouts.master')
<title>Paul Kuzma's Portfolio</title>
@section('content')

<h1 id="port-header">Paul Kuzma's Portfolio</h1>
<div class="space-filler60"></div>
<div class="container-fluid" id="portfolioPage">
	<div class="container" id="main-container">
		<div class="row" id="capstone-box">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<a href="http://worldmentr.org">
					<img src="/css/images/logo.jpg" id="portPic" data-toggle="tooltip" data-placement="left" title="Click here to see a website I helped develop">
				</a> 
				<a href="https://github.com/worldmentr/capstone">
					<i class="fa fa-git-square" id="gitLogo" data-toggle="tooltip" data-placement="top" title="Click here to see my code on Git"></i>
				</a>
				<p>World Mentr</p>
			</div>
			<div class="col-md-4"></div>
		</div>
		<div class="space-filler"></div>
		<div class="row">
			<div class="col-md-4">
				<a href="/projects/whackamole/puppy.html">
					<img src="/projects/whackamole/puppies/dalek.jpg" id="portPic" data-toggle="tooltip" data-placement="left" title="Click here to play the game">
				</a>
				<a href="https://github.com/pkuzma101/blog.dev/tree/master/public/whackamole">
					<i class="fa fa-git-square" id="gitLogo" data-toggle="tooltip" data-placement="top" title="Click here to see my code on Git"></i></a>
				<p>Whack-a-Mole Game</p>
			</div>
			<div class="col-md-4">
				<a href="/projects/national_parks/national_parks.php">
					<img src="/projects/national_parks/img/canoe.jpg" id="portPic" data-toggle="tooltip" data-placement="left" title="Click here to see the app">
				</a>
				<a href="https://github.com/pkuzma101/blog.dev/tree/master/public/national_parks">
					<i class="fa fa-git-square" id="gitLogo" data-toggle="tooltip" data-placement="top" title="Click here to see my code on Git"></i></a>
				<p>National Parks Database</p>
			</div>
			<div class="col-md-4" id="box3">
				<a href="/projects/todo_list/sql_todo_list.php">
					<img src="/projects/todo_list/images/computer_ninja.jpg" id="portPic" data-toggle="tooltip" data-placement="left" title="Click here to see the app">
				</a>
				<a href="https://github.com/pkuzma101/blog.dev/tree/master/public/todo_list">
					<i class="fa fa-git-square" data-toggle="tooltip" data-placement="top" title="Click here to see my code on Git"></i></a>
				<p>To-Do List App</p>
			</div>
		</div>
		<div class="space-filler"></div>
		<div class="row">
			<div class="col-md-4">
				<a href="/projects/alphabet_soup/alphabet_soup.php">
					<img src="/projects/alphabet_soup/images/soup.png" id="portPic" data-toggle="tooltip" data-placement="left" title="Click here to see the app">
				</a>
				<p>Alphabet Soup</p>
			</div>	
		</div>
	</div> <!-- main-container closes here -->
</div>


@stop