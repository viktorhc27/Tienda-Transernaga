<?php
include_once "../../../model/Conexion.php";
include_once "../../../model/Ventas.php";
$ventas = new Ventas();
$fecha_inicio = $_REQUEST['fecha_inicio'];
$fecha_fin = $_REQUEST['fecha_final'];

$dato_reporte = $ventas->reporte_entre_fecha($fecha_inicio, $fecha_fin);


/* include_once "../model/Conexion.php"; */

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once('../../../resources/Dompdf/autoload.inc.php');

ob_start(); 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Bootstrap4 files-->
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tienda-transernaga/resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tienda-transernaga/resources/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">

    <title>Reporte Ventas</title>
</head>
<style>
    @page {
        margin-left: 0;
        margin-right: 0;
    }

    #codigo {
        padding-right: -20px;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <img width="250px" class="img-fluid" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/tienda-transernaga/resources/images/logo-muebles.png" alt="Logotipo">
            </div>
            <div style="float: right;" class="col-md-4">
                <br>
                <strong>Tienda-Muebles transernaga.</strong>
                <br>
                <strong>Telefono: 9 3453 5432.</strong>
                <br>

            </div>
        </div>
        <br>
        <br>
        <br>

        <hr>
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="h6">Reportes de Ventas del <?= date("d-m-Y", strtotime($fecha_inicio)) ?> a <?= date("d-m-Y", strtotime($fecha_fin)) ?></h1>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ventas Realizadas</th>
                            <th>Total de Ventas</th>
                            <th>Costos de Ventas</th>
                            <th>Ganancias</th>
                        </tr>
                    </thead>

                    <tr>
                        <td></td>
                        <td><?= $dato_reporte[0]['cantidad_ventas'] ?></td>

                        <td>$ <?= number_format($dato_reporte[0]['total_ventas'], 0)  ?> </td>
                        <td>$ <?= number_format($dato_reporte[0]['2'], 0)   ?></td>
                        <td>$ <?= number_format( $dato_reporte[0]['ganancias'], 0)  ?></td>
                    </tr>

                    </tbody>


            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="h5"></p>
            </div>
        </div>
    </div>
</body>

</html>

<?php

$html = ob_get_clean();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4');
$dompdf->render();
$dompdf->stream("Reporte.pdf", array("Attachment" => true));

/* header('Location:http://localhost/tienda-transernaga/index.php?param=inicio'); */
?>