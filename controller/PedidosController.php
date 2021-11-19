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
            echo "window.location.href = 'http://localhost/tienda-transernaga/views/ensamblador/index.php?param=inicio'";
            echo "</script>";
        } else {
            echo "error";
        }

    break;
}
