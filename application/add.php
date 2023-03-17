<?php $this->load->view('header'); ?>
<!--  BO :heading -->



<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>Documentos</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>

      </li>

      <li class="active">

        <strong>Documentos</strong>

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

  <div class="wrapper wrapper-content animated fadeInRight">

    <div class="ibox ">

      <div class="ibox-title" >

        <h5>Agregar <small></small></h5>

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


          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="box-body">

              <?php if($this->session->flashdata('message')): ?>

              <div class="alert alert-success">

                <button type="button" class="close" data-close="alert"></button>

                <?php echo $this->session->flashdata('message'); ?>

              </div>

              <?php endif; ?> 

              




	<!-- Tipo_de_usuario Start -->

	<div class="form-group">










        <label class="control-label col-md-3"> tipo de prestador </label>

          <div class="col-md-4">

              <!--<select class="form-control select2" name="tipo_de_usuario" id="tipo_de_usuario">

              <option value="">Select Tipo_de_usuario</option>

      <?php 

      if(isset($tipos_de_prestador) && !empty($tipos_de_prestador)):

      foreach($tipos_de_prestador as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->nombre_tipo_prestador; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>-->

      <select class="form-control select2" name="tipo_de_usuario" id="tipo_de_usuario">
    <option value="">selecciona el tipo de prestador</option>
    <?php
    if(!empty($countries)){
        foreach($countries as $row){ 
            echo '<option value="'.$row['id'].'">'.$row['nombre_tipo_prestador'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>

        </div>

        <div class="col-sm-5" >

      <?php echo form_error("tipo_de_usuario","<span class='label label-danger'>","</span>")?>

      </div>
    </div>

      <!-- Tipo_de_usuario End -->







	<!-- Prestador_asignado Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Prestadores </label>

          <div class="col-md-4">

              <!--<select class="form-control select2" name="prestador_asignado" id="prestador_asignado">

              <option value="">Select Prestador_asignado</option>

      <?php 

      if(isset($prestadores) && !empty($prestadores)):

      foreach($prestadores as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->documento_iberosam . " | " . $value->nombre_prestador; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>-->










      <select class="form-control select2" name="prestador_asignado" id="prestador_asignado">
    <option value="">selecciona el tipo de prestador primero</option>
</select>











        </div>


        <div class="col-sm-5" >

      <?php echo form_error("prestador_asignado","<span class='label label-danger'>","</span>")?>

      </div>
    </div>

      <!-- Prestador_asignado End -->







	<!-- Tipo_de_docuemento Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Tipo de docuemento </label>

          <div class="col-md-4">

              <!--<select class="form-control select2" name="tipo_de_docuemento" id="tipo_de_docuemento">

              <option value="">Select Tipo_de_docuemento</option>

      <?php 

      if(isset($tipo_de_documento) && !empty($tipo_de_documento)):

      foreach($tipo_de_documento as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->nombre_tipos_de_documento; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>-->


<!-- State dropdown -->


<!-- City dropdown -->
<select class="form-control select2" name="tipo_de_docuemento"  id="tipo_de_docuemento">
    <option value="">selecciona el tipo de prestador primero</option>
</select>

        </div>



        <div class="col-sm-5" >

      <?php echo form_error("tipo_de_docuemento","<span class='label label-danger'>","</span>")?>

      </div>

    </div>

      <!-- Tipo_de_docuemento End -->







    <!-- Docuemento_adjunto Start -->

    <div class="form-group">

      <label for="address" class="col-sm-3 control-label"> Docuemento adjunto </label>

      <div class="col-sm-4">

      <input type="file" name="docuemento_adjunto" />

      <input type="hidden" name="old_docuemento_adjunto" value="<?php if (isset($docuemento_adjunto) && $docuemento_adjunto!=""){echo $docuemento_adjunto; } ?>" />

        <?php if(isset($docuemento_adjunto_err) && !empty($docuemento_adjunto_err)) 

        { foreach($docuemento_adjunto_err as $key => $error)

        { echo "<div class=\"error-msg\"></div>"; } }?>

      </div>

        <div class="col-sm-5" >


      </div>

    </div>

    <!-- Docuemento_adjunto End -->



    

<?php 

$fechaactual = date("d-m-Y");

$fechavencimiento = date("d-m-Y");





 ?>


	<!-- Fecha Start -->

	<div class="form-group"  id="fecha-aparece" >

	  <label for="fecha" class="col-sm-3 control-label"> Fecha </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control span2 datepicker" id="fecha" name="fecha" value="<?php echo $fechaactual; ?>"	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("fecha","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Fecha End -->



	



	<!-- Fecha_de_vencimiento Start -->

	<div class="form-group"  style="display:none"> 

	  <label for="fecha_de_vencimiento" class="col-sm-3 control-label"> Fecha_de_vencimiento </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control span2 datepicker" id="fecha_de_vencimiento" name="fecha_de_vencimiento" value="<?php  echo $fechavencimiento; ?>"	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("fecha_de_vencimiento","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Fecha_de_vencimiento End -->



	



	<!-- Fecha_de_expedicion Start -->

	<div class="form-group" id="fecha-de-expedicion-aparece" style="display:none">

	  <label for="fecha_de_expedicion" class="col-sm-3 control-label"> Fecha_de_expedicion </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control span2 datepicker" id="fecha_de_expedicion" name="fecha_de_expedicion" value="<?php


       echo $fechaactual;






        ?>"	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("fecha_de_expedicion","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Fecha_de_expedicion End -->



	



	<!-- Responsable_del_docuemento Start -->

	<div class="form-group">

        <label class="control-label col-md-3"> Responsable del docuemento </label>

          <div class="col-md-4">

              <select class="form-control select2" name="responsable_del_docuemento" id="responsable_del_docuemento">

              <option value="">Select Responsable_del_docuemento</option>

      <?php 

      if(isset($users) && !empty($users)):

      foreach($users as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->first_name; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

        <div class="col-sm-5" >

      <?php echo form_error("responsable_del_docuemento","<span class='label label-danger'>","</span>")?>

      </div>
    </div>

      <!-- Responsable_del_docuemento End -->







				<!-- Observaciones Start -->

			<div class="form-group">

			  <label for="observaciones" class="col-sm-3 control-label"> Observaciones </label>

			  <div class="col-sm-4">

			    <textarea class="form-control" id="observaciones" name="observaciones"><?php echo set_value("observaciones"); ?></textarea>

			  </div>

			  <div class="col-sm-5" >

			 

			    <?php echo form_error("observaciones","<span class='label label-danger'>","</span>")?>

			  </div>

			</div> 

			<!-- Observaciones End -->



			



	<!-- Estado Start -->

	<div class="form-group hidden">

        <label class="control-label col-md-3"> Estado </label>

          <div class="col-md-4">

              <select class="form-control select2" name="estado" id="estado">

              <option value="1">Vigente</option>

      <?php 

      if(isset($estados_documentos) && !empty($estados_documentos)):

      foreach($estados_documentos as $key => $value): ?>

          <option value="<?php echo $value->id; ?>">

            <?php echo $value->nombre_estado; ?>

          </option>

      <?php endforeach; ?>

      <?php endif; ?>

      </select>

        </div>

    </div>

      <!-- Estado End -->









	<!-- Creador_del_documento Start -->

	<div class="form-group hidden">

	  <label for="creador_del_documento" class="col-sm-3 control-label"> Creador_del_documento </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="creador_del_documento" name="creador_del_documento" 

	    <?php $user = $this->ion_auth->user()->row();
         ?>

	    value="<?php echo $user->id; ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("creador_del_documento","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 

	<!-- Creador_del_documento End -->





	

              <div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">

                  <button type="reset" class="btn btn-default ">Reset</button>

                  <button type="submit" class="btn btn-info ">Submit</button>

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

<script type="text/javascript">
$("#tipo_de_docuemento").change(function() {
  if ($(this).val() == "13") {
    $('#fecha-aparece').show();
  } else {
    $('#fecha-aparece').hide();
  }
});
$("#tipo_de_docuemento").trigger("change");
/*$('#tipo_de_docuemento').on('change', function() {
  $('#fecha-aparece').css('display', 'none');
  if ( $(this).val() === '12' ) {
    $('#fecha-aparece').css('display', 'block');
  }
});*/
/*$('#tipo_de_docuemento').on('change', function() {
  $('#fecha-de-expedicion-aparece').css('display', 'none');
  if ( $(this).val() === '13' ) {
    $('#fecha-de-expedicion-aparece').css('display', 'block');
  }
});*/

/*$(function () {
  //start off by hiding it
$("#fecha-aparece").hide();
  
  // when the Change EVENT fires - 
$('#tipo_de_docuemento').change(function (event)
                                   
 {  
    if($(this).val() == "13")
        $("#fecha-aparece").show();
    else
         $("#fecha-aparece").hide();
  });
});*/




</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    /* Populate data to state dropdown */
    $('#tipo_de_usuario').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?php echo 'https://honesolutions.Inteliti.com/dropdowns/getStates'; ?>',
                data:'tipo_de_prestador='+countryID,
                success:function(data){
                    $('#prestador_asignado').html('<option value="">selecciona el tipo de prestador</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            //option.attr('value', this.tipo_de_prestador).text(this.documento_iberosam+" | " +this.nombre_prestador);
                            option.attr('value', this.id).text(this.documento_iberosam+" | " +this.nombre_prestador);           
                            $('#prestador_asignado').append(option);
                        });
                    }else{
                        $('#prestador_asignado').html('<option value="">Tipo de prestador no valido</option>');
                    }
                }
            }); 
        }else{
            $('#prestador_asignado').html('<option value="">selecciona el tipo de prestador primero</option>');
            $('#tipo_de_docuemento').html('<option value="">selecciona el tipo de prestador primero</option>'); 
        }
    });
    
    /* Populate data to city dropdown */
    $('#tipo_de_usuario').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo 'https://honesolutions.Inteliti.com/dropdowns/getCities'; ?>',
                data:'id_tipo_de_prestador='+stateID,
                success:function(data){
                    $('#tipo_de_docuemento').html('<option value="">selecciona el tipo de documento</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('tipo_de_docuemento', this.id_tipo_de_prestador).text(this.id_tipo_de_documento+" | " +this.nombre_tipo_de_documento);           
                            $('#tipo_de_docuemento').append(option);
                        });
                    }else{
                        $('#tipo_de_docuemento').html('<option value="">City not available</option>');
                    }
                }
            }); 
        }else{
            $('#tipo_de_docuemento').html('<option value="">selecciona el tipo de prestador primero</option>'); 
        }
    });
});
</script>





<?php $this->load->view('footer'); ?>