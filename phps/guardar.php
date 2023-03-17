<?php

include 'configDB/connect.php';
include 'configDB/auth.php';
include 'utils/header.php';

require_auth();

$json = file_get_contents('php://input');

$data = json_decode(file_get_contents('php://input'), true);

$codigoenviado = $data['codigo'];
$correo = $data['correo'];
$contenido = $data['contenido'];


if ($codigoenviado != "" && $correo != ""){

    $remplazo = '"';
    $blank = "";
    $new = str_replace($remplazo,"'",$contenido);

    $sql1 = "UPDATE proyecto_guardado SET codigo=?, contenido=?, correo=?, pdf1=?, pdf2=? WHERE codigo=?";
    $stmt = $conexion->prepare($sql1);
    $stmt->bind_param("ssssss", $codigoenviado,$new, $correo, $blank, $blank, $codigoenviado);
    $stmt->execute();

    echo $codigoenviado;


mysqli_close($conexion);
}
else if ($codigoenviado == "" && $correo != ""){

    $codigo = rand ( 10000 , 99999 );

	$sql = "INSERT INTO proyecto_guardado (codigo, contenido, correo, pdf1, pdf2) VALUES (?,?,?,?,?)";
    $stmt = $conexion->prepare($sql);
    $blank = "";
    $stmt->bind_param("sssss", $codigo, $contenido, $correo, $blank, $blank);
    $stmt->execute();

    echo $codigo;
}
else{
    echo "Error email es obligatorio";
    http_response_code(405); //405 Method Not Allowed

    die();
}

?>

