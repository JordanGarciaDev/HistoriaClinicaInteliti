<?php
include 'connect.php';


if(isset($_GET['game'])){
  $id_game = $_GET['game'];
}else{
  $id_game = 46;
}

class Answer
{
   public $id;
   public $name;
   public $connection_type;
   //public $difficulty;
   public $points;
   public $points_punishment;
   public $points_multiplier;
   public $total_lifes;
   public $time_limit;
   public $fecha;
   public $title_marketing;
   public $title_terms;
   public $legal;
   public $text_color;
}


$categoria[0] = "image_question";
$categoria[1] = "matching_question";
$categoria[2] = "text_question";
$categoria[3] = "sequencing_question";
$categoria[4] = "true_false";
$categoria[5] = "elimination_question";
$categoria[6] = "video_question";
$cantidadTotal = 0;


	for($i = 0; $i < 7; $i++){

		$sql1 = "select * from ".$categoria[$i]." where id_game = $id_game";
		$result1 = mysqli_query ( $conexion,$sql1 );
		$cant1 = mysqli_num_rows( $result1 );

		if($cant1 != 0){
			$cantidadTotal++;
		}

	}

	if($cantidadTotal>0){

    $sql = "select * from games where id = $id_game";
    $result = mysqli_query ( $conexion,$sql );
    $res = mysqli_fetch_array($result);

		  $p = new Answer();
   		$p->id = $res[0];
   		$p->name = $res[2];
      $p->connection_type = $res[3];
   		//$p->difficulty = $res[4];
      $p->points = $res[5];
      $p->points_punishment = $res[6];
      $p->points_multiplier = $res[7];
   		$p->total_lifes = $res[8];
   		$p->time_limit = $res[9];
      $p->fecha = $res[11];
      $p->title_marketing = $res[13];
      $p->title_terms = $res[14];
      $p->legal = $res[15].' Apple Inc and Google, LLC are not involved in any way with the contest or sweepstakes. ';
      $p->text_color = $res[16];

   		$arr[0] = $p;
		  $contador++;

	}

clearstatcache();
	echo json_encode($arr);

mysqli_close($conexion);
?>
