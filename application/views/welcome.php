<?php $this->load->view('header'); ?>
<!-- content -->


<?php if(!empty($value->id)){ echo $count; $count++; }?>


<div class="wrapper wrapper-content">
    <div class="row">
        <div class="row">
            <div class="wrapper wrapper-content animated fadeInRight">

  <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <span class="label label-success float-right">Flash</span>
                                <h5>Instrucciones</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">Para comenzar a crear o administrar los perfiles, da clic en el menú del lado izquierdo, opción Tipos de Usuarios</h1>
                                <div class="stat-percent font-bold text-success">100% <i class="fa fa-bolt"></i></div>
                                <small>Crea y administra los perfiles y tipos de usuarios del sistema</small>
                            </div>

                            <div class="ibox-content">
                                <h1 class="no-margins">Para comenzar a crear o administrar los usuarios, da clic en el menú del lado izquierdo, opción Usuarios Sistema</h1>
                                <div class="stat-percent font-bold text-success">100% <i class="fa fa-bolt"></i></div>
                                <small>Crea y administra los usuarios del sistema</small>
                            </div>

                            <div class="ibox-content">
                                <h1 class="no-margins">Para comenzar a crear o administrar los pacientes, da clic en el menú del lado izquierdo, opción pacientes</h1>
                                <div class="stat-percent font-bold text-success">100% <i class="fa fa-bolt"></i></div>
                                <small>Crea y administra los pacientes</small>
                            </div>

                        </div>
                    </div>
        </div>

        </div>
    </div>
        <!-- close main row -->
    </div>
</div>

<!-- content -->
<?php $this->load->view('footer'); ?>