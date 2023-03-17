<?php $this->load->view('header'); ?>
<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>Cambiar Contraseña</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">Inicio</a>

      </li>

      <li class="active">

        <strong>Cambiar Contraseña</strong>

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

        <h5>Cambiar <small></small></h5>

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


<div class="box-body">

              <?php if($this->session->flashdata('message')): ?>

              <div class="alert alert-success">

                <button type="button" class="close" data-close="alert"></button>

                <?php echo $this->session->flashdata('message'); ?>

              </div>

              <?php endif; ?> 







          <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">




  <!-- old_password Start -->

  <div class="form-group">

    <label for="old_password" class="col-sm-3 control-label"> Antigua Contraseña</label>

    <div class="col-sm-4">

      <input type="password" class="form-control" id="old" name="old" 

      

      value="<?php echo set_value("old"); ?>"

      >

    </div>

    <div class="col-sm-5" >

   

      <?php echo form_error("old_password","<span class='label label-danger'>","</span>")?>

    </div>

  </div> 

  <!-- old_password End -->




  <!-- old_password Start -->

  <div class="form-group">

    <label for="new_password" class="col-sm-3 control-label"> Nueva Contraseña</label>

    <div class="col-sm-4">

      <input type="password" class="form-control" id="new" name="new" 

      

      value="<?php echo set_value("new"); ?>"

      >

    </div>

    <div class="col-sm-5" >

   

      <?php echo form_error("new_password","<span class='label label-danger'>","</span>")?>

    </div>

  </div> 

  <!-- old_password End -->




  <!-- old_password Start -->

  <div class="form-group">

    <label for="new_password_confirm" class="col-sm-3 control-label"> Confirmar Contraseña</label>

    <div class="col-sm-4">

      <input type="password" class="form-control" id="new_confirm" name="new_confirm" 

      

      value="<?php echo set_value("new_confirm"); ?>"

      >

    </div>

    <div class="col-sm-5" >

   

      <?php echo form_error("new_password_confirm","<span class='label label-danger'>","</span>")?>

    </div>

  </div> 

  <!-- old_password End -->


      <?php echo form_input($user_id);?>


                        <div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">

                  <button type="reset" class="btn btn-default ">Limpiar</button>

                  <button type="submit" class="btn btn-info ">Guardar</button>

                </div>

                <div class="col-sm-3" >                       

                </div>

              </div>




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