<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

   <div class="col-lg-10">

      <h2>SuperUsuarios</h2>

      <ol class="breadcrumb">

         <li>

            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>

         </li>

         <li class="active">

            <strong>SuperUsuarios</strong>

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

            <a href="<?php echo base_url(); ?>admin/users/add" class="btn btn-info">AGREGAR NUEVO</a>

            <div class="form-group pull-right">

               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>

               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>

            </div>

            <form method="GET" action="<?php echo base_url().'admin/users/index'; ?>" class="form-inline ibox-content">

               <div class="form-group">

                  <select name="searchBy" class="form-control">

                  <option value="password" <?php echo $searchBy=="password"?'selected="selected"':""; ?>>Contraseña</option><option value="email" <?php echo $searchBy=="email"?'selected="selected"':""; ?>>Email</option><option value="first_name" <?php echo $searchBy=="first_name"?'selected="selected"':""; ?>>Primer Nombre</option><option value="last_name" <?php echo $searchBy=="last_name"?'selected="selected"':""; ?>>Apellidos</option><option value="company" <?php echo $searchBy=="company"?'selected="selected"':""; ?>>Empresa</option><option value="phone" <?php echo $searchBy=="phone"?'selected="selected"':""; ?>>Celular</option>

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

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="password"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["password"]; ?>" class="link_css"> Contraseña <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="email"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["email"]; ?>" class="link_css"> Email <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="first_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["first_name"]; ?>" class="link_css"> Primer Nombre <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="last_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["last_name"]; ?>" class="link_css"> Apellidos <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="company"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["company"]; ?>" class="link_css"> Empresa <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="phone"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["phone"]; ?>" class="link_css"> Celular <?php echo $symbol ?></a></th>

						

                     <th> Acción </th>

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

                              

            <th><?php if(!empty($value->id)){ echo $count; $count++; }?></th><th><?php if(!empty($value->password)){ echo $value->password; }?></th>

                <th><?php if(!empty($value->email)){ echo $value->email; }?></th>

                <th><?php if(!empty($value->first_name)){ echo $value->first_name; }?></th>

                <th><?php if(!empty($value->last_name)){ echo $value->last_name; }?></th>

                <th><?php if(!empty($value->company)){ echo $value->company; }?></th>

                <th><?php if(!empty($value->phone)){ echo $value->phone; }?></th>

                <th class="action-width">

		   <a href="<?php echo base_url()?>admin/users/view/<?php echo $value->id; ?>" title="View">

            <span class="btn btn-info " ><i class="fa fa-eye"></i></span>

           </a>

           <a href="<?php echo base_url()?>admin/users/edit/<?php echo $value->id; ?>" title="Edit">

            <span class="btn btn-info " ><i class="fa fa-edit"></i></span>

           </a>

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','users');">

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

     url:'<?php echo base_url()."admin/users/deleteAll"; ?>',

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