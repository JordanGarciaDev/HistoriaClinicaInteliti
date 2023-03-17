<?php $this->load->view('header');

function calcular_edad($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}

$edad = calcular_edad($pacientes->fNacim);
$sexo = '';

if($pacientes->sexo == 'M'){
    $sexo = "un";
}else{
    $sexo = "una";

}

if($pacientes->peso >= 30){
    $comer = "más";
}else{
    $comer = "menos";
}


function fibonacci($n)
{
    $fibonacci  = [0,1];

    for($i=2;$i<=$n;$i++)
    {
        $fibonacci[] = $fibonacci[$i-1]+$fibonacci[$i-2];
    }
    return $fibonacci[$n];
}

function kilometros($n)
{
    $fechaComoEntero = strtotime($n);
    $anio = date("y", $fechaComoEntero);
    $raiz = sqrt($anio);
    $km = round($raiz,2);
    return $km;
}

$horas = fibonacci($pacientes->estatura);
$correr = kilometros($pacientes->fNacim);


?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-sm-4">

      <h2>Pacientes</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>

         </li>

         <li class="active">

            <strong>Pacientes</strong>

         </li>

      </ol>

   </div>

   <div class="col-sm-8">

      <div class="title-action">

      </div>

   </div>

</div>

<!--  EO :heading -->

<div class="row">

   <div class="col-lg-12 row wrapper ">

      <div class="ibox ">

         <div class="ibox-title" >

            <h5>Detalles del Paciente <small></small></h5>

            <div class="ibox-tools">                           

            </div>

         </div>

         <!-- ............................................................. -->

         <!-- BO : content  -->

         <div class="col-sm-12 white-bg ">

            <div class="box box-info">

               <div class="box-header with-border">

                  <h3 class="box-title">  </h3>

               </div>

               <!-- /.box-header -->

               <!-- form start -->

               <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

                  <div class="box-body">

                     <?php if($this->session->flashdata('message')): ?>

                     <div class="alert alert-success">

                        <button type="button" class="close" data-close="alert"></button>

                        <?php echo $this->session->flashdata('message'); ?>

                     </div>

                     <?php endif; ?> 

                     

<table class='table table-bordered' style='width:70%;' align='center'>

	<tr>

	 <td>

	   <label for="correo" class="col-sm-3 control-label"> Identificacion: </label>

	 </td>

	 <td> 

	   <?php echo set_value("nombres",html_entity_decode($pacientes->identificacion)); ?>

	 </td>

	</tr>
	<tr>

	 <td>

	   <label for="correo" class="col-sm-3 control-label"> Nombres: </label>

	 </td>

	 <td>

	   <?php echo set_value("nombres",html_entity_decode($pacientes->nombres)); ?>

	 </td>

	</tr>


	<tr>

	 <td>

	   <label for="apellidos" class="col-sm-3 control-label"> Apellido </label>

	 </td>

	 <td> 

	   <?php echo set_value("apellidos",html_entity_decode($pacientes->apellidos)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="sexo" class="col-sm-3 control-label"> Sexo </label>

	 </td>

	 <td>

         <?php if ($pacientes->sexo == "M") {
             echo "Masculino";
         } else {
             echo "Femenino";
         } ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="estatura" class="col-sm-3 control-label"> Estatura </label>

	 </td>

	 <td> 

	   <?php echo set_value("sexo",html_entity_decode($pacientes->estatura)); ?>

	 </td>

	</tr>



	<tr>

	 <td>

	   <label for="peso" class="col-sm-3 control-label"> Peso </label>

	 </td>

	 <td>

	   <?php echo set_value("peso",html_entity_decode($pacientes->peso)); ?>

	 </td>

	</tr>

    <!-- fNacim Start -->

	<tr>

	 <td>

	  <label for="fNacim" class="col-sm-3 control-label"> F.Nacimiento </label>

	 </td>

	 <td> 

	   <?php echo set_value("fNacim", html_entity_decode($pacientes->fNacim)); ?>

	 </td>

	</tr>

    <!-- fNacim End -->


 <!-- Recomendación Start -->

	<tr>

	 <td>

	  <label for="fNacim" class="col-sm-3 control-label"> Recomendación: </label>

	 </td>

	 <td style="color: #fff; background-color: #00c783;">

	   <?php

       if($edad < 18){
           echo "Hola ".html_entity_decode($pacientes->nombres).", eres $sexo joven muy saludable, te recomiendo comer $comer y salir a jugar al aire libre durante $horas horas diarias.";
       }
       else{
           echo "Hola ".html_entity_decode($pacientes->nombres).", eres $sexo persona muy saludable, te recomiendo comer $comer y salir a correr $correr km diarios.";
       }
       ?>

	 </td>

	</tr>

    <!-- Recomendación End -->



	<tr><td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">Volver</a></td></tr></table>

                     <div class="form-group">

                        <div class="col-sm-3" >                       

                        </div>

                        <div class="col-sm-6">

                        </div>

                        <div class="col-sm-3" >                       

                        </div>

                     </div>

                  </div>

                  <!-- /.box-body -->

                  <div class="box-footer">

                  </div>

                  <!-- /.box-footer -->

               </form>

            </div>

            <!-- /.box -->

            <br><br><br><br>

         </div>

         <!-- EO : content  -->

         <!-- ...................................................................... -->

      </div>

   </div>

</div>

<?php $this->load->view('footer'); ?>