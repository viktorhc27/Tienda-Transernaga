<?php


session_start();
include_once "../model/Conexion.php";
include_once "../model/Usuarios.php";
include_once "../model/Productos.php";
$us = new Usuarios();
$pro= new Productos();
$dato_cliente = $us->buscar($_SESSION['user']['id']);


//================================================================================================
$cliente = $dato_cliente['us_nombre'] . " " . $dato_cliente['us_apellApp'] . " " . $dato_cliente['us_apellApm'];
$remitente = "Jefe";
$web = "Tienda-Muebles transernaga";
$mensajePie = "Gracias por su compra";
$numero = 1;
$descuento = 0;
$porcentajeImpuestos = 18;
$productos = $_SESSION['cart'];


$fecha = date("Y-m-d");
ob_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Bootstrap4 files-->
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/tienda-transernaga/resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="http://<?php echo $_SERVER['HTTP_HOST'];?>/tienda-transernaga/resources/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
  
    <title>Factura</title>
</head>
<style>
	@page {
		margin-left: 0;
		margin-right: 0;
	}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <img width="250px" class="img-fluid" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/tienda-transernaga/resources/images/logo-muebles.png" alt="Logotipo">
            </div>
            <div style="float: right;" class="col-md-2">
               
            </div>
        </div>
        <hr>
        <div class="row"> 
            <div class="col-md-10">
                <h1 class="h6"><?php echo $remitente ?></h1>
                <h1 class="h6"><?php echo $web ?></h1>
            </div>
            <div  style="float: right;" class="col-md-2 text-center">
                <strong>Fecha</strong>
                <br>
                <?php echo $fecha ?>
                <br>
                <strong>Factura No.</strong>
                <br>
                <?php echo $numero ?>
            </div>
        </div>
        <hr>
        <div class="row " >
            <div class="col-md-6 text-center">
                <h1 class="h2">Cliente</h1>
                <p><?php echo $cliente ?></p>
            </div>
            <div  style="float: right;" class="col-md-6 text-center">
                <h1 class="h2">Remitente</h1>
                <p><?php echo $remitente ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $subtotal = 0;
                        foreach ($productos as $p) {
                            $dato_producto = $pro->buscar( $p["id_producto"]); 
                            $totalProducto = $p["cantidad"] * $dato_producto['pro_precio_venta'];
                            $subtotal += $totalProducto; 
                        ?>
                            <tr>
                                <td>#</td>
                                <td><?= $dato_producto['pro_nombre'] ?></td>
                                <td><?= $p["cantidad"]?></td>
                                <td>$<?= $dato_producto['pro_precio_venta']  ?></td>
                                <td>$<?= number_format($totalProducto, 0) ?></td>
                            </tr>
                        <?php }
                        $subtotalConDescuento = $subtotal - $descuento;
                        $impuestos = $subtotalConDescuento * ($porcentajeImpuestos / 100);
                        $total = $subtotalConDescuento + $impuestos;
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">Subtotal</td>
                            <td>$<?php echo number_format($subtotal, 0) ?></td>
                        </tr>
                      
                    
                        <tr>
                            <td colspan="4" class="text-right">Impuestos</td>
                            <td>$<?php echo number_format($impuestos, 0) ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h4>$<?php echo number_format($total, 0) ?></h4>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="h5"><?php echo $mensajePie ?></p>
            </div>
        </div>
    </div>
</body>

</html>

<?php

$html= ob_get_clean();

/* echo $html; */

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../resources/Dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4');

$dompdf->render();
$dompdf->stream("archivo.pdf",array("Attachment"=>false));
?>