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
		<link href='http://fonts.googleapis.com/css?family=Glegoo:400,700|Righteous|Changa+One' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/alphabet_soup.css">
	</head>
	<body>
		<div class="container-fluid" id="soupPage">
			<a href="/portfolio" class="btn btn-default" id="back">Back</a>
			<h1 id="soupTitle">Alphabet Soup</h1>
			<div class="container-fluid" id="soupForm">
				<div class="space-filler"></div>
				<div class="instructions">
					<p id="">
						Write in any word and see the letters rearranged in alphabetical order.  
						You can even write more than one word, and each word will come back alphabetized.
					</p>
				</div>
				<div class="space-filler"></div>
				<div class="exampleSectionTrigger">
					<p id="exampleTrigger">
						<a>For Example...</a>
					</p>
				</div>
				<div class="exampleSectionReveal">
					<p id="exampleReveal">"hello world" becomes "ehllo dlorw"</p>
				</div>
				<div class="formSection">	
					<form method="POST" role="form" action="" id="soupForm">
						<input id="entry" name="entry" type="text" placeholder="Enter text here"></input>
						<button type="submit" id="button" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
			<div class="answerBox">
				<p id="answer">
					<? 
						if(isset($_POST['entry'])) {
							echo alphabetSoup($_POST['entry']) . PHP_EOL;
						}
					?>
				</p>
			</div>	
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="/projects/alphabet_soup/js/alphabet_soup.js"></script>
	</body>
</html>