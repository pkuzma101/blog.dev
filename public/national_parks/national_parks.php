<?php

define ('DB_HOST', '127.0.0.1');
define ('DB_NAME', 'national_parks_db');
define ('DB_USER', 'np_user');
define ('DB_PASS', '');

require 'inc/db_connect.php';

if(isset($_GET['page'])) {
	$pageNumber = $_GET['page'];
} else {
	$pageNumber = 1;
}
	
$offsetNumber = ($pageNumber - 1) * 4;

$stmt = $dbc->prepare("SELECT name, location, date_established, area_in_acres, description FROM national_parks LIMIT 4 OFFSET :offsetNumber");
$stmt->bindValue(':offsetNumber', $offsetNumber, PDO::PARAM_INT);
$stmt->execute();

$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$numberOfParks = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();

if($_POST) {
	if(empty($_POST['name']) || empty($_POST['location']) || empty($_POST['date_established']) || empty($_POST['area_in_acres']) || empty($_POST['description'])) {
		 echo "<div class='alert alert-info' role='alert'> Fill in all fields </div>";
	} else {
		if(strlen($_POST['description'] < 125)) {
			$query = $dbc->prepare('INSERT INTO national_parks(name, location, date_established, area_in_acres, description) 
									VALUES(:name, :location, :date_established, :area_in_acres, :description)');
			$query->bindValue(':name', $_POST['name'], PDO:: PARAM_STR);
			$query->bindValue(':location', $_POST['location'], PDO:: PARAM_STR);
			$query->bindValue(':date_established', $_POST['date_established'], PDO:: PARAM_STR);
			$query->bindValue(':area_in_acres', $_POST['area_in_acres'], PDO:: PARAM_STR);
			$query->bindValue(':description', $_POST['description'], PDO:: PARAM_STR);

			$query->execute();
			$_POST = array();
		}
	}
}
?>

<html>
	<head>
		<title>National Parks Bonanza</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway|Nunito' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Smokum|Raleway|Nunito' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/national_parks.css">
	</head>
	<body>
		<a href="/portfolio" class="btn btn-default" id="back">Back</a>
		<h1>National Parks Bonanza</h1>
		<table class="table table">
			<tr>
				<th>Name</th>
				<th>Location</th>
				<th>Date Established</th>
				<th>Area in Acres</th>
				<th>Description</th>
			</tr>
			<? foreach($parks as $key => $park): ?>
			<tr>
				<? foreach($park as $attribute): ?>
				<td><?= htmlspecialchars(strip_tags($attribute)); ?></td>
				<? endforeach ?>
			<? endforeach ?>
			</tr>
		</table>
		<div id="pagination">
			<? if($pageNumber > 1): ?>
				<a href="?page=<?= $pageNumber - 1 ?>" class='btn btn-info' id="previous"> &lt; Previous </a>
			<? endif ?>
			<? if(round($numberOfParks / 4) > $pageNumber): ?>
				<a href="?page=<?= $pageNumber + 1 ?>" class='btn btn-danger' id="next">Next &gt;</a>
			<? endif ?>
		</div>
		<!-- Form that creates a new park -->
		<form method="POST" action="/national_parks.php" class='form-horizontal' role='form'>
			<h2>Insert a New Park</h2>
			<p class='input-group'>
				<label for="name">Name:</label>
				<input id="park" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?> " type="text" placeholder="Name">
			</p>
			<p class='input-group'>
				<label for="location">Location:</label>
				<input id="park" name="location" value="<?= isset($_POST['location']) ? $_POST['location'] : '' ?> " type="text" placeholder="Location">
			</p>
			<p class='input-group'>
				<label for="date_established">Date Established:</label>
				<input id="park" name="date_established" value="<?= isset($_POST['date_established']) ? $_POST['date_established'] : '' ?> "type="text" placeholder="yyyy-mm-dd">
			</p>
			<p class='input-group'>
				<label for="area_in_acres">Area(acres):</label>
				<input id="park" name="area_in_acres" value="<?= isset($_POST['area_in_acres']) ? $_POST['area_in_acres'] : '' ?> "type="text" placeholder="Area(acres)">
			</p>
			<p class='input-group'>
				<label for="description">Description:</label>
				<input id="park" name="description" value="<?= isset($_POST['description']) ? $_POST['description'] : '' ?> "type="text" placeholder="125 characters or less">
			</p>
			<p>
				<!-- Creates button used to add new park info -->
				<button type="submit" class="btn btn-primary">Add Park</button>
			</p>
		</form>
	</body>
</html>