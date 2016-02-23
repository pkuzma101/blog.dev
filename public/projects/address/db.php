<?php

require '../../../config.address.php';

// gets function name from param variables
$function_name = $_REQUEST['function_name'];

if ($function_name == "get_addresses") {
	$sql = "SELECT p.person_id, p.fname, p.lname, a.street, a.city, a.state, a.zip
			FROM address as a
			LEFT JOIN person AS p
			ON a.person_id = p.person_id";
	$result = $dbc->prepare($sql);
	$result->execute();

	$addresses = $result->fetchAll(PDO::FETCH_ASSOC);


	// returns json string of all addresses
	echo json_encode(array(
		"addresses" => $addresses,
	));
}


?>