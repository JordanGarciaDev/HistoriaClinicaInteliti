<?php
ob_start();
?>
<?php
session_start();
include 'connectmaster.php';
include 'connect.php';

$id_user           = $_POST["user"];
$name              = $_POST["name"];
$difficulty        = $_POST["difficulty"];
$connection_type   = $_POST["connection_type"];
$points            = $_POST["points"];
$points_punishment = $_POST["points_punishment"];
$points_multiplier = $_POST["points_multiplier"];
$total_lifes       = $_POST["total_lifes"];
$time_limit        = $_POST["time_limit"];
$fecha             = $_POST["fecha"];
$hora              = $_POST["hora"];
$text_color        = $_POST["text_color"];
$fecha             = explode("/", $fecha);
$fechaFinal        = $fecha[2] . "-" . $fecha[0] . "-" . $fecha[1];
$registro          = $fechaFinal . " " . $hora;

$sql    = "select free, paid from user where id = $id_user";
$result = mysqli_query($conexionmaster, $sql);
$res    = mysqli_fetch_array($result);

if ($res[0] > 0) {
    $sql = "insert into games (id_user, name, connection_type, difficulty, points, points_punishment, points_multiplier, total_lifes, time_limit, fecha, text_color)
	values ('$id_user','$name','$connection_type','$difficulty',$points,$points_punishment,$points_multiplier,$total_lifes,$time_limit,'$registro','$text_color') ";
    $result = mysqli_query($conexion, $sql);

    $id_game = mysqli_insert_id($conexion);

    $total = 0;
    $total = $res[0] - 1;

    $sql1    = "update user set free = $total where id = $id_user";
    $result1 = mysqli_query($conexionmaster, $sql1);

    $sql3    = "insert into user_gamepoints (id_game, id_user, points) values ($id_game,$id_user,0)";
    $result3 = mysqli_query($conexion, $sql3);

    $sql4    = "insert into user_game_art (id_game) values ($id_game)";
    $result4 = mysqli_query($conexion, $sql4);

    $sql5    = "insert into user_game_art_login (id_game) values ($id_game)";
    $result5 = mysqli_query($conexion, $sql5);

    $sql6    = "insert into user_game_art_registration (id_game) values ($id_game)";
    $result6 = mysqli_query($conexion, $sql6);

    $sql7    = "insert into user_game_art_splashscreen (id_game) values ($id_game)";
    $result7 = mysqli_query($conexion, $sql7);

    $sql8    = "insert into user_game_art_codedashboard (id_game) values ($id_game)";
    $result8 = mysqli_query($conexion, $sql8);

    $sql9    = "insert into user_game_art_leaderboard (id_game) values ($id_game)";
    $result9 = mysqli_query($conexion, $sql9);

    $sql10    = "insert into user_game_art_congratulations (id_game) values ($id_game)";
    $result10 = mysqli_query($conexion, $sql10);

    $sql11    = "insert into user_game_art_admin (id_game) values ($id_game)";
    $result11 = mysqli_query($conexion, $sql11);

    $sql12    = "insert into user_game_art_loading (id_game) values ($id_game)";
    $result12 = mysqli_query($conexion, $sql12);

    $sql13    = "insert into user_game_art_keyboard (id_game) values ($id_game)";
    $result13 = mysqli_query($conexion, $sql13);

    $sql14    = "insert into user_game_art_home (id_game) values ($id_game)";
    $result14 = mysqli_query($conexion, $sql14);

    if ($difficulty = 2) {
        $codeF   = rand(10000, 99999);
        $sqly    = "insert into codesmulti (cantidad, code,id_game) values ('0','$codeF',$id_game) ";
        $resulty = mysqli_query($conexion, $sqly);
        # code...
    }

    $text = "Game created.";
} else if ($res[1] > 0) {

    $sql = "insert into games (id_user, name, connection_type, difficulty, points,points_punishment,points_multiplier, total_lifes, time_limit, fecha, text_color)
	values ('$id_user','$name','$connection_type','$difficulty',$points,$points_punishment,$points_multiplier,$total_lifes,$time_limit,'$registro','$text_color') ";
    $result = mysqli_query($conexion, $sql);

    $id_game = mysqli_insert_id($conexion);

    $total = 0;
    $total = $res[1] - 1;

    $sql1    = "update user set paid = $total where id = $id_user";
    $result1 = mysqli_query($conexionmaster, $sql1);

    $sql3    = "insert into user_gamepoints (id_game, id_user, points) values ($id_game,$id_user,0)";
    $result3 = mysqli_query($conexion, $sql3);

    $sql93    = "insert into user_game_art (id_game) values ($id_game)";
    $result93 = mysqli_query($conexion, $sql93);

    $sql5    = "insert into user_game_art_login (id_game) values ($id_game)";
    $result5 = mysqli_query($conexion, $sql5);

    $sql6    = "insert into user_game_art_registration (id_game) values ($id_game)";
    $result6 = mysqli_query($conexion, $sql6);

    $sql7    = "insert into user_game_art_splashscreen (id_game) values ($id_game)";
    $result7 = mysqli_query($conexion, $sql7);

    $sql8    = "insert into user_game_art_codedashboard (id_game) values ($id_game)";
    $result8 = mysqli_query($conexion, $sql8);

    $sql9    = "insert into user_game_art_leaderboard (id_game) values ($id_game)";
    $result9 = mysqli_query($conexion, $sql9);

    $sql10    = "insert into user_game_art_congratulations (id_game) values ($id_game)";
    $result10 = mysqli_query($conexion, $sql10);

    $sql11    = "insert into user_game_art_admin (id_game) values ($id_game)";
    $result11 = mysqli_query($conexion, $sql11);

    $sql12    = "insert into user_game_art_loading (id_game) values ($id_game)";
    $result12 = mysqli_query($conexion, $sql12);

    $sql13    = "insert into user_game_art_keyboard (id_game) values ($id_game)";
    $result13 = mysqli_query($conexion, $sql13);

    $sql14    = "insert into user_game_art_home (id_game) values ($id_game)";
    $result14 = mysqli_query($conexion, $sql14);

    $text = "Game created.";
} else {

    $text = "No more free or paid games. Renew your subscription.";

}

header("Location: creategames.php?t='$text'");
ob_end_flush();
exit();
