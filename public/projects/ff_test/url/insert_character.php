<?php

require '../../../../config.emp.php';

// $filepath = "";
// $saved_file_name = "";

// if (isset($_FILES['image'])) {
	// $filename = basename($_FILES['image']['name']);
	// $filetype = $_FILES['image']['type'];
	// $pathinfo = pathinfo(__FILE__);

	// $sys_upload_dir = $pathinfo['dirname'] . '/images/';
	// $filepath = '/projects/final_fantasy/images/';
	// $saved_file_name = $filename;

	// if($filetype == 'image/jpg' || $filetype == 'image/png' || $filetype == 'image/gif' || $filetype == 'image/jpeg') {
	// 	move_uploaded_file($_FILES['image']['tmp_name'], $sys_upload_dir . $saved_file_name);
	// }
// }

$first_name = trim(htmlspecialchars(strip_tags($_POST['first_name'])));
$last_name = trim(htmlspecialchars(strip_tags($_POST['last_name'])));
$class = trim(htmlspecialchars(strip_tags($_POST['class'])));
$special_ability = trim(htmlspecialchars(strip_tags($_POST['special_ability'])));
$weapon = trim(htmlspecialchars(strip_tags($_POST['weapon'])));
$image = trim(htmlspecialchars(strip_tags($_POST['image'])));
$game = trim(htmlspecialchars(strip_tags($_POST['game'])));

$query = $dbc->prepare("INSERT INTO characters(first_name, last_name, class, special_ability, weapon, image_path, game)
						VALUES(?, ?, ?, ?, ?, ?, ?)");
$insert_arg = array($first_name, $last_name, $class, $special_ability, $weapon, $image, $game);
$query->execute($insert_arg);
$char_id = $dbc->lastInsertId();

$sql = "SELECT * FROM characters WHERE id = " . $char_id;
$result = $dbc->prepare($sql);
$status = $result->execute();

$new_char = $result->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
	"id" => $new_char['id'],
	"first_name" => $new_char['first_name'],
	"last_name" => $new_char['last_name'],
	"class" => $new_char['class'],
	"special_ability" => $new_char['special_ability'],
	"weapon" => $new_char['weapon'],
	"image" => $new_char['image_path'],
	"game" => $new_char['game'],
));

// }

?>