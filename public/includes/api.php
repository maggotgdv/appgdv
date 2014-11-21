<?php
// Global user id | Comment this if you're using custom a custom object id
header("Content-Type: application/x-www-form-urlencoded");
 header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept, Accept-Encoding, Accept-Language,Content-Length, Cookie');
    header('Access-Control-Request-Method:POST');
$userID = $_POST['id'];
require_once 'config.php';
require_once 'functions.php';
require_once 'imgPicker.php';

$IP = new imgPicker($config);

if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		// Iframe upload action
		case 'upload':
			$file   = @$_FILES['ip-file'];
			$obj_id = isset($userID) ? $userID : $_POST['id'];
			$type   = $_POST['type'];

			$IP->upload($file, $type, $obj_id);
		break;

		//HTML5 upload / webcam upload / iframe save \w crop
		case 'save':
			
			$_POST['obj_id'] = isset($userID) ? $userID : $_POST['obj_id'];
			$IP->save_cropped($_POST);
		break;
	}
}

?>