<?php
include_once '../../model/Usuarios.php';
include_once '../../model/Roles.php';
$roles = new Roles();
$lista_roles = $roles->leer();
$us = new Usuarios();
$id = $_REQUEST['id'];
$us = $us->buscar($id);

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Inicio </a></li>
                <li class="breadcrumb-item " aria-current="page"></li>
            </ol>
        </nav>
        <br>

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Detalles de Productos</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            
                            <div class="row">


                                <div class="col-md-6">
                                <div class="form-group">
                                        <label>id</label>
                                        <input id="id" value="<?=$us['us_id']?>" name="id" type="text" class="form-control" placeholder="" disabled>
                                        <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input id="nombre" value="<?=$us['us_nombre']?>" name="nombre" type="text" class="form-control" placeholder="">
                                        <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input id="app" value="<?=$us['us_apellApp']?>" name="app" type="text" class="form-control" placeholder="">
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input id="apm" value="<?=$us['us_apellApm']?>" name="apm" type="text" class="form-control" placeholder="">
                                    </div> <!-- form-group end.// -->

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="correo" value="<?=$us['us_correo']?>" name="correo" type="email" class="form-control" placeholder="">
                                        <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group ">
                                        <label>Telefono</label>
                                        <input id="telefono" value="<?=$us['us_telefono']?>" name="telefono" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Direccion</label>
                                        <input id="direccion" value="<?=$us['us_direccion']?>" name="direccion" type="" type="text" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <input id="nuevo_rol" value="<?=$us['roles_ro_id']?>" name="rol" type="" type="text" class="form-control" disabled>

                                        <select id="rol" name="rol" class="form-control">
                                            <option>Nuevo Rol</option>
                                            <?php

                                            foreach ($lista_roles as $r) :
                                            ?>

                                                <option value="<?= $r['ro_id'] ?>"><?= $r['rol_nombre'] ?></option>

                                            <?php
                                            endforeach;

                                            ?>

                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card-footer">
                            <button id="btn-modificar" type="button " class="btn btn-primary" data-toggle="tooltip" data-placement>Modificar</button>
                        </div>
                    </div>
                    <!--/.col (right) -->
                </div>

                <!-- /.row -->
            </div>
        </div>
        <script type="text/javascript" src="../../resources/js/validaciones/modificar_funcionarios.js"></script>
