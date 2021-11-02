<?php

include_once './model/Conexion.php';
include_once './model/Productos.php';

$productos = new Productos();



?>

<br>
<div class="container">
    <div class="row">
        <main class="col-md-9">
            <?php
            if (!empty($_SESSION['cart'])) {

                foreach ($_SESSION['cart'] as $c) :
                    $pro = $productos->buscar($c['id_producto']);
            ?>
                    <article class="card card-body mb-3">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <figure class="itemside">
                                    <div class="aside"><img src="./resources/images/productos/<?= $pro['pro_id'] ?>/<?= $pro['pro_img'] ?>" class="border img-sm"></div>
                                    <figcaption class="info">
                                        <span class="text-muted">Mueble</span>
                                        <a href="#" class="title"><?= $pro['pro_nombre'] ?> </a>
                                    </figcaption>
                                </figure>
                            </div> <!-- col.// -->
                            <div class="col">

                                <div class="input-group input-spinner">
                                    <input style="padding: 0.7rem 0.1rem;" type="number" id="quantity_617d6a895b026"class="form-control" step="1" min="0" max="<?=$pro['pro_stock']?>"  value="<?= $c['cantidad'] ?>" title="Cantidad" size="4" inputmode="numeric">
                                   

                                </div> <!-- input-group.// -->
                            </div> <!-- col.// -->
                            <div class="col">
                                <div class="price h5"> <?= $pro['pro_precio_venta'] * $c['cantidad'] ?> </div>
                            </div>
                            <div class="col flex-grow-0 text-right">
                                <form action="./controller/CarritoController.php?accion=quitar" method="post">
                                    <input type="hidden" class="form-control" name="id" value="<?= $pro['pro_id'] ?>">
                                    <button class="btn btn-light"> <i class="fa fa-times"></i> </button>
                                </form>

                            </div>
                        </div> <!-- row.// -->
                    </article> <!-- card .// -->






                <?php
                endforeach;
            } else {
                ?>
                <article class="card card-body mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            NO HAY PRODUCTOS
                        </div> <!-- col.// -->



                    </div> <!-- row.// -->
                </article> <!-- card .// -->
            <?php
            }

            ?>


        </main> <!-- col.// -->

        <aside class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <button disabled="false" class="btn btn-warning btn-block"> Actualizar Carrito</button>

                </div> <!-- card-body.// -->
            </div> <!-- card.// -->

            <div class="card">
                <div class="card-body">

                

                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd id="total" class="text-right text-dark"></dd>
                    </dl>
                    <hr>
                    <a href="?param=ve" class="btn btn-primary btn-block"> Pasar a Caja </a>

                </div> <!-- card-body.// -->
            </div> <!-- card.// -->
        </aside> <!-- col.// -->
    </div>
</div>
<script>
    const elementoasumar = Array.from(document.getElementsByClassName("price"));
    let suma = 0;
    elementoasumar.forEach(el => suma = suma + +el.innerText);

    document.getElementById("total").innerHTML = "$ " + suma;
    console.log(elementoasumar[1].innerText);
</script>