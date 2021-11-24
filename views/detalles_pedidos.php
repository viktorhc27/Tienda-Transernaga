<?php
include_once './model/Ventas.php';
include_once './model/Productos.php';
include_once './model/conexion.php';
$ventas = new Ventas();
$productos = new Productos();
$id = $_REQUEST['id'];
$pedidos = $ventas->buscar($id);


?>

<section class="section-content padding-y bg">
    <div class="container">

        <!-- =========================  COMPONENT MYORDER 1 ========================= -->
        <div class="row">
            <aside class="col-md-3">
                <!--   SIDEBAR   -->
                <ul class="list-group">
                    <a class="list-group-item active" href="#"> Mis Pedidos</a>
                    <!--    <a class="list-group-item" href="#"> Transactions </a>
                    <a class="list-group-item" href="#"> Return and refunds </a>
                    <a class="list-group-item" href="#">Settings </a>
                    <a class="list-group-item" href="#"> My Selling Items </a>
                    <a class="list-group-item" href="#"> Received orders </a> -->
                </ul>
                <br>
                <a class="btn btn-light btn-block" href="#"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a>
                <!--   SIDEBAR .//END   -->
            </aside>
            <main class="col-md-9">
                <article class="card">
                    <header class="card-header"> My Orders / Tracking </header>
                    <div class="card-body">
                        <h6>Order ID: <?= $pedidos['0']['2'] ?></h6>
                        <article class="card">
                            <div class="card-body row no-gutters">
                                <div class="col">
                                    <strong>Direccion de Entrega:</strong> <br>16:40, 12 nov 2018
                                </div>
                                <div class="col">
                                    <strong>Numero:</strong> <br><i class="fa fa-phone"></i> +123467890
                                </div>
                                <div class="col">
                                    <strong>Tipo de armado:</strong> <br> Picked by the courier
                                </div>
                                <div class="col">
                                    <strong>Boleta</strong> <br> Archivo
                                </div>
                            </div>
                        </article>

                        <?php if ($pedidos['0']['9'] == '1') { ?>
                            <div class="tracking-wrap">
                                <div class="step ">
                                    <span class="icon"> <i class="fa fa-check"></i> </span>
                                    <span class="text">Order Confirmada</span>
                                </div> <!-- step.// -->
                                <div class="step ">
                                    <span class="icon"> <i class="fas fa-truck-loading"></i> </span>
                                    <span class="text">En Preparacion</span>
                                </div> <!-- step.// -->
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">En Reparto </span>
                                </div> <!-- step.// -->
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-box"></i> </span>
                                    <span class="text">Producto Entregado</span>
                                </div> <!-- step.// -->
                            </div>


                        <?php
                        } ?>
                        <?php if ($pedidos['0']['9'] == '2') { ?>
                            <div class="tracking-wrap">
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-check"></i> </span>
                                    <span class="text">Order Confirmada</span>
                                </div> <!-- step.// -->
                                <div class="step ">
                                    <span class="icon"> <i class="fas fa-truck-loading"></i> </span>
                                    <span class="text">En Preparacion</span>
                                </div> <!-- step.// -->
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">En Reparto </span>
                                </div> <!-- step.// -->
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-box"></i> </span>
                                    <span class="text">Producto Entregado</span>
                                </div> <!-- step.// -->
                            </div>


                        <?php
                        } ?>
                        <?php if ($pedidos['0']['9'] == '3') { ?>
                            <div class="tracking-wrap">
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-check"></i> </span>
                                    <span class="text">Order Confirmada</span>
                                </div> <!-- step.// -->
                                <div class="step active ">
                                    <span class="icon"> <i class="fas fa-truck-loading"></i> </span>
                                    <span class="text">En Preparacion</span>
                                </div> <!-- step.// -->
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">En Reparto </span>
                                </div> <!-- step.// -->
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-box"></i> </span>
                                    <span class="text">Producto Entregado</span>
                                </div> <!-- step.// -->
                            </div>


                        <?php
                        } ?>
                        <?php if ($pedidos['0']['9'] == '4') { ?>
                            <div class="tracking-wrap">
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-check"></i> </span>
                                    <span class="text">Order Confirmada</span>
                                </div> <!-- step.// -->
                                <div class="step active">
                                    <span class="icon"> <i class="fas fa-truck-loading"></i> </span>
                                    <span class="text">En Preparacion</span>
                                </div> <!-- step.// -->
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">En Reparto </span>
                                </div> <!-- step.// -->
                                <div class="step">
                                    <span class="icon"> <i class="fa fa-box"></i> </span>
                                    <span class="text">Producto Entregado</span>
                                </div> <!-- step.// -->
                            </div>


                        <?php
                        } ?>
                        <?php if ($pedidos['0']['9'] == '5') { ?>
                            <div class="tracking-wrap">
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-check"></i> </span>
                                    <span class="text">Order Confirmada</span>
                                </div> <!-- step.// -->
                                <div class="step active ">
                                    <span class="icon"> <i class="fas fa-truck-loading"></i> </span>
                                    <span class="text">En Preparacion</span>
                                </div> <!-- step.// -->
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text">En Reparto </span>
                                </div> <!-- step.// -->
                                <div class="step active">
                                    <span class="icon"> <i class="fa fa-box"></i> </span>
                                    <span class="text">Producto Entregado</span>
                                </div> <!-- step.// -->
                            </div>


                        <?php
                        } ?>



                        <hr>
                        <ul class="row">
                            <?php foreach ($pedidos as $p) :
                                $datos= $productos->buscar($p['productos_pro_id']);
                                ?>
                                
                                <li class="col-md-4">
                                    <figure class="itemside  mb-3">
                                        <div class="aside"><img src="./resources/images/productos/<?=$datos['pro_id']?>/<?=$datos['pro_img']?>" class="img-sm border"></div>
                                        <figcaption class="info align-self-center">
                                            <p class="title"><?=$datos['pro_nombre']?></p>
                                            <span class="text-muted">$<?=$datos['pro_precio_venta']?></span>
                                        </figcaption>
                                    </figure>
                                </li>
                            <?php endforeach ?>


                        </ul>

                        <a href="http://localhost/tienda-transernaga/index.php?param=mispedidos" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Regresar</a>
                    </div> <!-- card-body.// -->
                </article>
            </main>
        </div> <!-- row.// -->
    </div>