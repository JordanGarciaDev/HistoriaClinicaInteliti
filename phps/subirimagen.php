<?php
include 'configDB/connect.php';
include 'configDB/auth.php';
include 'utils/header.php';
include 'utils/const.php';
use phps\Utils\Constantes;

require_auth();

$data = json_decode(file_get_contents("php://input"), true);

$temp = explode(".", $_FILES["enviarimagen"]["name"]);
$fileName = round(microtime(true)) . '.' . end($temp);

$tempPath  =  $_FILES['enviarimagen']['tmp_name'];
$fileSize  =  $_FILES['enviarimagen']['size'];

if (empty($fileName)) {
	$errorMSG = json_encode(array("message" => "1", "status" => false));
	echo $errorMSG;
} else {
	$upload_path = '/var/www/html/admin/uploads/photo/';

	$fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

	if (in_array($fileExt, $valid_extensions)) {
		if (!file_exists($upload_path . $fileName)) {
			if ($fileSize < 5000000) {


				move_uploaded_file($tempPath, $upload_path . $fileName);
			} else {
				$errorMSG = json_encode(array("message" => "2", "status" => false));
				echo $errorMSG;
			}
		} else {
			$errorMSG = json_encode(array("message" => "3", "status" => false));
			echo $errorMSG;
		}
	} else {
		$errorMSG = json_encode(array("message" => "4", "status" => false));
		echo $errorMSG;
	}
}

if (!isset($errorMSG)) {
	$query = mysqli_query($conexion, 'INSERT into imagenes_subidas (nombre_imagen_subida) VALUES("' . $fileName . '")');

	echo json_encode(array("mensaje" => "5", "estatus" => true, "url" => Constantes::base_url."uploads/photo/$fileName"));
}
