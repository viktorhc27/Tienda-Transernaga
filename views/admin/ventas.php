<?php
include_once '../../model/Ventas.php';

$ventas = new Ventas();

$lista_ventas = $ventas->leer();

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas</li>
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
                            <h3 class="card-title ">Ventas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Codigo Venta</th>
                                        <th>Comprador</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Tipo armado</th>
                                        <th>Fecha de la compra</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($lista_ventas as $s) :
                                    ?> <tr>

                                            <td><?= $s['ven_codigo'] ?></td>
                                            <td><?= $s['usuarios_us_id'] ?></td>
                                            <td><?= $s['productos_pro_id'] ?></td>
                                            <td><?= $s['ven_cantidad'] ?></td>
                                            <td><?= $s['tipo_armado'] ?></td>
                                            <td><?= $s['create_time'] ?></td>

                                            <!--0 esperando confirmacion 1 pedido confirmado 2 en preparacion 3 En reparto 4 recibido  5 solicitud de cancelacion, 6 cancelado-->
                                            <td> <?php
                                                    if ($s['estado'] == 0) {
                                                        echo "<i style='color: orange;' class='fas fa-concierge-bell'> Esperando confirmacion</i>";
                                                    }
                                                    if ($s['estado'] == 1) {
                                                        echo "<i style='color: green;' class='fas fa-check-circle'> Confirmado</i>";
                                                    }
                                                    if ($s['estado'] == 2) {
                                                        echo "<i style='color: chocolate;' class='fas fa-truck-loading'> En Preparación</i>";
                                                    }
                                                    if ($s['estado'] == 3) {
                                                        echo "<i style='color: indigo;' class='fas fa-truck'> En reparto</i>";
                                                    }
                                                    if ($s['estado'] == 4) {
                                                        echo "<i style='color: green;' class='fas fa-check-circle'> Recibido</i>";
                                                    }
                                                    if ($s['estado'] == 5) {
                                                        echo "<i style='color: red;' class='fas fa-truck'> solicitud de cancelacion</i>";
                                                    }
                                                    if ($s['estado'] == 6) {
                                                        echo "<i style='color: red;' class='fas fa-check-circle'> Cancelado</i>";
                                                    }  ?>


                                            </td>

                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <button class="dropdown-item" type="button">Modificar</button>
                                                        <button class="dropdown-item" type="button">Ver</button>
                                                        <button class="dropdown-item" type="button">Desabilitar</button>
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
                        <!-- form start -->

                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>


                <!-- /.row -->
            </div>
        </div>