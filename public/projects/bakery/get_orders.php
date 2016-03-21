<?php
require '../../../config.bakery.php';

$sql = "SELECT * FROM orders";

$result = $dbc->prepare($sql);
$result->execute();

$orders = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array(
	"orders" => $orders
));

?>