<?php

require '../../../config.emp.php';

$char_id = $_GET['id'];

$sql = "SELECT * FROM characters WHERE id = " . $char_id;

$result = $dbc->prepare($sql);
$status = $result->execute();

$character = $result->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
  "id" => $character['id'],
  "first_name" => $character['first_name'],
  "last_name" => $character['last_name'],
  "class" => $character['class'],
  "special_ability" => $character['special_ability'],
  "weapon" => $character['weapon'],
  "image" => $character['image_path'],
  "game" => $character['game'],
));


?>