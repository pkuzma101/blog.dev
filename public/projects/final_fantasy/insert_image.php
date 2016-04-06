<?php

require '../../../config.emp.php';

if (isset($_FILES['image'])) {
	$filename = basename($_FILES['image']['name']);
	$filetype = $_FILES['image']['type'];
	$pathinfo = pathinfo(__FILE__);

	$sys_upload_dir = $pathinfo['dirname'] . '/images/';
	$filepath = '/projects/final_fantasy/images/';
	$saved_file_name = $filename;

	if($filetype == 'image/jpg' || $filetype == 'image/png' || $filetype == 'image/gif' || $filetype == 'image/jpeg') {
		move_uploaded_file($_FILES['image']['tmp_name'], $sys_upload_dir . $saved_file_name);
	}
}

$char_id = trim(htmlspecialchars(strip_tags($_POST['char_id'])));

$query = $dbc->prepare("UPDATE characters
                          SET image_path = ? 
                          WHERE id = ?");
$arg = array($filepath . $saved_file_name, $char_id);

$query->execute($arg);

$sql = "SELECT image_path, id FROM characters WHERE id = " . $char_id;
$result = $dbc->prepare($sql);
$status = $result->execute();

$new_img = $result->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
  "id" => $new_img['id'],
  "image_path" => $new_img['image_path'],
  
));

?>