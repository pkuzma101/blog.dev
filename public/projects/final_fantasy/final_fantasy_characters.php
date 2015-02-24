<?php
session_start();
if($_SERVER['SERVER_NAME'] == 'paulkuzmadev.com'){
	define("ENV","prod");
}
else{
	define("ENV","dev");
}

// Pagination code
if(isset($_GET['page'])) {
	$pageNumber = $_GET['page'];
} else {
	$pageNumber = 1;
}
$pageParam = "page=".$pageNumber;

require '../../../config.emp.php';
include 'final_fantasy_characters_modal.php';

$offsetNumber = ($pageNumber - 1) * 8;

// SQL Query statement for cards
$stmt = $dbc->prepare("SELECT id, first_name, last_name, class, special_ability, weapon, image_path FROM characters LIMIT ".$offsetNumber.",8");// OFFSET :offsetNumber");
//$stmt->bindValue(':offsetNumber', $offsetNumber, PDO::PARAM_INT);
$stmt->execute();

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

$numberOfEmployees = $dbc->query('SELECT count(*) FROM characters')->fetchColumn();

function darray($array, $exit = true){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
	if ($exit){
		exit();
	}
}
 
// Add new employee
if($_POST) {
	if(empty($_POST['first_name']) || empty($_POST['class']) || empty($_POST['special_ability']) || empty($_POST['weapon']) ) {
		echo "<div class='alert alert-info' role='alert'> All fields except 'Last Name' must be filled</div>";
	} else {
		// Upload image
		if(isset($_FILES['image'])) {
			$fileName = basename($_FILES['image']['name']);
			$fileType = $_FILES['image']['type'];
			$pathinfo = pathinfo(__FILE__);

			$sysUploadDir = $pathinfo['dirname'] . '/images/';
			$filePath = '/projects/final_fantasy/images/';
			$savedFileName = $fileName;

			if($fileType == 'image/jpg' || $fileType == 'image/png' || $fileType == 'image/gif' || $fileType == 'image/jpeg') {
				move_uploaded_file($_FILES['image']['tmp_name'], $sysUploadDir . $savedFileName);
			}
		}
		// Put form info into MySQL database
		if(strlen($_POST['first_name'] < 100)) {
			$query = $dbc->prepare('INSERT INTO characters(first_name, last_name, class, special_ability, weapon, image_path)
					 VALUES(:first_name, :last_name, :class, :special_ability, :weapon, :image_path)');
			$query->bindValue(':first_name', $_POST['first_name'], PDO:: PARAM_STR);
			$query->bindValue(':last_name', $_POST['last_name'], PDO:: PARAM_STR);
			$query->bindValue(':class', $_POST['class'], PDO:: PARAM_STR);
			$query->bindValue(':special_ability', $_POST['special_ability'], PDO:: PARAM_STR);
			$query->bindValue(':weapon', $_POST['weapon'], PDO:: PARAM_STR);
			$query->bindValue(':image_path', $filePath . $savedFileName, PDO:: PARAM_STR);
			$query->execute();
			$_POST = array();

			// Do a header location
			header("Location: final_fantasy_characters.php" . "?" . $pageParam);
		}

		
	}
}


// Remove Character Variables
if(isset($_GET['characterId'])) {
	$characterToRemove = intval($_GET['characterId']);
}
// Delete Character
if(isset($characterToRemove)) {
	$deletion = $dbc->prepare("DELETE FROM characters WHERE id = :characterToRemove");
	$deletion->bindValue(':characterToRemove', $characterToRemove, PDO::PARAM_INT);
	$deletion->execute();

	header("Location: final_fantasy_characters.php" . "?" . $pageParam);
}
$stmt->closeCursor();
$stmt = null;
$dbc = null;
?>

<html>
	<head>
		<title>Final Fantasy Character Database</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cinzel:400,700|Cinzel+Decorative:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/final_fantasy_characters.css">
	</head>
	<body>
		<div class="container-fluid" id="finalFantasyPage">
			<a href="/portfolio" class="btn btn-default" id="back">Back</a>
			<h1 id="pageTitle">Final Fantasy Characters</h1>
			<div class="space-filler"></div>
			<div class="buttonRow">
				<a href="#" data-toggle="modal" data-target="#addCharacterModal" class="fantasyButton">
				    New Character
				</a>
				<span id="pagination">
					<? if($pageNumber > 1): ?>
						<a href="?page=<?= $pageNumber - 1 ?>" class="fantasyButton"> &lt; Previous </a>
					<? endif ?>
					<? if(($numberOfEmployees / 8) > $pageNumber): ?>
						<a href="?page=<?= $pageNumber + 1 ?>" class="fantasyButton"> Next &gt;</a>
					<? endif ?>
				</span>
			</div>
			<div class="space-filler"></div>
			<div class="menuBox">
				<? foreach($employees as $employee): ?>
				<div id="cardBlock">
					<div class="charCard">
						<div class="row">
							<div class="col-xs-6" id="charPicDiv">
								<img src="<?= $employee['image_path'] ?>" class="charPic">
							</div>
							<div class="col-xs-6" id="charName">
								<h3 class="fullName"><?= $employee['first_name'] ?> <?= $employee['last_name'] ?></h3>
								<h4><?= $employee['class'] ?> </h4>
							</div>
						</div> <!-- row -->
						<div class="row" id="infoRow">
							<div class="col-xs-6">
								<p class="charInfo">Special Ability: <?= $employee['special_ability'] ?> </p>
							</div>
							<div class="col-xs-6">
								<p class="charInfo">Weapon: <?= $employee['weapon'] ?> </p>
							</div>
						</div> <!-- infoRow -->
						<span class="deleteButton"><a href="?characterId=<?php echo $employee['id']; ?>&<?php echo $pageParam; ?>" onclick="return confirm('Delete this character?');"n >Delete</a></span>
					</div> <!-- charCard -->
				</div> <!-- cardBlock -->
				<? endforeach ?>
			</div> <!-- menuBox -->
			<div class="soundDiv">
				<audio src="sounds/cursor_move.mp3" id="move-sound" type="audio/mpeg">
				<audio src="sounds/save_chime.mp3" id="save-sound" type="audio/mpeg">
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="js/parallax.js"></script>
		<script src="js/final_fantasy_characters.js"></script>
	</body>
</html>