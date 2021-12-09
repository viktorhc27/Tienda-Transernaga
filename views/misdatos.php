<?php
include_once './model/Usuarios.php';
include_once './model/Conexion.php';
include_once './model/Direcciones.php';
include_once './model/DireccionesUsuarios.php';
$usuarios = new Usuarios();
$datos = $usuarios->buscar($_SESSION['user']['id']);

$direcciones = new Direccionesusuarios();
$direccion = $direcciones->direccion_usuarios($datos['us_id']);


?>
<section class="section-content padding-y bg">
    <div class="container">

        <!-- =========================  COMPONENT MYORDER 1 ========================= -->
        <div class="row">
            <aside class="col-md-3">
                <!--   SIDEBAR   -->
                <ul class="list-group">
                    <a class="list-group-item active" href="?param=misdatos"> Mis datos</a>
                    <a class="list-group-item " href="?param=mispedidos">Mis Pedidos</a>
                </ul>
                <br>
                <a class="btn btn-light btn-block" href="#"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a>
                <!--   SIDEBAR .//END   -->
            </aside>
            <main class="col-md-9">
                <article class="card">
                    <header class="card-header">
                        <strong class="d-inline-block mr-3">Mis Datos</strong>

                    </header>
                    <div style="padding-left:10%" class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <label> Nombre : <?= $datos['us_nombre'] ?> </label>
                                <br>
                                <label> Apellidos : <?= $datos['us_apellApp'] ?> </label> <?= $datos['us_apellApm'] ?> </label>
                                <br>
                                <label> Correo : <?= $datos['us_correo'] ?> </label> </label>
                                <br>
                                <label> Sexo : <?= $datos['us_sexo'] ?> </label> </label>
                            </div>
                            <div class="col-md-6">
                                <label> Direccion (s) : </label><br>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>act</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($direccion as $dir) : ?>

                                            <tr>
                                                <td><?= $dir['di_nombre'] ?></td>
                                                <td>
                                                    <form  method="post" action="./controller/UsuariosController.php?accion=eliminar_direccion">
                                                        <input type="hidden" name="us_id" value="<?= $datos['us_id'] ?>">
                                                        <input type="hidden" name="di_id" value="<?= $dir['direcciones_di_id']?>">
                                                        <button  class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>





                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <br>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Nueva direccion</button>
                            </div>

                        </div>

                    </div>
                </article>

        </div>

        </article> <!-- order-group.// -->
        </main>
    </div> <!-- row.// -->
    </div>

</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="./controller/UsuariosController.php?accion=agregar_direccion">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva direccion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="buscador form-group">
                        <label>Direccion</label>
                        <input id="dir" name="direccion" type="text" class="form-control">
                    </div>
                    <div id="mapa-geocoder" style="width: 100%;" class="form-group mapa"></div>
                    <input type="hidden" name="id" value="<?= $datos['us_id'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Agregar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- <script>
    function eliminar(id_user, id_direccion) {
        $('#eliminar-form').setAttribute('action', './controller/UsuariosController.php?accion=eliminar_direccion');
    }
</script> -->
<script>
    $(document).ready(function() {
        $(window).on("load resize", function() {
            var alturaBuscador = $(".buscador").outerHeight(true),
                alturaVentana = $(window).height(),
                alturaMapa = alturaVentana - alturaBuscador;

            $("#mapa-geocoder").css("height", "500" + "px");

        });
    });

    function localizar(elemento, direccion) {
        var geocoder = new google.maps.Geocoder();

        var map = new google.maps.Map(document.getElementById(elemento), {
            zoom: 16,
            scrollwheel: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        geocoder.geocode({
            'address': direccion
        }, function(results, status) {
            if (status === 'OK') {
                var resultados = results[0].geometry.location,
                    resultados_lat = resultados.lat(),
                    resultados_long = resultados.lng();
                /* console.log(resultados_lat);
                console.log(resultados_long); */

                $(".buscador").append("<input type='hidden' name='latitud' id='latitud' value='" + resultados_lat + "'>");
                $(".buscador").append("<input type='hidden' name='longitud' id='longitud' value='" + resultados_long + "'>");

                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                var mensajeError = "";
                if (status === "ZERO_RESULTS") {
                    mensajeError = "No hubo resultados para la dirección ingresada.";
                } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
                    mensajeError = "Error general del mapa.";
                } else if (status === "INVALID_REQUEST") {
                    mensajeError = "Error de la web. Contacte con Name Agency.";
                }
                alert(mensajeError);
            }
        });
    }

    $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyCenp6Eupizf2ow5uX1NgMkZhMz-LtwOQQ", function() {
        $("#dir").change(function() {
            var dir = $("#dir").val();
            var direccion = dir + ", Arica y Parinacota"

            if (direccion !== "") {
                localizar("mapa-geocoder", direccion);
            }
        });
    });
</script>