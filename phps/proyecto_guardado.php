<?php
include 'configDB/connect.php';
include 'configDB/auth.php';
include 'utils/header.php';

require_auth();

$codigo = $_POST['codigo'];

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

echo $yef;

mysqli_close($conexion);
