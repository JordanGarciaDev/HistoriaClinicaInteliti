<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>Editar Usuario</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>

      </li>

      <li class="active">

        <strong>Editar Usuario</strong>

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

        <h5>Editar <small></small></h5>

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



<!-- First_name Start -->

<div class="form-group">

  <label for="first_name" class="col-sm-3 control-label"> Nombre </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="first_name" name="first_name" 

    

    value="<?php echo set_value("first_name",html_entity_decode($user->first_name)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("first_name","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- First_name End -->



<!-- last_name Start -->

<div class="form-group">

  <label for="last_name" class="col-sm-3 control-label"> Apellidos</label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="last_name" name="last_name" 

    

    value="<?php echo set_value("last_name",html_entity_decode($user->last_name)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("last_name","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- last_name End -->



<!-- company Start -->

<div class="form-group">

  <label for="company" class="col-sm-3 control-label"> Empresa </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="company" name="company" 

    

    value="<?php echo set_value("last_name",html_entity_decode($user->company)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("company","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- company End -->



    <!-- Correo Start -->

    <div class="form-group">

        <label for="company" class="col-sm-3 control-label"> Correo </label>

        <div class="col-sm-4">

            <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value("email",html_entity_decode($user->email)); ?>">

        </div>

        <div class="col-sm-5" >


            <?php echo form_error("company","<span class='label label-danger'>","</span>")?>

        </div>

    </div>

    <!-- Correo End -->



    <!-- phone Start -->

<div class="form-group">

  <label for="phone" class="col-sm-3 control-label"> Celular </label>

  <div class="col-sm-4">

    <input type="text" class="form-control" id="phone" name="phone"

    value="<?php echo set_value("phone",html_entity_decode($user->phone)); ?>"

    >

  </div>

  <div class="col-sm-5" >

 

    <?php echo form_error("phone","<span class='label label-danger'>","</span>")?>

  </div>

</div> 

<!-- phone End -->

  


  <!-- password Start -->

  <div class="form-group">
Contraseña: (si cambia la contraseña)
    <label for="password" class="col-sm-3 control-label"> Contraseña </label>

    <div class="col-sm-4">

      <input type="password" class="form-control" id="password" name="password" 

      value="<?php echo set_value("password"); ?>"

      >

    </div>

    <div class="col-sm-5" >

   

      <?php echo form_error("password","<span class='label label-danger'>","</span>")?>

    </div>

  </div> 

  <!-- password End -->

   <!-- password_confirm Start -->

  <div class="form-group">
Confirmar Contraseña: (si cambia la contraseña)
    <label for="password_confirm" class="col-sm-3 control-label"> Confirmar contraseña </label>

    <div class="col-sm-4">

      <input type="password" class="form-control" id="password_confirm" name="password_confirm" 


      value="<?php echo set_value("password_confirm"); ?>"

      >

    </div>

    <div class="col-sm-5" >

   

      <?php echo form_error("password_confirm","<span class='label label-danger'>","</span>")?>

    </div>

  </div> 

  <!-- password_confirm End -->




      <?php if ($this->ion_auth->is_admin()): ?>

          <div class="form-group"><label class="col-sm-3 control-label"><h3><?php echo lang('edit_user_groups_heading');?></h3></label></div>

          <?php foreach ($groups as $group):?>
              <div class="form-group">
              <label class="col-sm-3 control-label">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
            </div>
          <?php endforeach?>



      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>


  <div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">


                  <button type="submit" class="btn btn-info ">Actualizar</button>

                </div>

                <div class="col-sm-3" >                       

                </div>

              </div>


 </div>

            <!-- /.box-body -->

            <div class="box-footer">

            </div>
  </form>
        <!-- /.box -->

        <br><br><br><br>

      </div>

      <!-- EO : content  -->

      <!-- ...................................................................... -->

    </div>

  </div>

</div>






<?php $this->load->view('footer'); ?>