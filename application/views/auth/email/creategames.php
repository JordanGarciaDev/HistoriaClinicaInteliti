<?php
ob_start();
?>
<?php
//ini_set('display_errors',1);
session_start();
include 'connect.php';
include 'connectmaster.php';
$textResult = $_GET['t'];

$email = $_SESSION['username'];
if($textResult==null || $textResult == ""){
	$textResult = "None previous action.";
}else{
	echo "<div class='alert-box success'>";
	echo $textResult;
	echo "</div>";

}

if(isset($_GET['cc'])){
	if($_GET['cc']==1){
		$textResult = "CREDITS were added to your account, you can create games now";
	}else{
		$textResult = "None previous action.";
	}

}



if(isset($_SESSION['username'])){   
    //echo $_SESSION['username'];
}
else{
    header("Location: ../gameitlogin/index.php");
    ob_end_flush();
}

?>
<style>

#blah2{
    background: #2b2b2b;
}

html{
    overflow: hidden;
    margin: 0;
    padding: 0;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

#section {
	width:45%;
	height:330px;
	min-width: 250px;
	float: left;
	padding:10px;
	border-radius: 10px;
	background-color: #131313;
}

#section1 {
	float:left;
	margin-left: 5px;
	width:45%;
	min-width: 250px;
	height: 330px;
	padding:10px;
	border-radius: 10px;
	background-color: #131313;

}

#section1_2 {
	float:left;
	width:100%;
}

#section2 {
	float:left;
	margin-top: 0px;
	margin-right: 5px;
	width:60%;
	min-width: 250px;
	height: 600px;
	padding:10px;
	border-radius: 0px;
	background-color: #1F2228;

}

.section2b {
	float:left;
	margin-top: 0px;
	margin-right: 5px;
	width:36%;
	min-width: 250px;
	height: 600px;
	padding:10px;
	border-radius: 0px;
	background-color: #1F2228;

}

#section2_1 {
	float:left;
	margin-top: 5px;
	margin-right: 5px;
	width:60%;
	min-width: 250px;
	height: 30px;
	padding:10px;
	border-radius: 0px;
	background-color: #1F2228;
}
#section2_1_game {
    /* float: left; */
    position: relative;
    margin-top: 5px;
    margin-right: auto;
    margin-left: 74px;
    width: 44%;
    min-width: 250px;
    height: 30px;
    padding: 10px;
    border-radius: 10px;
    background-color: #131313;
}

#section2_2{
	float:left;
	margin-top: 5px;
	margin-right: 5px;
	width:36%;
	min-width: 250px;
	height: 30px;
	padding:10px;
	border-radius: 0px;
	background-color: #1F2228;
}

#section2_1 p{
	text-align: center;
	font-family: snick;
	font-size: 22px;
	margin: 0px;
}
#section2_1_game p{
	text-align: center;
	font-family: arial;
	font-size: 22px;
	margin: 0px;
}
#section2_2 p{
	text-align: center;
	font-family: snick;
	font-size: 22px;
	margin: 0px;
}
/*
#boton_sub{
	visibility: hidden;
}*/

#section2 form input{
	color: #fff;
    font-weight: 700;
	font-size: 17px;
	display: block;
	margin-left: 0px;
	margin-right: 0px;
}

#section2 form textarea{
	color: #b4b4b4;
	display: block;
	margin-left: auto;
	margin-right: auto;
}

#section form input{
	display: block;
	margin-left: auto;
	margin-right: auto;
	font-family: h37;
	font-size: 14px;
}


#section3 {
	float:left;
	margin-right: 5px;
}

#section4 {
	float:left;
	margin-top: 5px;
	margin-left: 5px;
	width:45%;
	min-width: 250px;
	height: 930px;
	padding:10px;
	border-radius: 10px;

	background-color: #131313;
}

.section4 {
	float:left;
	margin-top: 5px;
	margin-left: 5px;
	width:45%;
	min-width: 250px;
	height: 1330px;
	padding:10px;
	border-radius: 10px;

	background-color: #131313;
}

.section4 form input{
	color: #b4b4b4;
}

.section4 form textarea{
	color: #b4b4b4;
}

#section5 {
	width:100px;
	column-count: 2;
	-moz-column-count: 2;
	-webkit-column-count: 2;
	text-align: justify;
	display: block;
	margin-left: auto;
	margin-right: auto;
}

p {
	color: #b4b4b4;
	font-family: h37;
	font-size: 18px;
	font-family: 'Bebas Neue';
}

.add{
	width: 220px;
	height: 37px;
    margin-right: -7px !important;
    margin-top: -8px;
	border: none; <-- This thing here
	border:solid 1px #ccc;
	border-radius: 0px;
	background-color: #2ABAEA;
	color: #b4b4b4;
}

.add2{
	width:220px;
	min-width: 100px;
	margin: 0 auto;
	border: none; <-- This thing here
	border:solid 1px #ccc;
	border-radius: 10px;
	background-color: #2b2b2b;
	color: #b4b4b4;
}


.styled-select select {
    background: #fff0;
    width: 100%;
    height: 37px;
    padding: 5px;
    font-size: 11px;
    line-height: 1;
    border: 0;
    border-radius: 0;
    color: #fff;
    -webkit-appearance: none;
    font-family: 'Bebas Neue';
    font-size: 17px;
}

.styled-select {
	width: 218px;
	    height: 37px;
    margin-right: -7px !important;
    margin-top: -8px;
	overflow: hidden;
	background: url(img/gui_BlueArrowDesplegable.png) no-repeat right #2ABAEA;
	    background-size: 20px;
	border: 1px solid;
}




