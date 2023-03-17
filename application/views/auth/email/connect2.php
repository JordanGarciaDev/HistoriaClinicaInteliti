<?php
$dbhost="mysql.gameit.pressstart.co";
$dbusuario="gameitnew";
$dbpassword="Js$$30NewGme!";
$db="trivianew";

// Create connection
$conn = new mysqli($dbhost, $dbusuario, $dbpassword, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
