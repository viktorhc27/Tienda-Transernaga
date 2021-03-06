<?php
include_once './model/Ventas.php';
include_once './model/Productos.php';
include_once './model/conexion.php';
include_once './model/Usuarios.php';
include_once './model/DireccionesUsuarios.php';
$ventas = new Ventas();
$productos = new Productos();
$usuarios = new Usuarios();
$direccionesUsuarios = new DireccionesUsuarios();

$id = $_REQUEST['id'];
$pedidos = $ventas->listar($id);
$id_cliente= $pedidos['0']['0'];

$usuarios->buscar($id_cliente);
$dir= $direccionesUsuarios->direccion_usuarios($id_cliente);

/* echo "<pre>";
print_r($usuarios);
echo "</pre>"; */
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
                    <header class="card-header"> Mis Ordenes / Seguimiento </header>
                    <div class="card-body">
                        <h6>Order ID: <?= $pedidos['0']['2'] ?></h6>
                        <article class="card">
                            <div class="card-body row no-gutters">
                                <div class="col">
                                    <strong>Direccion de Entrega:</strong><br><?= $dir[0]['di_nombre'] ?> </strong>
                                </div>
                                <div class="col">
                                    <strong>Numero:</strong> <br><i class="fa fa-phone"></i> <?php $var =$usuarios->buscar($pedidos['0']['usuarios_us_id'])  ?> <?=$var['us_telefono']?>
                                </div>
                                <div class="col">
                                    <strong>Tipo de armado:</strong> <br> Armado en <?= $pedidos['0']['tipo_armado'] ?> 
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

                        <!-- <a href="http://localhost/tienda-transernaga/index.php?param=mispedidos" class="btn btn-outline-danger"> <i class="fa fa-chevron-left"></i> Solicitar Canelacion</a> -->
                        <!-- <a href="http://localhost/tienda-transernaga/index.php?param=mispedidos" class="btn btn-outline-danger"> <i class="fa fa-chevron-left"></i> Solicitar Canelacion</a> -->
                    </div> <!-- card-body.// -->
                </article>
            </main>
        </div> <!-- row.// -->
    </div>