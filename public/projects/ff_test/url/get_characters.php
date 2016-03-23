<?php

require '../../../../config.emp.php';

$game_id = $_GET['game_id'];

$sql = "SELECT id, first_name, last_name, class, special_ability, weapon, image_path
				FROM characters
				WHERE game = " . $game_id;

$result = $dbc->prepare($sql);
$status = $result->execute();

$characters = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array(
	"characters" => $characters
));


?>