html {

	background-size: 100% 100%;
	background-color: #2ABAEA;
	font-family: h37;
	font-size: 18px;
}



/**

**/
#style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 0px;
	background-color: #fff0;
}

#style-2::-webkit-scrollbar
{
	width: 12px;
	background-color: #fff0;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 0px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #1A7590;
}

/**/

/*
*/

.header {
	height: 100px;
	margin-bottom: 10px;

	background-image: url("img/gui_Fondo_ArtEditor.png");
	background-size: cover;
	background-repeat: no-repeat;


}

#logo {
	height: 100px;
	width: 80px;
	margin-bottom: 10px;
	right: 10px;
	background-image: url("img/gui_LogoBanderin.png");
	background-size: contain;
	background-repeat: no-repeat;
	position: absolute;
}

.container {
	position: relative;
	width:89%;
	min-width: 710px;
	height:75%;
	min-height:300px;
	padding:10px;
	overflow-y: scroll;
	border-radius: 10px;
	display: block;
	margin-left: auto;
	margin-right: auto;

}
.containerheader {
	position: relative;
	width:90%;
	padding:10px;
	border-radius: 10px;
	margin-left: auto;
	margin-right: auto;

}

.container form input{
	color: #b4b4b4;
	font-family: h37;
	font-size: 14px;
	display: block;
	margin-left: auto;
	margin-right: auto;
}

.section8 {
	/* position is static by default */
	margin-left: 200px;
}
body {
  margin-bottom: 120px;
    display: block;
    margin: 0px;
}


a {
	font-family: snick;
	font-size: 28px;
	text-decoration: none;
}

/* unvisited link */
a:link {
	color: #b4b4b4;
}

/* visited link */
a:visited {
	color: #b4b4b4;
}

/* mouse over link */
a:hover {
	color: #dfdddd;
}

/* selected link */
a:active {
	color: #dfdddd;
}

.custom-upload {
	cursor: pointer;
}
.custom-upload input {
	left: -9999px;
	position: absolute;
}

#marcador{
	width: 20px;
	height: 20px;
	margin-left: 10px;
}

@font-face {
	font-family: h37;
	src: url("font/H37.ttf");
}

@font-face {
	font-family: snick;
	src: url("font/Snickles.ttf");
}
.hidden{
display: none !important;;
}
p {
    display: block;
    margin-block-start: 0em;
    margin-block-end: 0em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-left: 10px;
    padding-right: 10px;
}
.floatright{
    float: right;
}
#opv p{
    float: left;
}
#opf1 p{
    float: left;
}
#opf2 p{
    float: left;
}
#opf3 p{
    float: left;
}
#puntos p{
    float: left;
}
#pre p{
    float: left;
}


#opv .add{
    float: right;
}
#opf1 .add{
    float: right;
}
#opf2 .add{
    float: right;
}
#opf3 .add{
    float: right;
}
#puntos .add{
    float: right;
}

div#pre {
    width: 100%;
    height: 80px;
}
textarea.add2 {
    float: right;
    }
 .botonimg {
    float: left;
    margin-left: 50px;
    margin-top: 10%;
}
.image-upload>input {
  display: none !important;
}
.ui-timepicker-list {
    background: #fff;
    list-style: none;
    padding-inline-start: inherit;
    height: 115px;
    text-align: center;
    width: 105px;
    white-space: unset;
    overflow-y: scroll;
    margin-top: 0px !important;
}

.ui-timepicker-list::-webkit-scrollbar {
    -webkit-appearance: none;
}
.ui-timepicker-list::-webkit-scrollbar-thumb {
	border-radius: 2px;
    border: 1px solid white;
    background-color: rgba(0, 0, 0, .5);
}
h2 {
font-family: 'Bebas Neue';
}
p {
    margin-bottom: 6px;
}

   .barraInferior {
    overflow: hidden;
    width: 100%;
    }
    
    .barraInferior ul {
        list-style-type: none;
        margin: 0 auto;
        padding-left: 30% ;
        overflow: hidden;
        background-color: #333;
        position: fixed;
        bottom: 0;
        width: 100%;
        
    }
    
    .barraInferior li {
        float: left;
        
    }
    
    .barraInferior li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }



#ui-datepicker-div {
        top: 45% !important;
}
.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.alert-box {
	padding: 15px;
    margin-bottom: 0px;
    border: 1px solid transparent;
    border-radius: 0px;  
}

.success {
	color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    display: none;
    position: absolute;
    bottom: 0px;
    margin-right: auto;
    margin-left: auto;
    width: 60%;
    z-index: 99;
    left: 0;
	right: 0;
}

.failure {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
    display: none;
}

.warning {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
    display: none;
}
option {
    background-color: #000 !important;
}

.contenidooption {

color: #fff;text-align: center;font-size: 22px;background: #2ABAEA;display: block;padding: 15px;font-weight: 600;

}

</style>
<!DOCTYPE html>
<html>
<head>
	  <title>Game Editor - Gameit</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">
	<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
		<link rel="icon" type="image/png" href="/img/favicon.png" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>

<link href="css/style.css" rel="stylesheet" type="text/css">

	<script type='text/javascript'>//<![CDATA[
		$(window).load(function(){
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#blah').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#fileToUpload").change(function(){
				readURL(this);
			});
		});//]]>
		$(window).load(function(){
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#blah2').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#fileToUpload").change(function(){
				readURL(this);
			});
		});//]]>

		window.setTimeout(function() {
  $( "div.success" ).fadeIn( 300 ).delay( 5500 ).fadeOut( 400 );
});


	</script>

