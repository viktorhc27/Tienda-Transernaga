<?php
//http://flexslider.woothemes.com/thumbnail-controlnav.html
include_once '../../model/Categorias.php';

$categorias = new Categorias();
$listas_categorias = $categorias->listar();

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
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
                            <h3 class="card-title ">Lista de Categorias</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Imagen</th>

                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($listas_categorias as $s) :
                                    ?> <tr>

                                            <td><?= $s['cat_id'] ?></td>
                                            <td><?= $s['cat_nombre'] ?></td>
                                            <td><?php
                                                if ($s['cat_estado'] == '1') {
                                                    echo "Habilitado";
                                                }else{
                                                    echo "desabilitado";
                                                }
                                                ?></td>
                                                <td><img width="100px" src="../../resources/images/categorias/<?= $s['imagen'] ?>" ></td>

                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <a href="?param=modificar_categorias&id=<?=$s['cat_id']?>" class="dropdown-item" type="button">Modificar</a>
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
                <div class="col-md-4">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Agregar Categorias </h3>
                        </div>

                        <div class="card-body">


                            <form method="post" action="../../controller/CategoriasController.php?accion=guardar" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input name="nombre" type="text" class="form-control" placeholder="">
                                    <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" checked="" type="radio" name="estado" value="1">
                                        <span class="custom-control-label"> Habilitado </span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" type="radio" name="estado" value="0">
                                        <span class="custom-control-label"> Desabilitar </span>
                                    </label>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <input name="imagen" type="file" class="form-control" accept="image/png,image/jpeg">
                                </div> 

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