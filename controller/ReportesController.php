<?php
include_once '../model/Conexion.php';
include_once '../model/Ventas.php';
$accion = $_REQUEST['accion'];
switch ($accion) {
    case 'reporte_personalizado':
        $ventas = new Ventas();

        $fecha_inicial = $_REQUEST['f_ini'];
        $fecha_final = $_REQUEST['f_fin'];

        if ($fecha_inicial == "" || $fecha_final == "") {
            echo "<script type='text/javascript'>";
            echo "window.location.href = '../views/admin/index.php?param=reportes_ventas'";
            echo "</script>";
        } else {

            if ($fecha_final > $fecha_inicial) {
                /*  $reporte = $ventas->reporte_entre_fecha($fecha_final, $fecha_inicial); */
                echo "<script type='text/javascript'>";
                echo "window.location.href = '../views/admin/reportes/reporte_personalizado.php?fecha_inicio=$fecha_inicial&&fecha_final=$fecha_final'";
                echo "</script>";
                echo "<script type='text/javascript'>";
                echo "window.location.href = '../views/admin/index.php'";
                echo "</script>";
            } else {
                /* $reporte = $ventas->reporte_entre_fecha($fecha_inicial, $fecha_final); */
                echo "<script type='text/javascript'>";
                echo "window.location.href = '../views/admin/reportes/reporte_personalizado.php?fecha_inicio=$fecha_final&&fecha_final=$fecha_inicial'";
                echo "</script>";
            }
        }

        break;
    case 'kardex':

        include_once '../model/Productos.php';
        include_once '../model/Kardex.php';
        $kardex = new Kardex();
        $productos = new Productos();
        $codigo = $_REQUEST['codigo'];
        $codigo = str_replace(' ', '', $codigo);
        $id = $productos->buscar_id($codigo);
        if (!empty($id)) {
            echo "<script type='text/javascript'>";
            echo "window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=kardex_resultado&codigo=$id[0]'";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=kardex'";
            echo "</script>";
        }





        break;
}
