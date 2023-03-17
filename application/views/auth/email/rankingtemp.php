<?php
session_start();
include 'connect2.php';
mysqli_set_charset($conn, "utf8");


class Answer
{
	 public $nombre;
   public $correo;
   public $puntos;
   public $marketing;

}

class Answer2
{
   public $Ranking;
}


$id_trivia = $_POST["trivia"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$puntos = $_POST["puntos"];
$marketing = $_POST["marketing"];


$contador=0;

$stmt = $conn->prepare("INSERT INTO ranking_temporal (id_trivia, nombre, correo, puntos, marketing) VALUES (?, ?, ?, ?, ?)");
$stmt2 = $conn->prepare("UPDATE ranking_temporal set puntos = ? where correo = ? and id_trivia = ?");

$sql="SELECT COUNT(id) FROM ranking_temporal where correo = '$correo' and id_trivia = $id_trivia";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_NUM);

if($row[0] == 0){

	$stmt->bind_param('issis',$id_trivia,$nombre,$correo,$puntos,$marketing);

	if ($stmt->execute()) {
		 // it worked
		 //echo "ok";


	} else {
		 // it didn't
		//echo "no";

	}

	$sql1="SELECT * FROM ranking_temporal where id_trivia = $id_trivia ORDER BY puntos DESC";
	$result1=mysqli_query($conn,$sql1);

	while ($res = mysqli_fetch_array($result1,MYSQLI_NUM)) {


				$p = new Answer();
				$p->nombre = $res[2];
				$p->correo = $res[3];
				$p->puntos = $res[4];
				$p->marketing = $res[5];

				$arr[$contador] = $p;

				$contador++;
	}

	$a = new Answer2();
	$a->Ranking = $arr;
	echo json_encode($a, JSON_UNESCAPED_UNICODE);

	$stmt->close();

}else{

	$sql1="SELECT puntos FROM ranking_temporal where id_trivia = $id_trivia and correo = '$correo'";
	$result1=mysqli_query($conn,$sql1);

	while ($res = mysqli_fetch_array($result1,MYSQLI_NUM)) {
		if($res[0]<$puntos){
			$stmt2->bind_param('isi',$puntos,$correo,$id_trivia);

			if ($stmt2->execute()) {
				 //it worked
				 //echo "ok";

			} else {
				 // it didn't

			}
		}
	}

	$sql1="SELECT * FROM ranking_temporal where id_trivia = $id_trivia ORDER BY puntos DESC";
	$result1=mysqli_query($conn,$sql1);

	while ($res = mysqli_fetch_array($result1,MYSQLI_NUM)) {


				$p = new Answer();
				$p->nombre = $res[2];
				$p->correo = $res[3];
				$p->puntos = $res[4];
				$p->marketing = $res[5];

				$arr[$contador] = $p;

				$contador++;
	}


	$a = new Answer2();
	$a->Ranking = $arr;
	echo json_encode($a, JSON_UNESCAPED_UNICODE);

	$stmt2->close();

}

?>
