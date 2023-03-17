<?php $this->load->view('header'); ?>
<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

  <div class="col-sm-4">

    <h2>Group</h2>

    <ol class="breadcrumb">

      <li>

        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>

      </li>

      <li class="active">

        <strong>Group</strong>

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

        <h5>Add Group<small></small></h5>

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








<?php //echo form_open("auth/create_group");?>


	<!-- group_name Start -->

	<div class="form-group">

	  <label for="group_name" class="col-sm-3 control-label"> group_name </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="group_name" name="group_name" 

	    

	    value="<?php echo set_value("group_name"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("group_name","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 


	<!-- description Start -->

	<div class="form-group">

	  <label for="description" class="col-sm-3 control-label"> description </label>

	  <div class="col-sm-4">

	    <input type="text" class="form-control" id="description" name="description" 

	    

	    value="<?php echo set_value("description"); ?>"

	    >

	  </div>

	  <div class="col-sm-5" >

	 

	    <?php echo form_error("description","<span class='label label-danger'>","</span>")?>

	  </div>

	</div> 








<div class="form-group">

                <div class="col-sm-3" >                       

                </div>

                <div class="col-sm-6">

                  <button type="reset" class="btn btn-default ">Reset</button>

                  <button type="submit" class="btn btn-info ">Create Group</button>

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