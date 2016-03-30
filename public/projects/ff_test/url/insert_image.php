<?php

require '../../../../config.emp.php';

// if (isset($_FILES['image'])) {
// 	$filename = basename($_FILES['image']['name']);
// 	$filetype = $_FILES['image']['type'];
// 	$pathinfo = pathinfo(__FILE__);

// 	$sys_upload_dir = $pathinfo['dirname'] . '/images/';
// 	$filepath = '/projects/final_fantasy/images/';
// 	$saved_file_name = $filename;

// 	if($filetype == 'image/jpg' || $filetype == 'image/png' || $filetype == 'image/gif' || $filetype == 'image/jpeg') {
// 		move_uploaded_file($_FILES['image']['tmp_name'], $sys_upload_dir . $saved_file_name);
// 	}

// 	$query = 
// }

$data = array();

if (isset($_GET['files'])) {
	$error = false;
	$files = array();

	$upload_dir = '/projects/final_fantasy/images/';
	foreach($_FILES as $file) {
		if (move_uploaded_file($file['tmp_name'], $upload_dir . basename($file['name']))) {
			$files[] = $upload_dir . $file['name'];
		} else {
			$error = true;
		}
	}
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
} else {
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}

echo json_encode($data);

// $query = $dbc->prepare("INSERT INTO ")

?>