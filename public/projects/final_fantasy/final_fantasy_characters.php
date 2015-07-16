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

$offsetNumber = ($pageNumber - 1) * 8;

// SQL Query statement for cards
$stmt = $dbc->prepare("SELECT id, first_name, last_name, class, special_ability, weapon, image_path FROM characters LIMIT ".$offsetNumber.",8");
//$stmt->bindValue(':offsetNumber', $offsetNumber, PDO::PARAM_INT);
$stmt->execute();

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
$stmt = null;

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
if(isset($_POST['new-submit-button'])) {
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
			header("Location: /projects/final_fantasy/final_fantasy_characters.php" . "?" . $pageParam);
			exit();
		}	
	}
}
// Set up the remove Character Variables
if(isset($_GET['characterId'])) {
	$characterToRemove = intval($_GET['characterId']);
}

// Delete Character
if(isset($characterToRemove)) {
	$deletion = $dbc->prepare("DELETE FROM characters WHERE id = :characterToRemove");
	$deletion->bindValue(':characterToRemove', $characterToRemove, PDO::PARAM_INT);
	$deletion->execute();

	header("Location: /projects/final_fantasy/final_fantasy_characters.php" . "?" . $pageParam);
	exit();
}

include 'final_fantasy_characters_modal.php';

// include 'final_fantasy_edit_characters_modal.php';


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
				<div class="row-fluid">
					<div class="col-md-6">
						<a href="#" data-toggle="modal" data-target="#addCharacterModal" class="fantasyButton" id="pageButton">
						    New Character
						</a>
					</div>
					<div class="col-md-6">
						<span id="pagination">
							<? if($pageNumber > 1): ?>
								<a href="?page=<?= $pageNumber - 1 ?>" class="fantasyButton" id="pageButton"> &lt; Previous </a>
							<? endif ?>
							<? if(($numberOfEmployees / 8) > $pageNumber): ?>
								<a href="?page=<?= $pageNumber + 1 ?>" class="fantasyButton" id="pageButton"> Next &gt;</a>
							<? endif ?>
						</span>
					</div>
				</div>
			</div>
			<div class="space-filler"></div>
			<div class="container menuBox">
				<? foreach($employees as $employee): ?>
				<div id="cardBlock">
					<div class="charCard">
						<div class="row">
							<div class="col-xs-6" id="charPicDiv">
								<img src="<?= $employee['image_path'] ?>" class="charPic">
							</div>
							<div class="col-xs-6" id="charName">
								<h3 class="fullName"><?php echo htmlspecialchars(strip_tags($employee['first_name'])) ?> <?php echo htmlspecialchars(strip_tags($employee['last_name'])) ?></h3>
								<h4><?php echo htmlspecialchars(strip_tags($employee['class'])) ?></h4>
							</div>
						</div> <!-- row -->
						<div class="row" id="infoRow">
							<div class="col-xs-6">
								<p class="charInfo">Special Ability: <?php echo htmlspecialchars(strip_tags($employee['special_ability'])) ?></p>
							</div>
							<div class="col-xs-6">
								<p class="charInfo">Weapon: <?php echo htmlspecialchars(strip_tags($employee['weapon'])) ?></p>
							</div>
						</div> <!-- infoRow -->
						<span class="deleteButton"><a href="?characterId=<?php echo $employee['id']; ?>&<?php echo $pageParam; ?>" onclick="return confirm('Delete this character?');"n >Delete</a></span>
						<span class="editButton">
							<form method="POST" action="final_fantasy_edit_character.php">
								<input type="hidden" name="edit-character" value="<?php echo $employee['id']; ?>">
								<input type="hidden" name="action" value="edit">
								<!-- <a href="final_fantasy_edit_character.php">Edit</a> -->
								<input type="submit" value="Edit">
							</form>
						</span>
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