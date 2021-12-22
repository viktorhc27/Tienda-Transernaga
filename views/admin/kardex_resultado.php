<?php
include_once '../../model/Conexion.php';
include_once '../../model/Kardex.php';
include_once '../../model/Productos.php';
$kardex = new Kardex();
$productos = new Productos();

$kardex->__set('id', $_REQUEST['codigo']);
$ed = $_REQUEST['codigo'];
$lista = $kardex->kardex();
$ka = $kardex->lista_kardex($ed);
/* echo "<pre>";
print_r($ka);
echo "</pre>"; */
?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kardex</li>
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
                            <h3 class="card-title ">Kardex por producto</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-striped table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th colspan="3">Entradas</th>
                                        <th colspan="3">Salidas</th>
                                    </tr>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Costo Unitario</th>
                                        <th>Costo Total</th>
                                        <th>Unidades vendidas</th>
                                        <th>Costo por venta </th>
                                        <th>Ganancia</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th></th>
                                        <td class="text-center"><?= $lista['pro_stock'] ?></td>
                                        <td class="text-center"><?= number_format($lista['pro_precio_compra']) ?></td>
                                        <td class="text-center"><?= number_format($lista['costo_total']) ?></td>
                                        <td class="text-center"><?= ($lista['unidades vendidas'] == "") ? "0" : $lista['unidades vendidas'] ?></td>

                                        <td class="text-center"><?= number_format($lista['costopor venta']) ?></td>
                                        <td class="text-center"><?= number_format($lista['ganancia']) ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="card card-default">

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-striped table-bordered table-hover">



                                <thead class="text-center">

                                    <tr>
                                        <th>Fecha</th>
                                        <th>Unidades</th>
                                        <th>Descripcion</th>
                                        <th>Tipo</th>
                                        <th>Producto </th>
                                        <th>saldo </th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    if (!empty($ka)) {

                                        foreach ($ka as $k) :
                                            $prod= $productos->buscar($k['pro_id']);
                                    ?>

                                            <tr>
                                                <td class="text-center"><?= $k['fecha'] ?></td>
                                                <td class="text-center"><?= $k['unidades'] ?></td>
                                                <td class="text-center"><?= $k['descripcion'] ?></td>
                                                <td class="text-center"><?= $k['tipo'] ?></td>
                                                <td class="text-center"><?= $prod['pro_codigo'] ?></td>
                                                <td class="text-center"><?= number_format($k['saldo']) ?></td>

                                            </tr>
                                        <?php endforeach;
                                    } else { ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No Hay Registro del Producto</td>


                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <!-- form start -->

                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>


            <!-- /.row -->
        </div>
</div>