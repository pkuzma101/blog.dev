<?php

require '../../../config.emp.php';

$id = $_GET['id'];
$first_name = trim(htmlspecialchars(strip_tags($_POST['first_name'])));
$last_name = trim(htmlspecialchars(strip_tags($_POST['last_name'])));
$class = trim(htmlspecialchars(strip_tags($_POST['class'])));
$special_ability = trim(htmlspecialchars(strip_tags($_POST['special_ability'])));
$weapon = trim(htmlspecialchars(strip_tags($_POST['weapon'])));

$query = $dbc->prepare("UPDATE characters SET 
                                          first_name = ?,
                                          last_name = ?,
                                          class = ?,
                                          special_ability = ?,
                                          weapon = ?
                                          WHERE id = ?");

$arg = array($first_name, $last_name, $class, $special_ability, $weapon, $id);

$query->execute($arg);

$sql = "SELECT id, first_name, last_name, class, special_ability, weapon FROM characters WHERE id = " . $id;
$result = $dbc->prepare($sql);
$status = $result->execute();

$edit = $result->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
  "id" => $edit['id'],
  "first_name" => $edit['first_name'],
  "last_name" => $edit['last_name'],
  "class" => $edit['class'],
  "special_ability" => $edit['special_ability'],
  "weapon" => $edit['weapon'],
));

?>