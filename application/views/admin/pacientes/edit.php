<?php $this->load->view('header'); ?>

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

  <div class="wrapper wrapper-content animated fadeInRight">

    <div class="ibox ">

      <div class="ibox-title" >

       <h5> Editar <small></small></h5>

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


                <!-- identificacion Start -->

                <div class="form-group">

                    <label for="nombre" class="col-sm-3 control-label"> Identificación </label>

                    <div class="col-sm-4">

                        <input type="number" class="form-control" id="identificacion" name="identificacion" value="<?php echo set_value("identificacion"); ?>" >

                    </div>

                    <div class="col-sm-5" >

                        <?php echo form_error("identificacion","<span class='label label-danger'>","</span>")?>

                    </div>

                </div>

                <!-- identificacion End -->

   <!-- Nombre Start -->

                <div class="form-group">

                    <label for="nombre" class="col-sm-3 control-label"> Nombres </label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value("nombre"); ?>" >

                    </div>

                    <div class="col-sm-5" >

                        <?php echo form_error("nombre","<span class='label label-danger'>","</span>")?>

                    </div>

                </div>

                <!-- Nombre End -->



                <!-- Apellido Start -->

                <div class="form-group">

                    <label for="apellido" class="col-sm-3 control-label"> Apellidos </label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control" id="apellido" name="apellido"  value="<?php echo set_value("apellido"); ?>">

                    </div>

                    <div class="col-sm-5" >



                        <?php echo form_error("apellido","<span class='label label-danger'>","</span>")?>

                    </div>

                </div>

                <!-- Apellido End -->



                <!-- Sexo Start -->

                <div class="form-group">

                    <label for="sexo" class="col-sm-3 control-label"> Sexo </label>

                    <div class="col-sm-4">

                        <select class="form-control select2 disabled" name="sexo" id="sexo">

                            <option value="">Seleccione---</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>

                        </select>

                    </div>

                    <div class="col-sm-5" >

                        <?php echo form_error("sexo","<span class='label label-danger'>","</span>")?>

                    </div>

                </div>

                <!-- Sexo End -->



                <!-- fNacim Start -->

                <div class="form-group">

                    <label for="fNacim" class="col-sm-3 control-label"> Fecha de Nacimiento </label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control datetimepicker" id="fNacim"  name="fNacim" value="<?php echo date("d-m-Y H:i:s"); ?>"/>

                    </div>

                    <div class="col-sm-5" >

                        <?php echo form_error("fNacim","<span class='label label-danger'>","</span>")?>

                    </div>

                </div>

                <!-- fNacim End -->


                <!-- Estatura Start -->

                <div class="form-group">

                    <label for="nombre" class="col-sm-3 control-label"> Estatura </label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control" id="estatura" name="estatura" value="<?php echo set_value("estatura"); ?>" >

                    </div>

                    <div class="col-sm-5" >

                        <?php echo form_error("estatura","<span class='label label-danger'>","</span>")?>

                    </div>

                </div>

                <!-- Estatura End -->


                <!-- Peso Start -->

                <div class="form-group">

                    <label for="peso" class="col-sm-3 control-label"> Peso </label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control" id="peso" name="peso" value="<?php echo set_value("peso"); ?>" >

                    </div>

                    <div class="col-sm-5" >

                        <?php echo form_error("peso","<span class='label label-danger'>","</span>")?>

                    </div>

                </div>

                <!-- Peso End -->
	

              <div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">

                  <!-- <button type="reset" class="btn btn-default ">Limpiar</button> -->

                  <button type="submit" class="btn btn-info ">Guardar</button>

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

<?php $this->load->view('footer'); 