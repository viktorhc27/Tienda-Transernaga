<?php
include_once '../../model/Productos.php';
include_once '../../model/Categorias.php';
include_once '../../model/Marcas.php';
$p = new Productos();
$m = new Marcas();
$c = new Categorias();

$productos = $p->leer();
?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <ul class="nav ">
                            <li><a href="?param=agregar-muebles" type="button" class="btn btn-outline-primary">Agregar Muebles</a></li>
                            <li><a href="?param=stock" type="button" class="btn btn-outline-success">Stocks</a></li>
                        </ul>
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Lista de Productos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Modelo</th>
                                        <th>Imagen</th>
                                        <th>Categoria</th>
                                        <th>Marca</th>
                                        <th>Estado</th>


                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($productos as $p) :
                                      
                                    $categoria_nombre= $c->buscar($p['categorias_cat_id']);
                                    
                                       $nombre_m=$m->buscar($p['marcas_mar_id']);
                                    ?>
                                        <tr>
                                            <td><?= $p['pro_id'] ?></td>
                                            <td>
                                                <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tienda-transernaga/views/barcode.php?text=<?= $p['pro_codigo'] ?>&size=50&orientation=horizontal&codetype=Code39&print=true&sizefactor=1" />
                                            </td>
                                            <td><?= $p['pro_nombre'] ?></td>
                                            <td><?= $p['pro_precio_venta'] ?></td>
                                            <td><?= $p['pro_stock'] ?></td>
                                            <td>
                                                <model-viewer style="width: 100%; height: 500px;" class="w-screen" src="../../resources/images/modelos/<?= $p['pro_id'] ?>/<?= $p['pro_modelo'] ?>" camera-controls auto-rotate ar>

                                                    <div class="progress-bar hide" slot="progress-bar">
                                                        <div class="update-bar"></div>
                                                    </div>
                                                </model-viewer>



                                            </td>
                                            <td><img width="50px" src="../../resources/images/productos/<?= $p['pro_id'] ?>/<?= $p['pro_img'] ?>"></td>
                                            <td><?=$categoria_nombre['cat_nombre']?></td>
                                            <td><?= $nombre_m['mar_nombre'] ?></td>
                                            <td><?php
                                                if ($p['pro_estado'] == 1) { ?>
                                                    <span class="badge badge-success"> Habilitado </span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger"> desabilitado </span>
                                                <?php }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <button class="dropdown-item" type="button">Modificar</button>
                                                        <a href="?param=ver_product&id=<?= $p['pro_id'] ?>" class="dropdown-item" type="button">Ver</a>
                                                        <form method="post" action="../../controller/ProductosController.php?accion=cambiar_estado">
                                                            <input type="hidden" id="id" name="id" value="<?= $p['pro_id'] ?>">
                                                            <button id="estado" class="dropdown-item">Cambiar Estado</button>
                                                        </form>

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


                    </div>
                    <!--/.col (right) -->
                </div>

            </div>
        </div>

        <!-- <script type="text/javascript" src="../../resources/js/validaciones/cambiar_estado.js"></script> -->