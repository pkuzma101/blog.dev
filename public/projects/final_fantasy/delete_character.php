<?php

require '../../../config.emp.php';

$char_id = trim(htmlspecialchars(strip_tags($_GET['id'])));

$deletion = $dbc->prepare("DELETE FROM characters WHERE id = " . $char_id);

$deletion->execute();

echo json_encode(array(
  'id' => $char_id
));

?>