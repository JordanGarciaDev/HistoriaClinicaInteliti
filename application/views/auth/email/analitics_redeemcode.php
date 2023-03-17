<?php
session_start();
include 'connect2.php';
mysqli_set_charset($conn, "utf8");


class Answer
{
	 public $correo;
   public $visita;
   //public $fecha;
   //public $puntos;
   //public $marketing;

}

/*class Answer2
{
   public $Ranking;
}*/


$id_trivia = $_POST["trivia"];
$correo = $_POST["correo"];
$visita = 1;
$fecha = date("Y-m-d");
//$correo = $_POST["correo"];
//$puntos = $_POST["puntos"];
//$marketing = $_POST["marketing"];


$contador=0;

$stmt = $conn->prepare("INSERT INTO analitics_redeemcode (id_trivia, correo, visita, fecha) VALUES (?, ?, ?, ?)");
//$stmt2 = $conn->prepare("UPDATE analitics_ingame set puntos = ? where correo = ? and id_trivia = ?");

//$sql="SELECT COUNT(id) FROM analitics_ingame where correo = '$correo' and id_trivia = $id_trivia";
//$result=mysqli_query($conn,$sql);
//$row=mysqli_fetch_array($result,MYSQLI_NUM);


	$stmt->bind_param('isis',$id_trivia,$correo,$visita,$fecha);


if ($stmt->execute()) {
		 // it worked
		 echo "ok";


	} else {
		 // it didn't
		echo "no";

	}

	//$stmt->execute();
	$stmt->close();
		 // it worked
		 //echo "ok";

/*if($row[0] == 0){

	$stmt->bind_param('isi',$id_trivia,$correo,$visita);

	if ($stmt->execute()) {
		 // it worked
		 //echo "ok";


	} else {
		 // it didn't
		//echo "no";

	}*/

/*	$sql1="SELECT * FROM analitics_ingame where id_trivia = $id_trivia ORDER BY puntos DESC";
	$result1=mysqli_query($conn,$sql1);

	while ($res = mysqli_fetch_array($result1,MYSQLI_NUM)) {


				$p = new Answer();
				$p->correo = $res[2];
				$p->visita = $res[3];
				//$p->visita = $res[4];
				//$p->marketing = $res[5];

				$arr[$contador] = $p;

				$contador++;
	}

	$a = new Answer2();
	$a->Ranking = $arr;
	echo json_encode($a, JSON_UNESCAPED_UNICODE);

	$stmt->close();

}else{

	$sql1="SELECT puntos FROM analitics_ingame where id_trivia = $id_trivia and correo = '$correo'";
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

	$sql1="SELECT * FROM analitics_ingame where id_trivia = $id_trivia ORDER BY puntos DESC";
	$result1=mysqli_query($conn,$sql1);

	while ($res = mysqli_fetch_array($result1,MYSQLI_NUM)) {


				$p = new Answer();
				$p->correo = $res[2];
				$p->visita = $res[3];
				//$p->puntos = $res[4];
				//$p->marketing = $res[5];

				$arr[$contador] = $p;

				$contador++;
	}


	$a = new Answer2();
	$a->Ranking = $arr;
	echo json_encode($a, JSON_UNESCAPED_UNICODE);

	$stmt2->close();

}*/

?>
