<?php
include_once '../../model/Ventas.php';
include_once '../../model/Usuarios.php';
include_once '../../model/Productos.php';

$ventas = new Ventas();
$usuarios = new Usuarios();
$productos = new Productos();

$lista_ventas = $ventas->leer();

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
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
                            <h3 class="card-title ">Pedidos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Codigo Venta</th>

                                        <th>Codigo del producto</th>
                                        <th>Cantidad</th>
                                        <th>Imagen</th>
                                        <th>Tipo armado</th>
                                        <th>Fecha de la compra</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($lista_ventas as $s) :
                                        $codigo = $productos->buscar($s['productos_pro_id']);
                                    ?> <tr>

                                            <td><?= $s['ven_codigo'] ?></td>
                                            <td><?= $codigo['pro_codigo'] ?></td>

                                            <td><?= $s['ven_cantidad'] ?></td>
                                            <td><img width="100px" src="../../resources/images/productos/<?= $codigo['pro_id'] ?>/<?= $codigo['pro_img'] ?>"></td>
                                            <td><?= $s['tipo_armado'] ?></td>
                                            <td><?= $s['create_time'] ?></td>

                                            <!--1 esperando confirmacion 2 pedido confirmado 3 en preparacion 4 En reparto 5 recibido  6 solicitud de cancelacion, 7 cancelado-->
                                            <td> <?php
                                                    if ($s['estados_id'] == 1) {
                                                        echo "<i style='color: orange;' class='fas fa-concierge-bell'> Esperando confirmacion</i>";
                                                    }
                                                    if ($s['estados_id'] == 2) {
                                                        echo "<i style='color: green;' class='fas fa-check-circle'> Confirmado</i>";
                                                    }
                                                    if ($s['estados_id'] == 3) {
                                                        echo "<i style='color: chocolate;' class='fas fa-truck-loading'> En Preparación</i>";
                                                    }
                                                    if ($s['estados_id'] == 4) {
                                                        echo "<i style='color: indigo;' class='fas fa-truck'> En reparto</i>";
                                                    }
                                                    if ($s['estados_id'] == 5) {
                                                        echo "<i style='color: green;' class='fas fa-check-circle'> Recibido</i>";
                                                    }
                                                    if ($s['estados_id'] == 6) {
                                                        echo "<i style='color: red;' class='fas fa-truck'> solicitud de cancelacion</i>";
                                                    }
                                                    if ($s['estados_id'] == 7) {
                                                        echo "<i style='color: red;' class='fas fa-check-circle'> Cancelado</i>";
                                                    }  ?>


                                            </td>

                                            <td>
                                                <?php if ($s['estados_id'] < 5) { ?>

                                                    <div class="dropdown">
                                                        <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Opciones
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <form method="post" action="../../controller/PedidosController.php?accion=cambiar_estado ">
                                                                <input name="codigo" value="<?= $s['ven_codigo'] ?>" type="hidden" class="form-control">

                                                                <button class="dropdown-item">Pasar al siguiente estado</button>
                                                            </form>
                                                            <form method="post" action="../../controller/PedidosController.php?accion=cancelar ">
                                                                <input name="codigo" value="<?= $s['ven_codigo'] ?>" type="hidden" class="form-control">

                                                                <button class="dropdown-item">Cancelar</button>
                                                            </form>
                                                        </div>
                                                    </div>



                                                <?php

                                                } ?>

                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;

                                    ?>




                                </tbody>
                            </table>

                        </div>
                        <!-- form start -->

                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>


                <!-- /.row -->
            </div>
        </div>