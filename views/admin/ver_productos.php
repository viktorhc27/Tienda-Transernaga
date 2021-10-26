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
                                    Codigo: <input type="text" class="form-control" value='C' disabled>
                                    <br>
                                    Nombre de Producto:<input type="text" class="form-control" value='<?= $productos['pro_nombre'] ?>' disabled>
                                    <br>
                                    Precio Venta: <input type="text" class="form-control" value='<?= $productos['pro_precio_venta'] ?>' disabled>
                                    <br>
                                    Precio Compra: <input type="text" class="form-control" value='<?= $productos['pro_precio_compra'] ?>' disabled>
                                    <br>
                                    Altura: <input type="text" class="form-control" value=' <?= $productos['pro_altura'] ?>' disabled>
                                    <br>
                                    Ancho: <input type="text" class="form-control" value='  <?= $productos['pro_ancho'] ?>' disabled>

                                </div>
                                <div class="col-md-4">
                                    Descripción: <input type="text" class="form-control" value='<?= $productos['pro_descripcion'] ?>' disabled>
                                    <br>
                                    Peso:<input type="text" class="form-control" value='<?= $productos['pro_peso'] ?>' disabled>
                                    <br>
                                    Color: <input type="text" class="form-control" value='<?= $productos['pro_color'] ?>' disabled>
                                    <br>
                                    Estado: <input type="text" class="form-control" value='<?= $productos['pro_estado'] ?>' disabled>
                                    <br>
                                    Agregado el: <input type="text" class="form-control" value=' <?= $productos['create_time'] ?>' disabled>
                                    <br>
                                    Ultima modificación: <input type="text" class="form-control" value='  <?= $productos['update_time'] ?>' disabled>
                                </div>
                                <div class="col-md-4">
                                    Categoria:<input type="text" class="form-control" value='<?= $productos['categorias_cat_id'] ?>' disabled>
                                    <br>
                                    Modelo:<?= $productos['pro_modelo'] ?>
                                    <br>
                                    Imagen Principal<br>
                                    <img width="50%" src="../../resources/images/productos/<?= $productos['pro_id'] ?>/<?= $productos['pro_img'] ?>">
                                    <br>
                                    Imagenes
                                    <br>
                                    <!-- Place somewhere in the <body> of your page -->
                                    <div class="flexslider">
                                        <ul class="slides">
                                            <?php
                                            for ($i = 0; $i < count($productos_imagenes); $i++) {
                                                $img = $imagen->buscar($productos_imagenes[$i]['1']);
                                            ?>
                                                <li>
                                                <img src="../..<?= $img['ruta'] . "/" . $img['nombre'] ?>">
                                                </li>
                                               
                                            <?php
                                            }

                                            ?>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card-footer">
                        <a href="?param=editar_productos&id=<?=$id?>"type="button " class="btn btn-primary" data-toggle="tooltip" data-placement >Ir a Modificar</a>
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