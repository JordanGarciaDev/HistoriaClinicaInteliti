<?php
include 'configDB/connect.php';
include 'configDB/auth.php';

require_auth();

$json = file_get_contents('php://input');
$data = json_decode($json);

$correo = $data->correo;
$password = $data->password;


$jsonString = file_get_contents('php://input');
$data = json_decode($jsonString, true);

class Answer
{
}

$sql = "SELECT * FROM pacientes u 
INNER JOIN users_groups up
WHERE u.correo = '$correo' AND u.contrasena = '$password'";
$result = mysqli_query($conexion, $sql);
$cant = mysqli_num_rows($result);
$contador = 0;
$arr = array();

$segundo = array();

if ($cant == 0) {
	echo "error, datos invalidos";
} else {

	while ($res = mysqli_fetch_array($result)) {

		$yef1 = 'id';
		$p->$yef1 = $res[0];

		$yef = 'correo';
		$p->$yef = $res[1];

		$yef2 = 'nombre';
		$p->$yef2 = $res[3];

		$yef3 = 'apellido';
		$p->$yef3 = $res[4];

		$yef4 = 'compania';
		$p->$yef4 = $res[5];

		$yef5 = 'group_id'; //define el tipo de usuario y/o perfil
		$p->$yef4 = $res[9];

		$arr[$contador] = $p;
		$contador++;
		$segundo = $p;
		$segundo++;
	}
	echo json_encode($segundo, JSON_UNESCAPED_UNICODE);
}

mysqli_close($conexion);