</head>



<div style="width: 100%;height: 148px;max-height: 148px;">
<img src="img/gui_LogoGameitHeader.png" style="width: 9%;max-height: 148px;float: left;
"><img src="img/gui_HeaderGameit.png" style="vertical-align: top;width: 91%;height: 70%;margin-bottom: -52px;">
	<span style="margin: 20px;color: #fff;font-family: 'Bebas Neue';font-size: 40px;">Create Games</span>
<div style="width: 91%;float: right;background: #1A7590; height: 30%"><img src="img/gui_Step1Active.png" style="margin-top: 4px;vertical-align: middle;width: 150px;margin-left: 40px;float: left;"> <img src="img/gui_ArrowStep.png" style="margin-top: 10px;margin-left: 10px;width: 12px;float: left;"><img src="img/gui_Step2Inactive.png" style="margin-top: 4px;margin-left: 10px;width: 150px;float: left;"><img src="img/gui_ArrowStep.png" style="margin-top: 10px;margin-left: 10px;width: 12px;float: left;"><img src="img/gui_Step3Inactive.png" style="margin-top: 4px;margin-left: 10px;width: 150px;float: left;">
    <span style="float: right; color: #fff; font-family: 'Bebas Neue'; font-size: 23px;" ><div style="
    float: left;
    margin-top: 8px;
"> <?php echo $email; ?> <span style="color: #91CE17;"> USER</span> <span> <img src="img/gui_IconPerfilBarTop.png" style="vertical-align: top;margin-right: 20px;width: 21px;"></div>
  <a href="https://gameit.pressstart.co/gameitlogin/dashboard_master.php"><img src="img/gui_ButtonLogoutBarTop.png" style="vertical-align: top;height: -webkit-fill-available;"></a><span> 
</span>
</div>
</div>



<?

//$sqlL = "select id,email from user order by id desc";

$email = $_SESSION['username'];

$sqlU = "select id,email from user where email = '$email'";
$resultU = mysqli_query ( $conexion,$sqlU);
$resU = mysqli_fetch_array($resultU);

$sqlL = "select id,email from user where email = '$email'";

$sqlD = "select id,name from difficulty order by id desc";

$sqlD24 = "select id,name from connection_type order by id desc";

$sqlG = "select id,name from games where id_user = $resU[0] AND estatus = 0 order by id desc";

$sqlC = "select id,name from category order by id desc";

$sqlf = "select free, paid from user where id = $resU[0]";
$resultf = mysqli_query ( $conexion,$sqlf );
$resf = mysqli_fetch_array($resultf);

if($resf[0]>0){

	$alert = 1;

}else if($resf[1]>0){

	$alert = 1;

}else{

	$alert = 0;

}

?>





  <div style="width: 100%;"> <div style="width: 9%;float: left;height: 100%;background: #1F2228;"> <a href="dashboard.php"><img src="img/gui_DashboardInactive.png" style="width: 100%;"></a>
    <a href="creategames.php"><img src="img/gui_CreateGamesActive.png" style="width: 100%;margin-top: -12px;"></a><a href="customize_games.php"><img src="img/gui_BEditGamesInactive.png" style="width: 100%;margin-top: -12px;"></a><a href="publishgames.php"><img src="img/gui_PublishGameInactive.png" style="width: 100%;margin-top: -12px;"></a></div>

<div class="container" id="style-2">
	<div id='section2_1'>
<p><b><img src="img/gui_AddGameIcon.png" style="height: 35px;"></b></p>
</div>

<div id='section2_2'>
<p><b>
<img src="img/gui_InformationIcon.png" style="height: 35px;"></b></p>
</div>
<br>


	<div id='section2'>

		<form action="addmini.php" id="addmini" method="post" enctype="multipart/form-data">

			<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;">User: <span style="color: #fff;" class="floatright"> <?php
				$resultL = mysqli_query ( $conexion,$sqlL);
				while($resL = mysqli_fetch_array($resultL)){
					echo ''.$resL[1].'';
				}
				?></span>
				<span class="styled-select hidden"><select name="user">
				<?php
				$resultL = mysqli_query ( $conexion,$sqlL);
				echo $resL;
				while($resL = mysqli_fetch_array($resultL)){
					echo '<option value="'.$resL[0].'">'.$resL[1].'</option>';
				}
				?>
			</select></span></p>

			<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;">Game name:
			<input class="add floatright name" type="text" name="name" value="" required> <img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>

			<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;">Connection type:<span class="styled-select floatright"><select name="connection_type" class="connection_type" id="connection_type" onchange="nuevoym(this)">
				<?php
				$resultD24 = mysqli_query ( $conexion,$sqlD24);
				while($resD24 = mysqli_fetch_array($resultD24)){
					echo '<option value="'.$resD24[0].'">'.$resD24[1].'</option>';
				}
				?>
			</select></span><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>



<div id="diffi1" style="display: block;">
			<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA; ">Visibility:<span class="styled-select floatright"><select class="difficulty" name="difficulty">
				<option value="1">Private</option>
				<option value="2">Public</option>
			</select></span><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>
</div>


<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;">Select text color
			<input class="add floatright text_color" type="color" name="text_color"  id="text_color" value="#00889B"><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>

<div id="diffi2" style="display: block;">
			<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA; ">Points for completion:
			<input class="add floatright points" type="number" name="points" value="0"><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>

</div>


			<p style=" border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;">Points Punishment:
			<input class="add floatright points_punishment" type="number" name="points_punishment" value="0"><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>





