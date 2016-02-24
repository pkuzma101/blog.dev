<?php

require '../../../config.address.php';

$person_id = $_GET['id'];

echo '<h1>' . $person_id . '</h1>';
exit();

$deleteAddress = $dbc->prepare("DELETE FROM address WHERE person_id = " . $person_id);
$deleteAddress->bindValue(':person_id', $person_id, PDO::PARAM_INT);
$deleteAddress->execute();

$deletion = $dbc->prepare("DELETE FROM person WHERE person_id = " . $person_id);
$deletion->bindValue(':person_id', $person_id, PDO::PARAM_INT);
$deletion->execute();

echo json_encode(array(
	'person_id' => $person_id
));

?>