<?php

require '../../../config.address.php';

$person_id = $_GET['id'];

$deleteAddress = $dbc->prepare("DELETE FROM address WHERE person_id = " . $person_id);
$deleteAddress->execute();

$deletion = $dbc->prepare("DELETE FROM person WHERE person_id = " . $person_id);
$deletion->execute();

echo json_encode(array(
	'person_id' => $person_id
));

?>