<?php
$fetchqry = "select * from user where email = '$email'";
$result2=mysqli_query($conexionmaster,$fetchqry);
$num=mysqli_num_rows($result2); while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

$type = $row['type_subscription']; 
?>

<?php if ($type >= 2) {


echo "<div id='diffi3' style='display: block;'>
<p style='border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA; '>Points Multiplier:
			<input class='add floatright points_multiplier' type='number' name='points_multiplier' value='1'><img class='floatright' src='img/gui_InfoIcon.png' height='20px' style='margin-right: 5px;' alt=''></p>
</div>";

}
?>

<?php } ?>





<div id="diffi4" style=" display: block;">
			<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;"> # of lifes per player in game:
			<input class="add floatright total_lifes" type="number" name="total_lifes" value="1"><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>
</div>




<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;">Time limit (Seconds) :
			<input class="add floatright time_limit" type="number" name="time_limit" value=""><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>


			<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;">Date end license (DD/MM/AAAA):
			<input class="add floatright fecha" type="text" name="fecha" id="datepicker" required><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>


			<p style="border: 1px solid #2ABAEA;padding: 7px;color: #2ABAEA;">Time end license: (Militar time HR:MM:SS)
			<input class="add floatright hora" type="text" name="hora"  id="hora" data-mask='hh24:mi:ss'  class="timepicker" value="" required><img class="floatright" src="img/gui_InfoIcon.png" height="20px" style="margin-right: 5px;" alt=""></p>


			<center style="width: 100%;right: 0px;bottom: -12px;background: #1F2228;color: #fff;position: sticky;padding: 5px;display: flex;margin-left: 0px;margin-right: 0px;justify-content: center;"><input type="image" value="Create mini game" src="img/gui_CreateNewGameButton.png" alt="Submit" width="225" height="45"> <!--<span style="
    margin-top: auto;
    margin-bottom: auto;
"><? //echo "".$textResult.""; ?></span>--></center>




		</form>
	</div>



	<div class='section2b' id="style-2" style="text-align: center;">


<span class="contenidooption">


<span class="hidedosuno">This field sets the name of your game, it will help you identify your game when
customizing and publishing it.</span>

<span class="hidedosdos">This field is to decide if you want your game with an offline ranking and having
everybody play in the same device or if you want your game with an online ranking and all your users
play in their own devices.</br></br>
Online – Is great to promote your brand across different geographic locations, to engage a big number of
players and it also shows you the user information here in the web admin where you can review it, download it
and reset it as you wish.</br></br>
Offline - Is great for events where you want people approaching your stand and play your game for possible
prices, is also great for poor internet connection locations since the game works offline and you get the user
information directly from the game to your device as a CSV form.
</span>

<span class="hidedostres"> This field is to decide if you want your game public for everyone to find it when they download the Gameit Trivia app or private so only the users with your code can find it.</span>

<span class="hidedoscuatro">This field sets the points you want to award your users for answering all your
questions correctly, it can be zero if you want.</span>

<span class="hidedoscinco">This field sets the points you want to take away from your users when they answer
a question incorrectly, it can be zero if you want.</span>

<span class="hidedosseis">Multiplier number to increase the points a user gets when answering two or more questions in a row, it can be zero if you want.</span>

<span class="hidedossiete">Online (Number of questions a user can answer incorrectly
before losing the game).</span>
<span class="hidedosocho">
<div id="onlineview" style="display: block;">Online (Time users have to answer each question) </div>
<div id="offlineview" style="display: none;">offline (Time users have to answer as many questions as possible)</div>
</span>

<span class="hidedosnueve">Day and month your game will expire and users won&#39;t be able to
play anymore.</span>
<span class="hidedosdies">Time of day your game will expire and users won&#39;t be able
to play anymore.</span>

<span class="hidedosonce">This field sets the color for all the text of the game.</span>
<br><br>

 <? //echo "".$textResult.""; ?></span>

 

		<!--<p style="float: left;">Game<div class="styled-select floatright"><select name="id_game" id="id_game">
			<?php
			/*$resultG1 = mysqli_query ( $conexion,$sqlG );
			echo '<option value="0">List of games: </option>';
			while($resG1 = mysqli_fetch_array($resultG1)){
				echo '<option value="'.$resG1[0].'">'.$resG1[1].'</option>';
			}*/
			?>
		</select></div></p>
<br>
<br>
		<div id="hidden_div" style="display: none;" ><p style="float: left;">Select test type:</p>
		<div class="styled-select floatright"><select name="categoria" id="categoria" onchange="showDiv()">
			<option value=''>select type</option>
			<option value='image_question'>image_question</option>
			<option value='true_false'>true_false</option>
			<option value='text_question'>text_question</option>
			<option value='elimination_question'>elimination_question</option>
			<option value='sequencing_question'>sequencing_question</option>
			<option value='video_question'>video_question</option>
		</select></div></div>
<br>
<br>
		<form id="reused_form" action="testaddall.php" method="post" enctype="multipart/form-data">

			<p style="float: left;">Category:<div class="styled-select"><select name="category">
				<?php
				//$resultC11 = mysql_query ( $sqlC);
				//while($resC11 = mysql_fetch_array($resultC11)){
				//	echo '<option value="'.$resC11[0].'">'.$resC11[1].'</option>';
				//}
				?>
			</select></div></p>
<br>

			<div id="hidden_div2" style="display: none;"><p style="float: left; display:block" id="blokeo13">Difficulty:<div style="display:block" id="blokeo15" class="styled-select floatright"><select style="display:block" id="blokeo14" name="difficulty">
				<?php
				¨/*$resultD11 = mysqli_query ( $conexion,$sqlD);
				while($resD11 = mysqli_fetch_array($resultD11)){
					echo '<option value="'.$resD11[0].'">'.$resD11[1].'</option>';
				}*/
				?>
			</select></div></p>
