<?php
include_once '../../model/Conexion.php';
include_once '../../model/Kardex.php';
$kardex = new Kardex();

$kardex->__set('id', $_REQUEST['codigo']);
$lista = $kardex->kardex();
/* echo "<pre>";
print_r($lista);
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
                                <caption>Kardex del Producto</caption>

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
                                        <td><?= $lista['pro_stock'] ?></td>
                                        <td><?= number_format($lista['pro_precio_compra']) ?></td>
                                        <td><?= number_format($lista['costo_total']) ?></td>
                                        <td><?= ($lista['unidades vendidas'] == "null")?"0":$lista['unidades vendidas'] ?></td>
                                        <td><?= number_format($lista['costopor venta']) ?></td>
                                        <td><?= number_format($lista['ganancia']) ?></td>
                                    </tr>

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