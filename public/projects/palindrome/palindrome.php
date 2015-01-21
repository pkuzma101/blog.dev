<?php

function palindrome($string) {
	$string = $_POST['entry'];
	$backwards = strrev($string);
	if($string == $backwards) {
		echo $string . '?' . '<br>' . "Yea!" . PHP_EOL;
	} else {
		echo $string . '?' . '<br>' . "Nay!" . PHP_EOL;
	}
}

?>

<html>
	<head>
		<title>Palindrome?</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Aclonica|Press+Start+2P' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/palindrome.css">
	</head>
	<body>
		<div class="container-fluid" id="palindromePage">
			<a href="/portfolio" class="btn btn-default" id="back">Back</a>
			<h1 class="palindromeTitle">Is It a Palindrome?</h1>
			<div class="space-filler"></div>
			<div class="container-fluid" id="insructionsSection">
				<p class="instructions">
					A palindrome is a word that is spelled the same way in reverse.  For example,
					"racecar."  Type a word into the box provided and see if it's a palindrome!
				</p>
			</div>
			<div class="formSection">
				<form method="POST" role="form" action="" id="palindromeForm">
					<input type="text" name="entry" id="entry"></input>
					<button type="submit" id="button" class="btn btn-primary" id="palButton">Submit</button>
				</form>
			</div>
			<div class="space-filler"></div>
			<div class="answerSection">
				<p class="answer">
					<?
						if(isset($_POST['entry'])) {
							echo palindrome($_POST['entry']) . PHP_EOL;
						}

					?>
				</p>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="js/palindrome.js"></script>
	</body>
</html>