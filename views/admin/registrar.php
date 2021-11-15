<?php
include_once '../../model/Roles.php';
include_once '../../model/Usuarios.php';
$roles = new Roles();
$usuarios = new Usuarios();
$listas_usuarios = $usuarios->listar_funcionarios();
$lista_roles = $roles->leer();

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Funcionarios</li>
            </ol>
        </nav>

        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Lista de Funcionarios</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Direccion</th>
                                        <th>Genero</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($listas_usuarios as $s) :
                                    ?> <tr>

                                            <td><?= $s['us_nombre'] ?></td>
                                            <td><?= $s['us_telefono'] ?></td>
                                            <td><?= $s['us_correo'] ?></td>
                                            <td><?= $s['us_direccion'] ?></td>
                                            <td><?= $s['us_sexo'] ?></td>
                                            <td><?= $s['roles_ro_id'] ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <button class="dropdown-item" type="button">Modificar</button>
                                                        <button class="dropdown-item" type="button">Ver</button>
                                                        <button class="dropdown-item" type="button">Desabilitar</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;

                                    ?>




                                </tbody>
                            </table>

                        </div>
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <div class="col-md-3">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Registrar </h3>
                        </div>

                        <div class="card-body">


                            <form method="post" action="../../controller/UsuariosController.php?accion=register_employees">

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input name="nombre" type="text" class="form-control" placeholder="">
                                    <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Apellido Paterno</label>
                                    <input name="app" type="text" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Apellido Materno</label>
                                    <input name="apm" type="text" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->



                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="correo" type="email" class="form-control" placeholder="">
                                    <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                </div> <!-- form-group end.// -->


                                <div class="form-group">
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" checked="" type="radio" name="sexo" value="hombre">
                                        <span class="custom-control-label"> Hombre </span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" type="radio" name="sexo" value="mujer">
                                        <span class="custom-control-label"> Mujer </span>
                                    </label>
                                </div> <!-- form-group end.// -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Telefono</label>
                                        <input name="telefono" type="text" class="form-control">
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group col-md-6">
                                        <label>Direccion</label>
                                        <input name="direccion" type="text" class="form-control">
                                    </div>
                                </div> <!-- form-row.// -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Contraseña</label>
                                        <input name="password" type="password" class="form-control" type="password">
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group col-md-6">
                                        <label>Repetir contraseña</label>
                                        <input class="form-control" type="password">
                                    </div> <!-- form-group end.// -->
                                </div>

                                <div class="form-group ">
                                    <label>Rol</label>
                                    <select name="rol" class="form-control">
                                        <option>Seleccione...</option>
                                        <?php

                                        foreach ($lista_roles as $r) :
                                        ?>

                                            <option value="<?= $r['ro_id'] ?>"><?= $r['rol_nombre'] ?></option>

                                        <?php
                                        endforeach;

                                        ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Registrar </button>
                                </div> <!-- form-group// -->

                            </form>


                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">

                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
               
                <!-- /.row -->
            </div>
        </div>