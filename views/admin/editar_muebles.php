<?php
include_once '../../model/Productos.php';
include_once '../../model/ProductosImagenes.php';
include_once '../../model/imagenes.php';
$p = new Productos();
$imagenes = new ProductosImagenes();
$id = $_REQUEST['id'];
$productos = $p->buscar($id);
$productos_imagenes = $imagenes->buscar($id);
$imagen = new Imagenes();

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
                                <div class="col-md-4">
                                    Codigo: <input type="text" class="form-control" value='C'>
                                    <br>
                                    Nombre de Producto:<input type="text" class="form-control" value='<?= $productos['pro_nombre'] ?>'>
                                    <br>
                                    Precio Venta: <input type="text" class="form-control" value='<?= $productos['pro_precio_venta'] ?>'>
                                    <br>
                                    Precio Compra: <input type="text" class="form-control" value='<?= $productos['pro_precio_compra'] ?>'>
                                    <br>
                                    Altura: <input type="text" class="form-control" value=' <?= $productos['pro_altura'] ?>'>
                                    <br>
                                    Ancho: <input type="text" class="form-control" value='  <?= $productos['pro_ancho'] ?>'>

                                </div>
                                <div class="col-md-4">
                                    Descripción: <input type="text" class="form-control" value='<?= $productos['pro_descripcion'] ?>'>
                                    <br>
                                    Peso:<input type="text" class="form-control" value='<?= $productos['pro_peso'] ?>'>
                                    <br>
                                    Color: <input type="text" class="form-control" value='<?= $productos['pro_color'] ?>'>
                                    <br>
                                    Estado: <input type="text" class="form-control" value='<?= $productos['pro_estado'] ?>'>

                                </div>
                                <div class="col-md-4">
                                    Categoria:<input type="text" class="form-control" value='<?= $productos['categorias_cat_id'] ?>'>
                                    <br>
                                    Modelo:<?= $productos['pro_modelo'] ?>
                                    <br>
                                    Imagen Principal<br>
                                    <img width="50%" src="../../resources/images/productos/<?= $productos['pro_id'] ?>/<?= $productos['pro_img'] ?>">
                                    <br>
                                    Imagenes
                                    <br>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <tr>
                                            <th>imagen</th>
                                            <th>accion</th>
                                        </tr>

                                        <?php
                                        for ($i = 0; $i < count($productos_imagenes); $i++) {
                                            $img = $imagen->buscar($productos_imagenes[$i]['1']);
                                        ?> <tr>
                                                <td>
                                                    <img width="70px" src="../..<?= $img['ruta'] . "/" . $img['nombre'] ?>">
                                                </td>
                                                <td>
                                                    <button class="btn btn-success" type="button">Seleccionar como principal</button>
                                                </td>
                                            </tr>

                                        <?php
                                        }

                                        ?>


                                    </table>


                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card-footer">
                            <a href="?param=editar_productos>" type="button " class="btn btn-primary" data-toggle="tooltip" data-placement>Ir a Modificar</a>
                        </div>
                    </div>
                    <!--/.col (right) -->
                </div>

                <!-- /.row -->
            </div>
        </div>
        <script type="text/javascript">
            // Can also be used with $(document).ready()
            $(window).load(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>