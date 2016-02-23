<?php

require '../../../config.address.php';

$person_id = $_GET['id'];

$sql = "SELECT p.person_id, p.fname, p.lname, a.street, a.city, a.state, a.zip 
				FROM address AS a
				LEFT JOIN person AS p
				ON a.person_id = p.person_id
				WHERE p.person_id = " . $person_id;
$result = $dbc->prepare($sql);
$result->execute();

echo json_encode(array(
	"address" => $address,
));


?>