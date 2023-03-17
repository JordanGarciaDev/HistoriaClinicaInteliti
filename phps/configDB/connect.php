<?php
$conexion = new mysqli("localhost:3306","root","","historiaclinica");
$conexion -> set_charset("utf8");

if ($conexion -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conexion -> connect_error;
  exit();
}

?>