<br>
<br>

<div id="hidden_div3" style="display: none;">
			<div id="pre">
			</div>
			<br>
			<br>
<div class="row">
					<center><div id="oldballetex" style="display: none">

				<label class="custom-upload"><input type="file" name="fileToUpload" id="fileToUpload"/>
						<img src="img/gui_botonChososeFile.png" width="125" height="35" class="botonimg"></img>
					</label><br>

				<img id="blah" style="display: none" src="#" alt="your image" onerror="this.src='img/Preview-icon.png';"  width="125" height="125" /><video id="blah2" style="display: none" src="#" alt="your image"  width="125" height="125" /></video>
				
					
				</div> </center>
				<br>
			<br>




			<div id="opv">
			</div>
			<br>
			<br>


			<div id="opf1">
			</div>
			<br>
			<br>


			<div id="opf2">
			</div>
			<br>
			<br>


			<div id="opf3">
			</div>
			<br>
			<br>


			<div id="puntos">
			</div>
			<br>
			<br>
				<input id="boton_sub" type="image" value="Crear pregunta" src="img/gui_botonCreate.png" alt="Submit" width="125" height="35"></div>
</div>
			</form>-->
		</div>


	</div>
<footer class="footer" style="display: none;">
  <center style="
    color: #fff;
"> Get the App<p><a href="https://play.google.com/store/apps/details?id=com.pressstart.gameittrivia" target="_blank"><img id="center" src="https://www.pressstart.co/wp-content/uploads/2019/10/Play-Store.svg" alt="your image" width="8%" 
"></a>&nbsp;&nbsp;<img id="center" src="https://www.pressstart.co/wp-content/uploads/2019/10/App-Store.svg" alt="your image" width="8%"> </p>	</center>


<style type="text/css">

.hidedosuno,.hidedosdos,.hidedostres,.hidedoscuatro,.hidedoscinco,.hidedosseis,.hidedossiete,.hidedosocho,.hidedosnueve,.hidedosdies,.hidedosonce{
    display: none;
}

