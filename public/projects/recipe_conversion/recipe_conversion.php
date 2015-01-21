<?php



function getInput() {
	$input = $_GET['number'];
	return $input;
}

function getFrom() {
	$from = $_GET['from'];
	return $from;
}

function getTo() {
	$to = $_GET['to'];
	return $to;
}

$input = getInput();

$from = getFrom();

$to = getTo();

function calculate() {
	switch($from) {

		case 'teaspoon':

			switch($to) {

				case 'teaspoon':
					$answer = $input * 1;
					echo $answer;
					break;
				case 'tablespoon':
					$answer = $input * 3;
					echo $answer;
					break;
				case 'cup':
					$answer = $input * 48;
					echo $answer;
					break;
				case 'pint':
					$answer = $input * 96;
					echo $answer;
					break;
				case 'quart':
					$answer = $input * 192;
					echo $answer;
					break;
				case 'gallon':
					$answer = $input * 786;
					echo $answer;
					break;
			}

		case 'tablespoon':

			switch($to) {

				case 'teaspoon':
					$answer = $input / 3;
					echo $answer;
					break;
				case 'tablespoon':
					$answer = $input * 1;
					echo $answer;
					break;
				case 'cup':
					$answer = $input * 16;
					echo $answer;
					break;
				case 'pint':
					$answer = $input * 32;
					echo $answer;
					break;
				case 'quart':
					$answer = $input * 64;
					echo $answer;
					break;
				case 'gallon':
					$answer = $input * 256;
					echo $answer;
					break;
			}

		case 'cup':

			switch($to) {
				case 'teaspoon':
					$answer = $input / 48;
					echo $answer;
					break;
				case 'tablespoon':
					$answer = $input / 16;
					echo $answer;
					break;
				case 'cup':
					$answer = $input * 1;
					echo $answer;
					break;
				case 'pint':
					$answer = $input  * 2;
					echo $answer;
					break;
				case 'quart':
					$answer = $input * 4;
					echo $answer;
					break;
				case 'gallon':
					$answer = $input * 16;
					echo $answer;
					break;
			}

		case 'pint':

			switch($to) {
				case 'teaspoon':
					$answer = $input / 96;
					echo $answer;
					break;
				case 'tablespoon':
					$answer = $input / 32;
					echo $answer;
					break;
				case 'cup':
					$answer = $input * 2;
					echo $answer;
					break;
				case 'pint':
					$answer = $input * 1;
					echo $answer;
					break;
				case 'quart':
					$answer = $input * 2;
					echo $answer;
					break;
				case 'gallon':
					$answer = $input * 4;
					echo $answer;
					break;
			}
			
	}
}

?>

<html>
	<head>
		<title>Recipe Measurement Conversion App</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/recipe_conversion.css">
	</head>
	<body>
		<div class="container-fluid" id="recipePage">
			<h1>Recipe Measurement Conversion</h1>
			<h1>This Page is currently under construction</h1>
			<form method="get" name="fromTo">
				<select id="from" name="from" size="6">
					<option>teaspoon</option>
					<option>tablespoon</option>
					<option>cup</option>
					<option>pint</option>
					<option>quart</option>
					<option>gallon</option>
				</select>
				<input type="text" id="number" name="number"></input>
				<select id="to" name="to" size="6">
					<option>teaspoon</option>
					<option>tablespoon</option>
					<option>cup</option>
					<option>pint</option>
					<option>quart</option>
					<option>gallon</option>
				</select>
			</form>
			<div class="answerSection">
				<?
					if(isset($_POST['number'])) {
						echo calculate() . PHP_EOL;
					}

				?>
			</div>
		</div>
	</body>
</html>