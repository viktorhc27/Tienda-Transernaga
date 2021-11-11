<?php
include_once './model/Productos.php';
include_once './model/Categorias.php';
include_once './model/ProductosImagenes.php';
include_once './model/Conexion.php';

$productos = new Productos();

$categorias = new Categorias();
$cat = $categorias->listar();
$lista = $productos->leer();
$categorias = $_REQUEST['c'];
$por_pagina = 4;

if (isset($_REQUEST['pagina'])) {
    $pagina = $_REQUEST['pagina'];
} else {
    $pagina = 1;
}

$empieza = ($pagina - 1) * $por_pagina;

$pag = (new Productos())->listar_categorias($categorias, $empieza, $por_pagina);
?>

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page">Productos</h2>
        <nav>
            <ol class="breadcrumb text-white">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>

                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-md-3">

                <div class="card">
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Productos</h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_1">
                            <div class="card-body">
                                <form class="pb-3" method="post" action="./controller/BusquedaController.php">
                                    <div class="input-group">
                                        <input name="busqueda" type="text" class="form-control" placeholder="Buscador">
                                        <div class="input-group-append">
                                            <button class="btn btn-light"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group  .// -->
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Categorias </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_2">
                            <div class="card-body"><label class="filter-group">
                                    <?php

                                    foreach ($cat as $c) :
                                    ?>


                                        <a href="./controller/BusquedaController.php?categorias=<?= $c['cat_id'] ?>"><?= $c['cat_nombre'] ?></a><br>



                                    <?php
                                    endforeach;
                                    ?>
                                </label>



                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Price range </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_3">
                            <div class="card-body">
                                <input type="range" class="custom-range" min="0" max="100" name="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input class="form-control" placeholder="$0" type="number">
                                    </div>
                                    <div class="form-group text-right col-md-6">
                                        <label>Max</label>
                                        <input class="form-control" placeholder="$1,0000" type="number">
                                    </div>
                                </div> <!-- form-row.// -->
                                <button class="btn btn-block btn-primary">Apply</button>
                            </div><!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->


                </div> <!-- card.// -->

            </aside> <!-- col.// -->
            <main class="col-md-9">

                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto"><?= count($pag) . " Producto(s)" ?> </span>

                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="List view">
                                <i class="fa fa-bars"></i></a>
                            <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="Grid view">
                                <i class="fa fa-th"></i></a>
                        </div>
                    </div>
                </header><!-- sect-heading -->


                <div class="row">
                    <?php
                    if (count($pag) > 0) {


                        foreach ($pag as  $p) :

                    ?>


                            <div class="col-md-4">


                                <figure class="card card-product-grid">
                                    <div class="img-wrap">
                                        <!-- <span class="badge badge-danger"> NEW </span> -->
                                        <img src="./resources/images/productos/<?= $p['pro_id'] ?>/<?= $p['pro_img'] ?>">
                                        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                                    </div> <!-- img-wrap.// -->
                                    <figcaption class="info-wrap">
                                        <div class="fix-height">
                                            <a href="?param=detalles_productos&id=<?= $p['pro_id'] ?>" class="title"><?= $p['pro_nombre'] ?></a>
                                            <div class="price-wrap mt-2">
                                                <span class="price">$<?= number_format($p['pro_precio_compra'], 0) ?></span>
                                                <!-- <del class="price-old">$1980</del> -->
                                            </div> <!-- price-wrap.// -->
                                        </div>

                                    </figcaption>
                                </figure>

                            </div> <!-- col.// -->

                    <?php
                        endforeach;
                    } else {
                        echo "NO HAY PRODUCTOS";
                    }
                    ?>
                </div> <!-- row end.// -->


                <nav class="mt-4" aria-label="Page navigation sample">
                    <?php
                    $resultado = (new Productos())->leer();

                    $total_registros = count($resultado);
                    $total_de_paginas = ceil($total_registros / $por_pagina);
                    ?>
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <?php for ($i = 1; $i <= $total_de_paginas; $i++) { ?>
                            <li class="page-item"><a class="page-link" href="?param=productos&pagina=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item"><a class="page-link" href="?param=productos&pagina=<?= $total_de_paginas ?>">Next</a></li>
                    </ul>
                </nav>

            </main>
        </div>

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->