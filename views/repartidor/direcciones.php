<?php

include_once '../../model/Ventas.php';
include_once '../../model/Usuarios.php';
include_once '../../model/Productos.php';
include_once '../../model/Direcciones.php';
include_once '../../model/DireccionesUsuarios.php';

$id = $_REQUEST['id_pedidos'];
$id_usuario = $_REQUEST['id_usuario'];

$ventas = new Ventas();
$usuarios = new Usuarios();
$productos = new Productos();
$direccion = new Direcciones();
$direccion_usuarios = new DireccionesUsuarios();

$pedido = $ventas->buscar($id);
$datos_usuarios = $usuarios->buscar($id_usuario);
$direccion_usuarios= $direccion_usuarios->buscar($id_usuario);

?>
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos a entrega</li>
            </ol>
        </nav>

        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Productos a entrega</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>

                                        <?php foreach ($pedido as $p) :
                                            $var = $productos->buscar($p['productos_pro_id']);
                                        ?>
                                            <tr>
                                                <td>

                                                    <img width="100px" src="../../resources/images/productos/<?= $var['pro_id'] ?>/<?= $var['pro_img'] ?>" class="img-xs border">
                                                </td>
                                                <td>
                                                    <p class="title mb-0"><?= $var['pro_nombre'] ?></p>
                                                    <var class="price text-muted">Cantidad <?= $p['ven_cantidad'] ?></var><br>

                                                </td>
                                                <td> Estado
                                                    <br>
                                                    <?php
                                                    if ($p['estados_id'] == 1) {
                                                        echo "<i style='color: orange;' class='fas fa-concierge-bell'> Esperando confirmacion</i>";
                                                    }
                                                    if ($p['estados_id'] == 2) {
                                                        echo "<i style='color: green;' class='fas fa-check-circle'> Confirmado</i>";
                                                    }
                                                    if ($p['estados_id'] == 3) {
                                                        echo "<i style='color: chocolate;' class='fas fa-truck-loading'> En Preparación</i>";
                                                    }
                                                    if ($p['estados_id'] == 4) {
                                                        echo "<i style='color: indigo;' class='fas fa-truck'> En reparto</i>";
                                                    }
                                                    if ($p['estados_id'] == 5) {
                                                        echo "<i style='color: green;' class='fas fa-check-circle'> Recibido</i>";
                                                    }
                                                    if ($p['estados_id'] == 6) {
                                                        echo "<i style='color: red;' class='fas fa-truck'> solicitud de cancelacion</i>";
                                                    }
                                                    if ($p['estados_id'] == 7) {
                                                        echo "<i style='color: red;' class='fas fa-check-circle'> Cancelado</i>";
                                                    }  ?>


                                                </td>
                                                <td> <a href="?param=detalles&amp;id=TR61ABBF23C6CFA" class="btn btn-light"> Detalles </a> </td>
                                            </tr>
                                        <?php endforeach; ?>


                                    </tbody>
                                </table>



                            </div>
                        </div>
                        <!-- form start -->

                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Datos del cliente</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label style="color:chocolate;">Nombre del cliente</label>
                                    <br>
                                    <?= $datos_usuarios['1'] . " " . $datos_usuarios['2'] . " " . $datos_usuarios['3'] ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="color:chocolate;">Direccion</label>
                                    <br>
                                    <?= $datos_usuarios['us_direccion'] ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="color:chocolate;">Telefono</label>
                                    <br>
                                    <?= $datos_usuarios['1'] . " " . $datos_usuarios['2'] . " " . $datos_usuarios['3'] ?>
                                </div>


                            </div>


                            <div class="row">
                                <input type="hidden" id="lat" value="-18.481258">
                                <input type="hidden" id="long" value="-70.294499">
                                <div id="map" class="col-md-12">

                                </div>

                            </div>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>

                <!-- /.row -->
            </div>
        </div>

        <script>
            function iniciarMap() {
                var lat = parseFloat($("#lat").val());
                var long = parseFloat($("#long").val());
                console.log(lat, long);

                var coord = {
                    lat: lat,
                    lng: long
                };
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: coord
                });
                var marker = new google.maps.Marker({
                    position: coord,
                    map: map
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCenp6Eupizf2ow5uX1NgMkZhMz-LtwOQQ&callback=iniciarMap"></script>