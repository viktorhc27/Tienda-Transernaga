<?php
include_once '../../model/Ventas.php';
$ventas = new Ventas();
$hoy2 = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
$reporte = $ventas->Reportes_total($hoy2);
/* echo"<pre>";
print_r($reporte);
echo"</pre>"; */
$hoy = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
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
                <div class="col-md-12 ">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Reportes Ventas</h3>
                        </div>

                        <div class="card-body ">
                            <h3 class="text-center">Estadisticas de Ventas de hoy(<?= $hoy ?>)</h3>
                            <form method="post" action="./reportes/reporte_ventas.php">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>

                                                <th>VENTAS REALIZADAS</th>

                                                <th>TOTAL EN VENTAS</th>
                                                <th>COSTO DE VENTAS</th>
                                                <th>GANANCIAS</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $reporte["0"]["0"] ?></td>
                                                <td><?= $reporte["0"]["1"] ?></td>
                                                <td><?= $reporte["0"]["2"] ?></td>
                                                <td><?= $reporte["0"]["3"] ?></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-success"><i class="fas fa-print"></i>|Imprimir</button>
                                </div>
                            </form>

                            <br>
                            <hr>
                            <h3 class="text-center">Generar Reporte Personalizado</h3>
                            <form method="post" action="../../controller/ReportesController.php?accion=reporte_personalizado">
                                <div class="form-row text-center">
                                    <div class="form-group col-md-6">
                                        <label>Fecha Inicial</label>
                                        <input type="date" name="f_ini" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label">Fecha Final</label>
                                            <input type="date" name="f_fin" class="form-control">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-success"><i class="fas fa-print"></i>|Imprimir</button>
                                </div>
                            </form>


                        </div>


                    </div>

                </div>

            </div>

        </div>
</div>