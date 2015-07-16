<?php

function alphabetSoup($string) {
	$words = explode(" ", $string);
	$string = '';
	foreach($words as $word) {
		$newArray = str_split($word);
			sort($newArray);
			$string .= implode('', $newArray) . ' ';
	}

	return $string;
}

?>

<html>		
	<head>		
		<title>Alphabet Soup</title>		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">		
		<link rel="stylesheet" href="css/alphabet_soup.css">		
	</head>		
	<body>		
		<a href="/portfolio" class="btn btn-default" id="back">Back</a>		
		<div class="container-fluid" id="soupPage">		
			<h1>Alphabet Soup</h1>		
			<div class="container-fluid" id="soupForm">		
				<form method="POST" role="form" action="/alphabet_soup.php">		
					<input id="entry" name="entry" type="text" placeholder="Enter text here"></input>		
					<button type="submit" class="btn btn-primary">Submit</button>		
				</form>		
				<div class="answerBox">		
					<!-- <? foreach($soupWord as $key => $value): ?> -->		
					<!-- <?= htmlspecialchars(strip_tags($value)); ?> -->		
					<!-- <? endforeach ?> -->		
					<? echo alphabetSoup($_POST['entry']); ?>		
				<div>		
			</div>		
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>		
	</body>		
</html>