.points:hover .hidedos {
  display: inline;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
    $('.name').focus(function(){
        $(this).show();
        $('.hidedosuno').show();
        $('.hidedosdos').hide();
        $('.hidedostres').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.connection_type').focus(function(){
        $(this).show();
        $('.hidedosdos').show();
        $('.hidedosuno').hide();
        $('.hidedostres').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.difficulty').focus(function(){
        $(this).show();
        $('.hidedostres').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.points').focus(function(){
        $(this).show();
        $('.hidedoscuatro').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedostres').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.points_punishment').focus(function(){
        $(this).show();
        $('.hidedoscinco').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedoscuatro').hide();
        $('.hidedostres').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.points_multiplier').focus(function(){
        $(this).show();
        $('.hidedosseis').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedostres').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.total_lifes').focus(function(){
        $(this).show();
        $('.hidedossiete').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedostres').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.time_limit').focus(function(){
        $(this).show();
        $('.hidedosocho').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedostres').hide();
        $('.hidedosnueve').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.fecha').focus(function(){
        $(this).show();
        $('.hidedosnueve').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedostres').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').hide();
    });
});
$(document).ready(function(){
    $('.hora').focus(function(){
        $(this).show();
        $('.hidedosdies').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedostres').hide();
    });
});

$(document).ready(function(){
    $('.text_color').focus(function(){
        $(this).show();
        $('.hidedosdies').show();
        $('.hidedosuno').hide();
        $('.hidedosdos').hide();
        $('.hidedoscuatro').hide();
        $('.hidedoscinco').hide();
        $('.hidedosseis').hide();
        $('.hidedossiete').hide();
        $('.hidedosocho').hide();
        $('.hidedosnueve').hide();
        $('.hidedostres').hide();
        $('.hidedosdies').hide();
        $('.hidedosonce').show();
    });
});
</script>

</footer>	



	<!-- The Modal -->
	<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<!-- <span id="modalClose" class="close">&times;</span> -->
			<p>NEW TEST IS UPLOADING, PLEASE WAIT</p>
		</div>

	</div>

	<script type="text/javascript">
	$(document).ready(function () {

		var aviso = <? echo $alert; ?>;

		//if(aviso != 1){
		//	alert("No more free or paid games. Renew your subscription.");
		//}
		// if user chooses an option from the select box...
		$("#id_question").change(function () {
			// get selected value from selectbox with id #id_question
			var id_question = $(this).val();
			$.ajax({

				url: "questioninfo.php",
				data: "q=" + id_question,
                cache: false,
				dataType: "json",

				// if successful
				success: function (response, textStatus, jqXHR) {

					// no questions found -> an empty array was returned from the backend
					if (response.id == null) {
						//$('#checklist').html("<br>Nothing found!");
					}
					else {
						// backend returned an array of names
						var cont = -1;
						// remove items from previous searches from the result list

						var lista1 = $("#answer1");
						var lista2 = $("#answer2");
						var lista3 = $("#answer3");
						var lista4 = $("#answer4");


						var listp1 = $("#points1");
						var listp2 = $("#points2");
						var listp3 = $("#points3");
						var listp4 = $("#points4");

						var liste = $("#ending");
						var listq = $("#question");

						var listD = $("#new_document");
						var listC = $("#new_contact");

						// remove items from previous searches from the result list
						$('#answer1').empty();
						$('#answer2').empty();
						$('#answer3').empty();
						$('#answer4').empty();
						$('#points1').empty();
						$('#points2').empty();
						$('#points3').empty();
						$('#points4').empty();
						$('#ending').empty();
						$('#question').empty();
						$("#new_document").empty();
						$("#new_contact").empty();



						$.each(response.question, function (i, val) {

							listq.append($('<textarea class="add2" name = "text_question" rows="6" cols="40" required>'+val+'</textarea>'));

						});


						$.each(response.ending, function (i, val) {
							if(val == "yes"){
								liste.append($('<p><input type="radio" name="final" value="yes" checked>yes</p>'));
								liste.append($('<p><input type="radio" name="final" value="no">no</p>'));
							}else{
								liste.append($('<p><input type="radio" name="final" value="yes">yes</p>'));
								liste.append($('<p><input type="radio" name="final" value="no" checked>no</p>'));

							}

						});

						$.each(response.answer, function (i, val) {
							if(i==0){
								lista1.append($('<input class="add " type="text" name="answer1" value="'+val+'">'));
								lista1.append($("<input type='hidden' name='ida1' value='"+response.id1+"'>"));
							}
						});

						$.each(response.answer, function (i, val) {
							if(i==1){
								lista2.append($('<input class="add " type="text" name="answer2" value="'+val+'">'));
								lista2.append($("<input type='hidden' name='ida2' value='"+response.id2+"'>"));
							}
						});

						$.each(response.answer, function (i, val) {
							if(i==2){
								lista3.append($('<input class="add " type="text" name="answer3" value="'+val+'">'));
								lista3.append($("<input type='hidden' name='ida3' value='"+response.id3+"'>"));
							}
						});

						$.each(response.answer, function (i, val) {
							if(i==3){
								lista4.append($('<input class="add " type="text" name="answer4" value="'+val+'">'));
								lista4.append($("<input type='hidden' name='ida4' value='"+response.id4+"'>"));
							}
						});

						$.each(response.points, function (i, val) {
							if(i==0){
								listp1.append($('<input class="add " type="text" name="points1" value="'+val+'">'));
							}
						});

						$.each(response.points, function (i, val) {
							if(i==1){
								listp2.append($('<input class="add " type="text" name="points2" value="'+val+'">'));
							}
						});

						$.each(response.points, function (i, val) {
							if(i==2){
								listp3.append($('<input class="add " type="text" name="points3" value="'+val+'">'));
							}
						});

						$.each(response.points, function (i, val) {
							if(i==3){
								listp4.append($('<input class="add " type="text" name="points4" value="'+val+'">'));
							}
						});


						cont = -1;
						$.each(response.documentsNAME, function (i, val) {
							cont=cont+1;
							$.each(response.documentsID, function (j, val1) {
								if(j==cont){
									listD.append($("<option value='"+val1+"'>"+val+"</option>"));
									return false;
								}
							});
						});


						cont = -1;
						$.each(response.contactsNAME, function (i, val) {
							cont=cont+1;
							$.each(response.contactsID, function (j, val1) {
								if(j==cont){
									listC.append($("<option value='"+val1+"'>"+val+"</option>"));
									return false;
								}
							});
						});


					}

				}});
			});


			// if anywhere in our application happens an ajax error,this function will catch it
			// and show an error message to the user
			$(document).ajaxError(function (e, xhr, settings, exception) {
				$("#error").html("<div class='alert alert-warning'> Uups, an error occurred.</div>");
			});

		});

		</script>

		<script type="text/javascript">


		$(document).ready(function () {

			// if user chooses an option from the select box...
			$("#changelevel").change(function () {
				// get selected value from selectbox with id #department_list
				var level = $(this).val();
				$.ajax({

					url: "levelinfo.php",
					data: "q=" + level,
                    cache: false,
					dataType: "json",

					// if successful
					success: function (response, textStatus, jqXHR) {

						// no questions found -> an empty array was returned from the backend
						if (response.name == null) {
							//$('#checklist').html("<br>Nothing found!");
						}
						else {
							// backend returned an array of names
							var listN = $("#level_name");
							var listP = $("#level_points");
							var cont = -1;
							// remove items from previous searches from the result list
							$('#level_name').empty();
							$('#level_points').empty();

							listN.append($("<input class='add' type='text' name='name' value='"+response.name+"' >"));
							listP.append($("<input class='add' type='text' name='points' value='"+response.points+"' >"));



						}
					}});
				});

				$(document).ajaxError(function (e, xhr, settings, exception) {
					$("#error").html("<div class='alert alert-warning'> Uups, an error occurred.</div>");
				});

			});

			</script>

			<script type="text/javascript">


			$(document).ready(function () {


				$("#categoria").change(function () {

					//  $(document).on('change', 'input[name="preg"]:radio', function(){
					// get selected value from selectbox with id #listpreguntas
					var pregunta = $(this).val();
					var cat = $("#categoria").val();
					var id = $("#id_game").val();

					// backend returned an array of names
					var listV = $("#opv");
					var list1 = $("#opf1");
					var list2 = $("#opf2");
					var list3 = $("#opf3");
					var listP = $("#pre");
					var listPu = $("#puntos");
					var listIm = $("#oldballetex");
					// remove items from previous searches from the result list
					$('#opv').empty();
					$('#opf1').empty();
					$('#opf2').empty();
					$('#opf3').empty();
					$('#pre').empty();
					$('#puntos').empty();

					if(cat == "text_question"){

					listP.append($("<br><p>Preloaded questions:</p> <input type='checkbox' id='myCheck'  onclick='myFunction()' style='margin:0!important;float: right;'><br>"));

					}

					if(cat == "text_question"){

						listP.append($("<br><div class='image-upload'  style='display:none'  id='fileCSV2'><label for='fileCSV'><center><img src='http://group.pressstart.co/trivia/img/gui_botonChososeFile.png'  width='125' height='35'/></center></label><input style='display:none' name='fileCSV' type='file' accept='.csv' id='fileCSV'></div>"));

					}
					if(cat == "video_question" ){


						document.getElementById("blah").style.display = "none";
						//document.getElementById("section4").style.height = "1150px";

					}
					if(cat == "video_question" ){


						document.getElementById("blah2").style.display = "block";
						//document.getElementById("section4").style.height = "1150px";

					}
					if(cat == "image_question" ){


						document.getElementById("blah2").style.display = "none";
						//document.getElementById("section4").style.height = "1150px";

					}
					if(cat == "image_question" ){


						document.getElementById("blah").style.display = "block";
						//document.getElementById("section4").style.height = "1150px";

					}



					if(cat == "image_question" || cat == "video_question"){


						document.getElementById("oldballetex").style.display = "block";
						//document.getElementById("section4").style.height = "1150px";
						var x = document.getElementsByClassName("section2b");
						//document.getElementById("newImage").src = val;
						listP.append($("<p>Question:</p><textarea class='add2' name='pregunta' rows='6' cols='40' required></textarea><br>"));

					}else{

						document.getElementById("oldballetex").style.display = "none";
						var x =document.getElementsByClassName("section2b");
						
						listP.append($("<p id='blokeo' style='display:block'>Question:</p><textarea class='add2' id='blokeo2' style='display:block' name='pregunta' rows='6' cols='40' ></textarea>"));
					}
					if(cat == "video_question"){


						document.getElementById("oldballetex").style.display = "block";
						//document.getElementById("section4").style.height = "1150px";
						//document.getElementById("newImage").src = val;
						listP.append($("<p style='margin-top: 130px;float: initial;'>**Video format must be .mp4</p><br>"));

					}


					if(cat == "true_false"){
						var x =document.getElementsByClassName("section2b");
						
						listV.append($("<p floatleft>Answer 1 (true):</p>"));
					}

					if(cat == "text_question" || cat == "matching_question" || cat == "image_question" || cat == "video_question" || cat == "elimination_question"){
						listV.append($("<p id='blokeo3' style='display:block' >Answer 1 (correct):</p>"));
					}

					if(cat == "sequencing_question"){
						listV.append($("<p>Put the answer in the correct order from 1 to 4:</p><br><br>"));
						listV.append($("<p>Answer 1 :</p>"));
					}

					listV.append($("<input id='blokeo10' style='display:block' class='add' type='text' name='o1' value='' >"));



					if(cat == "true_false"){
						list1.append($("<p>Answer 2 (false):</p>"));
					}
					if(cat == "text_question" || cat == "matching_question" || cat == "image_question" || cat == "video_question" || cat == "elimination_question"){
						list1.append($("<p id='blokeo4' style='display:block' >Answer 2 (incorrect):</p>"));
					}
					if(cat == "sequencing_question"){
						list1.append($("<p>Answer 2 :</p>"));
					}

					list1.append($("<input id='blokeo5' style='display:block' class='add' type='text' name='o2' value='' >"));


					if(cat != "true_false"){
						if(cat == "text_question" || cat == "matching_question" || cat == "image_question" || cat == "video_question" || cat == "elimination_question"){
							list2.append($("<p id='blokeo6' style='display:block' >Answer 3 (incorrect):</p>"));
						}
						if(cat == "sequencing_question"){
							list2.append($("<p>Answer 3 :</p>"));
						}

						list2.append($("<input id='blokeo7' style='display:block' class='add' type='text' name='o3' value='' >"));
					}



					if(cat != "true_false"){
						if(cat == "text_question" || cat == "matching_question" || cat == "image_question" || cat == "video_question" || cat == "elimination_question"){
							list3.append($("<p id='blokeo8' style='display:block' >Answer 4 (incorrect):</p>"));
						}
						if(cat == "sequencing_question"){
							list3.append($("<p>Answer 4 :</p>"));
						}
						list3.append($("<input id='blokeo9' style='display:block' class='add' type='text' name='o4' value='' >"));
					}



					listPu.append($("<p id='blokeo12' style='display:block'>Points:</p>"));
					listPu.append($("<input id='blokeo11' style='display:block' class='add' type='text' name='puntos' value='' >"));
					list3.append($("<input type='hidden' name='id_game' value='"+id+"'>"));
					list3.append($("<input type='hidden' name='cat' value='"+cat+"'>"));

					var x = document.getElementById("boton_sub");
					x.style.display = "block";

				});

			});

			</script>

		<script>

		var modal = document.getElementById('myModal');

		$( "#myBtn" ).on( "click", function() {

			$( "#myModal" ).css("display","block");

		});

		$( "#modalClose" ).on( "click", function() {
			 //modal.style.display = "none";
		});

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				//modal.style.display = "none";
			}
		}


		$('#reused_form').submit(function(e)
	      {
					$( "#myModal" ).css("display","block");

					/*
	        e.preventDefault();


	        $form = $(this);


					//alert("Cargando video");
					$( "#myModal" ).css("display","block");

	        $(document).ready(function () {

	        var urlF = "testaddall.php";
	        var form = $('form').get(0);

	        var formF;

	        formF = new FormData(form);



	        $.ajax({
	                url: urlF,
	                type: "POST",
	                data : formF,
	                dataType: "json",
	                processData: false,
	                contentType: false,
	                cache: false,
	                // if successful
	                success: function (response, textStatus, jqXHR) {

	                    // no questions found -> an empty array was returned from the backend
	                    if (response == null) {
	                      alert("error");
	                    }
	                    else {

	                        $.each(response, function(i, field) {

	                            var id = field.id;
															var texto = field.texto;
															var url = "games.php?t='"+texto+"'";
	                             if(id>0){

	                               window.open (url,'_self',false)
	                              // $('#success_message').append('<button class="btn btn-lg btn-success btn-block" id="ok" required>¡OK!</button>');
	                             }else{

																 window.open (url,'_self',false)

	                             }

	                        });

	                    }
	                }});

	                $(document).ajaxError(function (e, jqXHR, settings, exception) {
	              		alert("error"+jqXHR.status);
	             		});

	              });
								*/


	      });

		</script>

		<script>

