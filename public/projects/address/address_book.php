<?php

require '../../../config.address.php';

// gets function name from param variables
$functionName = $_REQUEST['functionName'];

var_dump($functionName);


// gets all addresses in database
if($functionName == "getAddresses") {
	$sql = "SELECT *
			FROM person as p
			LEFT OUTER JOIN address_person as ap
			ON p.person_id = ap.person_id
			RIGHT JOIN address as a
			ON ap.address_id = a.address_id";
	$result = $dbc->prepare($sql);
	$status = $result->execute();

	$addresses = $result->fetchAll(PDO::FETCH_ASSOC);

	// returns json string of all addresses
	echo json_encode(array(
		"addresses" => $addresses,
	));

}

elseif($functionName == 'addAddress') {
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

	$sql = "SELECT p.id, CONCAT(p.fname, ' ', p.lname) AS name, CONCAT(a.street, ',', ' ', a.city, ',', ' ', a.state, ' ', a.zip) AS address
			FROM person as p
			RIGHT JOIN address as a
			ON p.person_id = a.person_id
			WHERE p.person_id = " . $id;
	$result = $dbc->prepare($sql);
	$status = $result->execute();

	$entry = $result->fetch(PDO::FETCH_ASSOC);

	echo json_encode(array(
		"person_id" => $entry['id'],
		"name" => $entry['name'],
		"address" => $entry['address']
	));
}

?>

<html>
<head>
	<title>Address Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/address_book.css">
</head>
<body>
	<a href="/portfolio" class="btn btn-default" id="back">Back</a>
	<div class="container-fluid">
		<div id="addresses">
			<h2>Address Book  <a href="#" id="address-add">Add</a></h2>
			<div title="" style="display:none">
				<fieldset>
					<form id="dialog-form" name="dialog-form">
						<label for="fname">First Name: <span id="required-sign">*</span></label>
						<input type="text" name="fname" id="fname" class="text ui-widget-content ui-corner-all">
						<br>
						<label for="lname">Last Name: </label>
						<input type="text" name="lname" id="lname" class="text ui-widget-content ui-corner-all">
						<br>
						<label for="street">Street: </label>
						<input type="text" name="street" id="street" class="text ui-widget-content ui-corner-all">
						<br>
						<label for="city">City: </label>
						<input type="text" name="city" id="city" class="text ui-widget-content ui-corner-all">
						<br>
						<label for="state">State: </label>
						<input type="text" name="state" id="state" class="text ui-widget-content ui-corner-all">
						<br>
						<label for="zip">ZIP: </label>
						<input type="text" name="zip" id="zip" class="text ui-widget-content ui-corner-all">
						<br>
						<button type="submit" name="add-address-button" value="Submit">Submit</button>
					</form>
				<fieldset>
				<div id="delete-confirm">
			        Are you sure you want to delete this project?
			    </div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="/projects/address/js/jquery-1.11.3.min.js"></script> -->
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>