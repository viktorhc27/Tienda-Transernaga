<?php
include_once '../../model/Marcas.php';
include_once '../../model/Conexion.php';
$marcas = new Marcas();
$id = $_REQUEST['id'];
$lista = $marcas->buscar($id);

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
                            <h3 class="card-title ">Modificar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <form action="../../controller/MarcasController.php?accion=modificar" method="post" enctype="multipart/form-data" >
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>id</label>
                                            <input  value="<?= $lista['mar_id'] ?>"  type="text" class="form-control" placeholder="" disabled>
                                            <input  value="<?= $lista['mar_id'] ?>" name="id" type="hidden" class="form-control" placeholder="" >
                                            <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input  value="<?= $lista['mar_nombre'] ?>" name="nombre" type="text" class="form-control" placeholder="">
                                            <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                        </div> <!-- form-group end.// -->
                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Imagen</label><br>
                                            <input type="hidden" name="imagen"class="form-control" value="<?= $lista['mar_imagen'] ?>">
                                            <img width="80%" src="../../resources/images/marcas/<?= $lista['mar_imagen'] ?>">
                                            <input type="file" name="imagen_new" class="form-control" value="2" accept="image/png,image/jpeg">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                                <div class="card-footer">
                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement>Modificar</button>
                                </div>
                            </form>
                        </div>
                        <!--/.col (right) -->
                    </div>

                    <!-- /.row -->
                </div>
            </div>
            