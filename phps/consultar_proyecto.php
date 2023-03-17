<?php
include 'configDB/connect.php';
include 'configDB/auth.php';
include 'utils/header.php';

require_auth();

$json = file_get_contents('php://input');

$data = json_decode($json);

$codigo = $data->codigo;
$_SESSION['codigo'] = $codigo;

$jsonString = file_get_contents('php://input');
$data = json_decode($jsonString, true);

$sql = "SELECT contenido FROM `proyecto_guardado` WHERE codigo = $codigo ";
$result = mysqli_query($conexion, $sql);
$cant = mysqli_num_rows($result);
$contador = 0;
$arr = array();

$segundo = array();

if ($cant == 0) {
	echo "none";
} else {

	while ($res = mysqli_fetch_array($result)) {
		$yef = $res[0];
		$arr[$contador] = $p;
		$contador++;
		$segundo = $p;
		$segundo++;
	}
}

$remplazo = '"';

$yef1 = str_replace("'", $remplazo, $yef);

echo $yef1;

mysqli_close($conexion);