$(document).ready(function () {
            $("#hora").timepicker({
timeFormat: 'H:i:s',
    interval: 10,
    minTime: '00:00',
    maxTime: '24:00',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    scrollbar: true,
    dropdown: true,
            	});
        });

    (function($){
        $(window).on("load",function(){
            $(".ui-timepicker-selected").mCustomScrollbar();
        });
    })(jQuery);


		  $(function() {
		    $( "#datepicker" ).datepicker({
	   				minDate: 1
	   			});

		  });



$('#true_false').on('change', function() {
  $('#blah').css('display', 'none');
});






var select = document.getElementById('id_game'),
onChange = function(event) {
    var shown = this.options[this.selectedIndex].value > 0;

    document.getElementById('hidden_div').style.display = shown ? 'block' : 'none';
};

// attach event handler
if (window.addEventListener) {
    select.addEventListener('change', onChange, false);
} else {
    // of course, IE < 9 needs special treatment
    select.attachEvent('onchange', function() {
        onChange.apply(select, arguments);
    });
}


var select = document.getElementById('id_game'),
onChange = function(event) {
    var shown = this.options[this.selectedIndex].value > 0;

    document.getElementById('hidden_div2').style.display = shown ? 'block' : 'none';
};

// attach event handler
if (window.addEventListener) {
    select.addEventListener('change', onChange, false);
} else {
    // of course, IE < 9 needs special treatment
    select.attachEvent('onchange', function() {
        onChange.apply(select, arguments);
    });
}



