@extends('layouts.master')
<title>Paul Kuzma's Portfolio</title>
@section('content')

<h1 id="port-header">Paul Kuzma's Portfolio</h1>
<br>
<div class="row" id="mainrow">
	<div class="container" id="main-container">
		<div class="row" id="first-row-boxes">
			<div class="box" id="box1">
				<a href="/whackamole/public/puppy.html">
					<img src="/whackamole/public/puppies/dalek.jpg" height="250px" width="250px" class="img-circle">
				</a>
				<a href="https://github.com/pkuzma101/blog.dev/tree/master/public/whackamole/public">
					<i class="fa fa-git-square" id="mole"></i></a>
				<p>Whack-a-Mole Game</p>
			</div>
			<div class="box" id="box2">
				<a href="/national_parks/national_parks.php">
					<img src="/national_parks/img/canoe.jpg" height="250px"width="250px" class="img-circle">
				</a>
				<a href="https://github.com/pkuzma101/blog.dev/tree/master/public/national_parks">
					<i class="fa fa-git-square" id="mole"></i></a>
				<p>National Parks Database</p>
			</div>
			<div class="box" id="box3">
				<a href="/todo_list/sql_todo_list.php">
					<img src="/todo_list/images/computer_ninja.jpg" height="250px" width="250px" class="img-circle">
				</a>
				<a href="https://github.com/pkuzma101/blog.dev/tree/master/public/todo_list">
					<i class="fa fa-git-square" id="mole"></i></a>
				<p>To-Do List App</p>
			</div>
		</div>
		<div class="row" id="second-row-boxes">
			<div class="box" id="box4"></div>
			<div class="box" id="box5"></div>
			<div class="box" id="box6"></div>
		</div>
	</div> <!-- main-container closes here -->
</div> <!-- mainrow closes here -->


@stop


				