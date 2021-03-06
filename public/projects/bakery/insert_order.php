<?php
require '../../../config.bakery.php';

$data = json_decode(file_get_contents("php://input"));

$customer = $data->customer;
$muffin = $data->muffin;
$cupcake = $data->cupcake;
$cake = $data->cake;
$danish = $data->danish;
$cookie = $data->cookie;
$donut = $data->donut;
$price = $data->price;

$query = $dbc->prepare("INSERT INTO orders(customer, muffin, cupcake, cake, danish, cookie, donut, price)
				 		VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

$arg = array(trim(htmlspecialchars(strip_tags($customer))), trim(htmlspecialchars(strip_tags($muffin))), trim(htmlspecialchars(strip_tags($cupcake))), trim(htmlspecialchars(strip_tags($cake))), trim(htmlspecialchars(strip_tags($danish))), trim(htmlspecialchars(strip_tags($cookie))), trim(htmlspecialchars(strip_tags($donut))), trim(htmlspecialchars(strip_tags($price))));

$query->execute($arg);
$order_id = $dbc->lastInsertId();

$sql = "SELECT * FROM orders WHERE id = " . $order_id;
$result = $dbc->prepare($sql);
$status = $result->execute();

$new_order = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array(
	"order" => $new_order
));

?>