var select = document.getElementById('categoria'),
onChange = function(event) {
    var shown = this.options[this.selectedIndex].value == '';

    document.getElementById('hidden_div3').style.display = shown ? 'none' : 'block';
};

// attach event handler
if (window.addEventListener) {
    select.addEventListener('change', onChange, false);
} else {
    // of course, IE < 9 needs special treatment
    select.attachEvent('onchange', function() {
        onChange.apply(select, arguments);
    });
}

/*
var select = document.getElementById('connection_type'),
onChange = function(event) {
    var shown = this.options[this.selectedIndex].value == 0;

    document.getElementById('diffi1').style.display = shown ? 'none' : 'block';
    document.getElementById('diffi2').style.display = shown ? 'none' : 'block';
    document.getElementById('diffi3').style.display = shown ? 'none' : 'block';
    document.getElementById('diffi4').style.display = shown ? 'none' : 'block';
};

var select = document.getElementById('connection_type'),
onChange = function(event) {
    var shown = this.options[this.selectedIndex].value == 0;

    document.getElementById('diffi1').style.display = shown ? 'block' : 'none';
};

document.getElementById('connection_type').addEventListener('change', function () {
    var style = this.value == 0 ? 'block' : 'none';
    document.getElementById('diffi1').style.display = style;
});*/

function nuevoym(select){
   if(select.value==1){
    document.getElementById('diffi1').style.display = "block";
    document.getElementById('diffi4').style.display = "block";
    document.getElementById('offlineview').style.display = "none";
    document.getElementById('onlineview').style.display = "block";
   } else{
    document.getElementById('diffi1').style.display = "none";
    document.getElementById('diffi4').style.display = "none";
    document.getElementById('offlineview').style.display = "block";
    document.getElementById('onlineview').style.display = "none";
   }
} 

/*var select = document.getElementById('connection_type'),
onChange = function(event) {
    var shown = this.options[this.selectedIndex].value == 0;

    document.getElementById('diffi2').style.display = shown ? 'none' : 'block';
};

var select = document.getElementById('connection_type'),
onChange = function(event) {
    var shown = this.options[this.selectedIndex].value == 0;

    document.getElementById('diffi3').style.display = shown ? 'none' : 'block';
};

var select = document.getElementById('connection_type'),
onChange = function(event) {
    var shown = this.options[this.selectedIndex].value == 0;

    document.getElementById('diffi4').style.display = shown ? 'none' : 'block';
};*/


// attach event handler
if (window.addEventListener) {
    select.addEventListener('change', onChange, false);
} else {
    // of course, IE < 9 needs special treatment
    select.attachEvent('onchange', function() {
        onChange.apply(select, arguments);
    });
}





function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("fileCSV");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }

var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("fileCSV2");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }


    var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }

    var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo2");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }

    var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo3");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }



 var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo4");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }


 var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo5");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }


 var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo6");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }


 var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo7");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }


 var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo8");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }


 var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo9");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }

var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo10");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo11");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo12");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo13");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo14");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("blokeo15");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "none";
  } else {
    text.style.display = "block";
  }
}



		  </script>


			</html>
<?php include 'verificar.php'; ?>
