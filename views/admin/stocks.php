<?php
include_once '../../model/Conexion.php';
include_once '../../model/Productos.php';
include_once '../../model/ProductoStocks.php';
include_once '../../model/Usuarios.php';

$productos = new Productos();
$usuarios = new Usuarios();
$prostock = new ProductoStock();

$prod = $productos->leer();
$prostock = $prostock->leer();

?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <form method="post" action="../../controller/ProductosStockController.php?accion=guardar" enctype="multipart/form-data">
                    <h5 class="card-header">
                        Agregar Stock
                    </h5>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Selecciones el Producto</label>
                                <select id="producto" name="producto" class="form-control">
                                    <option>Seleccione</option>
                                    <?php foreach ($prod as $pro) : ?>
                                        <option value="<?= $pro['pro_id'] ?>"><?= $pro['pro_codigo'] ?></option>


                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Imagen del Producto</label>
                                <div id="imagen">

                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Documento de compra</label>

                                <input name="documento" type="file" class="form-control">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Cantidad</label>

                                <input name="cantidad" type="number" class="form-control">

                            </div>
                        </div>




                    </div>
                    <div class="card-footer">
                        <button class="btn btn-warning">Agregar</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-md-7">
            <div class="card ">
                <h5 class="card-header">
                    Historial de Stocks
                </h5>
                <div class="card-body">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Quitar unidades</button>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>

                                <th>Autor de la Accion</th>
                                <th>Producto</th>
                                <th>Factura</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <!-- <th>Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($prostock as $dato) :
                                $us = $usuarios->buscar($dato['usuarios_us_id']);
                                $pro = $productos->buscar($dato['productos_pro_id']);
                            ?>
                                <tr>
                                    <td><?= $us['us_nombre'] . " " . $us['us_apellApp'] ?></td>
                                    <td><?= $pro['pro_codigo'] ?></td>
                                    <td>
                                        <?php
                                        if ($dato['documento'] == "-") {
                                            echo "sin Factura";
                                        } else { ?>
                                            <a href="../../resources/images/documento/<?= $dato['documento'] ?>" class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i></a>

                                        <?php }




                                        ?>



                                    </td>
                                    <td><?= $dato['cantidad'] ?></td>
                                    <td><?= $dato['create_time'] ?></td>
                                    <!--  -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>





                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="../../controller/ProductosStockController.php?accion=quitar">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Quitar Unidades</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Selecciones el Producto</label>
                            <select id="quitar" name="producto" class="form-control">
                                <option>Seleccione</option>
                                <?php foreach ($prod as $pro) : ?>
                                    <option value="<?= $pro['pro_id'] ?>"><?= $pro['pro_codigo'] ?></option>


                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Cantidad</label>

                            <input name="cantidad" type="number" class="form-control">
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-6">

                            <label>Imagen del Producto</label>
                            <div id="imagen2">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger">Quitar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#producto").change(function() {

        var id = $("#producto").val();
        if (id != "") {
            datos = {
                "id": id
            }
            $.ajax({
                url: "../../controller/ProductosController.php?accion=buscar",
                type: "POST",
                data: datos,
            }).done(function(respuesta) {
                if (id != "") {
                    $("#imagen").html("<img width='100%' src='../../resources/images/productos/" + id + "/" + respuesta.imagen + "'/>");
                }


            })

        }

    });
    $("#quitar").change(function() {

        var id = $("#quitar").val();
        if (id != "") {
            datos = {
                "id": id
            }
            $.ajax({
                url: "../../controller/ProductosController.php?accion=buscar",
                type: "POST",
                data: datos,
            }).done(function(respuesta) {
                if (id != "") {
                    $("#imagen2").html("<img width='100%' src='../../resources/images/productos/" + id + "/" + respuesta.imagen + "'/>");
                }


            })

        }

    })
</script>