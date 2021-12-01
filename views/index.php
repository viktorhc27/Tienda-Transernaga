<section class="section-intro padding-y-sm">
    <div class="container">

        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-touch="false" data-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="resources/images/banners/tienda/banner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="resources/images/banners/tienda/banner2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="resources/images/banners/tienda/banner3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControlsNoTouching" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControlsNoTouching" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div> <!-- container //  -->


</section>
<?php
include_once './model/conexion.php';
include_once './model/Marcas.php';

$marcas = new Marcas();

$marca = $marcas->listar();
?>

<section class="section-name bg padding-y-sm">




    <div class="container">
        <header class="section-heading">
            <h3 class="section-title text-center">Marcas</h3>
        </header><!-- sect-heading -->

        <div class="row"><?php foreach ($marca as $m) : ?>
                <div class="col-md-2 col-6">

                    <figure class="box item-logo">
                        <a href="#"><img src="resources/images/marcas/<?= $m['mar_imagen'] ?>"></a>
                        <figcaption class="border-top pt-2"><?=$m['mar_nombre']?></figcaption>
                    </figure> <!-- item-logo.// -->


                </div> <!-- col.// -->
            <?php endforeach;
            ?>
        </div> <!-- row.// -->
    </div><!-- container // -->
</section>

<?php
include_once './model/conexion.php';
include_once './model/Productos.php';

$productos = new Productos();

$lista_pro = $productos->leer();
?>


<section class="section-content">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title text-center">Productos</h3>
        </header><!-- sect-heading -->


        <div class="row">
            <div class="slider-items-owl owl-carousel owl-theme">

                <?php
                foreach ($lista_pro as $pro) : ?>

                    <div class="item-slide">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <!-- <span class="badge badge-danger"> New </span> -->
                                <img src="resources/images/productos/<?= $pro['pro_id'] ?>/<?= $pro['pro_img'] ?>">
                            </div>
                            <figcaption class="info-wrap text-center">
                                <a>
                                    <h6 class="title text-truncate"><a href="http://localhost/tienda-transernaga/?param=detalles_productos&id=<?= $pro['pro_id'] ?>"><?= $pro['pro_nombre'] ?></a></h6>
                            </figcaption>
                        </figure> <!-- card // -->
                    </div>


                <?php endforeach;

                ?>




            </div> <!-- slider-itemsowl end. // -->










        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>




<?php
include_once './model/conexion.php';
include_once './model/Categorias.php';

$categorias = new Categorias();

$lista_cat = $categorias->listar();
?>
<section class="section-content padding-y bg">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title text-center">Categorias</h3>
        </header><!-- sect-heading -->
        <div class="row">
            <?php

            foreach ($lista_cat as $cat) : ?>




                <div class=" col-md-4">

                    <div class="shadow-sm card-banner">
                        <div class="p-4" style="width:75%">
                            <a href="#""> <h5 class=" card-title"><?= $cat['cat_nombre'] ?></h5></a>

                        </div>
                        <img src="resources/images/categorias/<?= $cat['imagen'] ?>" height="100" class="img-bg">
                    </div>
                    <br>
                    <!-- ============================ COMPONENT ITEM BG  END .// =========================== -->
                </div> <!-- col.// -->




            <?php
            endforeach;
            ?>


        </div> <!-- row.// -->

    </div> <!-- container .//  -->
</section>