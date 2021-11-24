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
                                    <div class="aside">
                                        <img src="./resources/images/productos/<?= $pro['pro_id'] ?>/<?= $pro['pro_img'] ?>" class="border img-sm">
                                    </div>
                                    <figcaption class="info">
                                        <span class="text-muted">Mueble</span>
                                        <a href="#" class="title"><?= $pro['pro_nombre'] ?> </a>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col">
                                <div class="input-group input-spinner">
                                    <form method="post" action="./controller/CarritoController.php?accion=actualizar">
                                        <input type="hidden" name="id" value="<?= $_SESSION['cart'][$c['id_producto']]['id_producto'] ?>">
                                        <input style="padding: 0.7rem 0.1rem;" name="cantidad" type="number" id="quantity_617d6a895b026" class="form-control" step="1" min="0" max="<?= $pro['pro_stock'] + $c['cantidad'] ?>" value="<?= $c['cantidad'] ?>" title="Cantidad" size="4" inputmode="numeric">
                                        <button class="btn btn-warning"><i class="fas fa-sync-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col">
                                <div class="price h5"> <?= $pro['pro_precio_venta'] * $c['cantidad'] ?> </div>
                            </div>
                            <div class="col flex-grow-0 text-right">
                                <form action="./controller/CarritoController.php?accion=quitar" method="post">
                                    <input type="hidden" class="form-control" name="cantidad" value="<?= $_SESSION['cart'][$pro['pro_id']]['cantidad']  ?>">
                                    <input type="hidden" class="form-control" name="id" value="<?= $pro['pro_id'] ?>">
                                    <button class="btn btn-light"> <i class="fa fa-times"></i> </button>
                                </form>

                            </div>
                        </div>
                    </article>
                <?php
                endforeach;
            } else {
                ?>
                <article class="card card-body mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            NO HAY PRODUCTOS
                        </div>
                    </div>
                </article>
            <?php
            }

            ?>


        </main>

        <aside class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd id="total" class="text-right text-dark"></dd>
                    </dl>
                    <hr>
                    <a href="?param=ve" class="btn btn-primary btn-block"> Pasar a Caja </a>
                </div>
            </div>
        </aside>
    </div>
</div>
<script>
    const elementoasumar = Array.from(document.getElementsByClassName("price"));
    let suma = 0;
    elementoasumar.forEach(el => suma = suma + +el.innerText);
    document.getElementById("total").innerHTML = "$ " + suma;
    console.log(elementoasumar[1].innerText);
</script>