<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-lg-10">

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

   <div class="col-lg-2">

   </div>

</div>

<div class="row">

   <div class="col-lg-12">

      <div class="ibox ">

         <br>

         <div class="ibox-title">

            <?php if($this->session->flashdata('message')): ?>

            <div class="alert alert-success">

               <button type="button" class="close" data-close="alert"></button>

               <?php echo $this->session->flashdata('message'); ?>

            </div>

            <?php endif; ?>

            <a href="<?php echo base_url(); ?>admin/pacientes/add" class="btn btn-info">AGREGAR USUARIO</a>

            <div class="form-group pull-right">

               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>

               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>

            </div>

            <form method="GET" action="<?php echo base_url().'admin/pacientes/index'; ?>" class="form-inline ibox-content">

               <div class="form-group">

                  <select name="searchBy" class="form-control">

                  <option value="identificacion" <?php echo $searchBy=="identificacion"?'selected="selected"':""; ?>>identificacion</option>
                      <option value="sexo" <?php echo $searchBy=="sexo"?'selected="selected"':""; ?>>sexo</option>
                      <option value="nombres" <?php echo $searchBy=="nombres"?'selected="selected"':""; ?>>Nombre</option>
                      <option value="apellidos" <?php echo $searchBy=="apellidos"?'selected="selected"':""; ?>>Apellidos</option>
                      <option value="sexo" <?php echo $searchBy=="sexo"?'selected="selected"':""; ?>>Sexo</option>
                      <option value="fNacim" <?php echo $searchBy=="fNacim"?'selected="selected"':""; ?>>fNacim</option>

                  </select>

               </div>

               <div class="form-group">

                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">

               </div>

               <input type="submit" name="search" value="Buscar" class="btn btn-info">

               <div class="form-group pull-right">

                  <select name="per_page" class="form-control" onchange="this.form.submit()">

                     <option value="5" <?php echo $per_page=="5"?'selected="selected"':""; ?>>5</option>

                     <option value="10" <?php echo $per_page=="10"?'selected="selected"':""; ?>>10</option>

                     <option value="20" <?php echo $per_page=="20"?'selected="selected"':""; ?>>20</option>

                     <option value="50" <?php echo $per_page=="50"?'selected="selected"':""; ?>>50</option>

                     <option value="100" <?php echo $per_page=="100"?'selected="selected"':""; ?>>100</option>

                  </select>

               </div>

            </form>

         </div>

         <div class="ibox-content">

         <div class="table table-responsive">

            <table class="table table-striped table-bordered table-hover Tax" >

               <thead>

                  <tr>

                     <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th>

                     <th> No. </th>

                     <?php $sortSym=isset($_GET["order"]) && $_GET["order"]=="asc" ? "up" : "down"; ?>

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="identificacion"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["identificacion"]; ?>" class="link_css"> Identificación <?php echo $symbol ?></a></th>



				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="nombres"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["nombres"]; ?>" class="link_css"> Nombres <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="apellidos"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["apellidos"]; ?>" class="link_css"> Apellidos <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="sexo"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["sexo"]; ?>" class="link_css"> Sexo <?php echo $symbol ?></a></th>


                <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="estatura"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["estatura"]; ?>" class="link_css"> Estatura <?php echo $symbol ?></a></th>


                <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="peso"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["peso"]; ?>" class="link_css"> Peso <?php echo $symbol ?></a></th>



				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="fNacim"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["fNacim"]; ?>" class="link_css"> Fecha de Nacimiento <?php echo $symbol ?></a></th>


                     <th> Acciones </th>

                  </tr>

               </thead>

               <tbody>

                  <?php if(isset($results) and !empty($results))

                     {


                       $count=1;

                       ?>

                  <?php 

                     foreach ($results as $key => $value) {


                      ?>

                  <tr  id="hide<?php echo $value->id; ?>" >

                  <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->id; ?>'/></th>


            <th><?php if(!empty($value->identificacion)){ echo $count; $count++; }?></th>

                <th><?php if(!empty($value->identificacion)){ echo $value->identificacion; }?></th>

                <th><?php if(!empty($value->nombres)){ echo $value->nombres; }?></th>

                <th><?php if(!empty($value->apellidos)){ echo $value->apellidos; }?></th>

                <th><?php if(!empty($value->sexo)){ echo $value->sexo; }?></th>

                <th><?php if(!empty($value->estatura)){ echo $value->estatura; }?></th>

                <th><?php if(!empty($value->peso)){ echo $value->peso; }?></th>

                <th><?php if(!empty($value->fNacim)){ echo $value->fNacim; }?></th>

                <th class="action-width">

		   <a href="<?php echo base_url()?>admin/pacientes/view/<?php echo $value->id; ?>" title="Ver recomendación">

            <span class="btn btn-info " style="background-color: #00c783 !important;"><i class="fa fa-eye"></i></span>

           </a>

           <a href="<?php echo base_url()?>admin/pacientes/edit/<?php echo $value->id; ?>" title="Editar">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Eliminar" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','pacientes');">

           <span class="btn btn-info " ><i class="fa fa-trash-o "></i></span>

           </a>

            </th>

                  </tr>

                  <?php 

                     }
                     

                     } else{

                     echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No hay registros!</center</td></tr>';

                     } ?>  

               </tbody>

            </table>

            </div>

            <?php echo $links; ?>

         </div>

      </div>

      <img onclick="callme('','item','')" src="<?php echo $this->config->item('accet_url')?>/img/mac-trashcan_full-new.png" id="recycle" style="width:90px;  display:none; position:fixed; bottom: 50px; right: 50px;"/>

   </div>

</div>

<script type="text/javascript">

   function delRow()

   {

   var confrm = confirm("Are you sure you want to delete?");

   if(confrm)

   {

   ids = values();

   $.ajax({

     type:"POST",

     url:'<?php echo base_url()."admin/pacientes/deleteAll"; ?>',

     data:{

       allIds : ids,

       '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'

     },

     success:function(){

       location.reload();

       },

     });

   }

   }

</script>

<?php $this->load->view('footer'); ?>