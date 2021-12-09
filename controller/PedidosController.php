<?php
include_once '../model/Conexion.php';
include_once '../model/Ventas.php';
$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'cambiar_estado':
        $ventas = new Ventas();
        $ventas->__set('ven_codigo', $_REQUEST['codigo']);
        $res = $ventas->cambiar_estado();

        if ($res = 1) {
            echo "<script type='text/javascript'>";
            echo "window.location.href = 'http://localhost/tienda-transernaga/views/ensamblador/index.php?param=pedidos_pendientes'";
            echo "</script>";
        } else {
            echo "error";
        }

        break;
    case 'cambiar_estado_repartidor':
        $ventas = new Ventas();
        $ventas->__set('ven_codigo', $_REQUEST['codigo']);
        
        $res = $ventas->cambiar_estado();
        echo $res;

        if ($res = 1) {
            echo "<script type='text/javascript'>";
            echo "window.location.href = 'http://localhost/tienda-transernaga/views/repartidor/index.php?param=pedidos'";
            echo "</script>";
        } else {
            echo "error";
        }

        break;
}
