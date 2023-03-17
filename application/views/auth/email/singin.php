<?php
ob_start();
?>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
include 'connect.php';
include '../soccer/connect2.php';
include '../volleyball/connect3.php';
include '../reactionwall/connect4.php';
include '../3match/connect5.php';
//$correo = $_POST["correo"];
//$password = $_GET["password"];


$correo = $_POST['correo'];
$password = $_POST['pass'];

$passHash = md5($password);


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$company = $_POST['company'];
$type_subscription = $_POST['type_subscription'];
$fecha_inicio = date("Y-m-d");
$fecha_final = date('Y-m-d', strtotime('+1 month'));


$sql = "select * from user where email = '$correo'";
$result = mysqli_query ( $conexion,$sql );
$cant = mysqli_num_rows( $result );

$sql1 = "select * from free_games";
$result1 = mysqli_query ( $conexion,$sql1 );
$res = mysqli_fetch_array($result1);

if ($type_subscription > 0) {
    $paid = 4;
} else {
    $paid = 0;
}


$contador = 0;
$arr = array();

if( $cant == 0 ){
	
		$sql = "insert into user (email, free, paid, password, nombre, apellido, empresa, type_subscription, fecha_inicio, fecha_final) values ('$correo', $res[0], '$paid', '$passHash', '$fname', '$lname', '$company', '$type_subscription', '$fecha_inicio', '$fecha_final')";
		$result = mysqli_query ( $conexion,$sql );

		$sql2 = "insert into user (email, free, paid, password, nombre, apellido, empresa) values ('$correo', $res[0], '$paid', '$passHash', '$fname', '$lname', '$company')";
		$result2 = mysqli_query ( $conexion2,$sql2 );

		$sql3 = "insert into user (email, free, paid, password, nombre, apellido, empresa) values ('$correo', $res[0], '$paid', '$passHash', '$fname', '$lname', '$company')";
		$result3 = mysqli_query ( $conexion3,$sql3 );

		$sql4 = "insert into user (email, free, paid, password, nombre, apellido, empresa) values ('$correo', $res[0], '$paid', '$passHash', '$fname', '$lname', '$company')";
		$result4 = mysqli_query ( $conexion4,$sql4 );

		$sql5 = "insert into user (email, free, paid, password, nombre, apellido, empresa) values ('$correo', $res[0], '$paid', '$passHash', '$fname', '$lname', '$company')";
		$result5 = mysqli_query ( $conexion5,$sql5 );
		
		$_SESSION['username'] = $correo;
		header("Location: dashboard_master.php");
ob_end_flush();
		exit();
		
}else{
	header("Location: index.php");
ob_end_flush();
	exit();
	
}

mysql_close($conexion,$conexion2,$conexion3,$conexion4,$conexion5);
?>