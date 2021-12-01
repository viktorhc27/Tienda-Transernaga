<?php

include_once '../../model/Marcas.php';

$marcas = new Marcas();
$listas_marcas = $marcas->listar();

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Marcas</li>
            </ol>
        </nav>

        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Lista de Marcas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Nombre</th>
                                        <th>Imagen</th>

                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($listas_marcas as $s) :
                                    ?> <tr>

                                            <td><?= $s['mar_nombre'] ?></td>
                                            <td>
                                                <img width="100px" src="../../resources/images/marcas/<?= $s['mar_imagen']?>">
                                            </td>

                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <button class="dropdown-item" type="button">Modificar</button>
                                                        <button class="dropdown-item" type="button">Ver</button>
                                                        <!-- <button class="dropdown-item" type="button">Desabilitar</button> -->
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
                <div class="col-md-4">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Agregar Marcas </h3>
                        </div>

                        <div class="card-body">


                            <form method="post" action="../../controller/MarcasController.php?accion=guardar" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input name="nombre" type="text" class="form-control" placeholder="">
                                    <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" name="imagen" class="form-control">
                                </div> <!-- form-group end.// -->


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Agregar </button>
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