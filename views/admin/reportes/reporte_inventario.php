<?php
include_once "../../../model/Conexion.php";
include_once "../../../model/Productos.php";
$Productos = new Productos();
$orden = $_REQUEST['orden'];
$hoy = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
$lista = $Productos->reporte_inventario($orden);

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
                <h1 class="h6">REPORTE DE INVENTARIO GENERAL (<?= $hoy ?>)</h1>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Stock</th>

                        </tr>
                    </thead>

                    <?php foreach ($lista as $inv) : ?>
                        <tr>
                            <td></td>


                            <td><?= $inv['pro_codigo'] ?> </td>
                            <td><?= $inv['pro_nombre'] ?></td>
                            <td><?= $inv['pro_stock'] ?></td>
                        </tr>
                    <?php endforeach; ?>
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
$dompdf->stream("Reporte_inventario.pdf", array("Attachment" => true));
/* $dompdf->stream("archivo.pdf", array("Attachment" => false)); */

/* header('Location:http://localhost/tienda-transernaga/index.php?param=inicio'); */
?>