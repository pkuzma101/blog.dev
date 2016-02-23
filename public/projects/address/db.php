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
} elseif ($function_name == "add_address") {
	$fname = trim(htmlspecialchars(strip_tags($_POST['fname'])));
	$lname = trim(htmlspecialchars(strip_tags($_POST['lname'])));
	$personQuery = $dbc->prepare("INSERT INTO person(fname, lname)
				    			  VALUES(?, ?)");
	$personArg = array($fname, $lname);
	$personQuery->execute($personArg);
	$personId = $dbc->lastInsertId();

	$street = trim(htmlspecialchars(strip_tags($_POST['street'])));
	$city = trim(htmlspecialchars(strip_tags($_POST['city'])));
	$state = trim(htmlspecialchars(strip_tags($_POST['state'])));
	$zip = trim(htmlspecialchars(strip_tags($_POST['zip'])));
	$addressQuery = $dbc->prepare("INSERT INTO address(street, city, state, zip, person_id)
								   VALUES(?, ?, ?, ?, ?)");
	$addressArg = array($street, $city, $state, $zip, $personId);
	$addressQuery->execute($addressArg);

	$sql = "SELECT p.person_id, p.fname, p.lname, a.street, a.city, a.state, a.zip, a.person_id
			FROM person as p
			RIGHT JOIN address as a
			ON p.person_id = a.person_id
			WHERE p.person_id = " . $personId;
	$result = $dbc->prepare($sql);
	$status = $result->execute();

	$address = $result->fetch(PDO::FETCH_ASSOC);

	echo json_encode(array(
		"person_id" => $address['person_id'],
		"fname" => $address['fname'],
		"lname" => $address['lname'],
		"street" => $address['street'],
		"city" => $address['city'],
		"state" => $address['state'],
		"zip" => $address['zip']
	));
} 


?>