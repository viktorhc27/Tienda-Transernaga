<?php
include_once '../model/Conexion.php';
include_once "../model/ProductoStocks.php";
include_once "../model/Productos.php";
include_once "../model/Kardex.php";
$accion = $_REQUEST['accion'];

switch ($accion) {
    case "guardar":
        session_start();

        $prostock = new ProductoStock();
        $producto = new Productos();
        $kardex = new Kardex();



        //producto stock
        $prostock->__set('productos_pro_id',      $_REQUEST['id']);
        $prostock->__set('usuarios_us_id',           $_SESSION['user']['id']);
        $prostock->__set('cantidad',      $_REQUEST['cantidad']);
        $prostock->__set('documento',            $_FILES['documento']['name'][0]);
        $prostock->__set('create_time',           date("Y-m-d H:i:s"));
        $prostock->__set('update_time',           date("Y-m-d H:i:s"));

        //Kardex

        $kardex->__set('tipo', "ENTRADA");
        $kardex->__set('descripcion', 'AGREGADO MEDIANTE REGISTRO');
        $kardex->__set('unidades', $_REQUEST['cantidad']);
        $kardex->__set('fecha', date("Y-m-d H:i:s"));
        $kardex->__set('pro_id', $_REQUEST['id']);

        $registro_kar = $kardex->agregar();
        $documento = $_FILES['documento']['tmp_name'][0];
        $ruta = "../resources/images/documento";
        $ruta_doc = $ruta . "/" . $_FILES['documento']['name'][0];
        move_uploaded_file($documento, $ruta_doc);
        $res = $prostock->agregar();
        $e = $producto->agregar_stock($prostock->__get('productos_pro_id'), $prostock->__get('cantidad'));


        echo $registro_kar;
        if ($res == 1 && $e == 1) {
            echo "<script>";
            echo "location.href='../views/admin/index.php?param=stock'";
            echo "</script>";
        }

        break;
    case "quitar":
        session_start();
        $kardex = new Kardex();
        $prostock = new ProductoStock();
        $producto = new Productos();

        $prostock->__set('productos_pro_id',      $_REQUEST['producto']);
        $prostock->__set('usuarios_us_id',        $_SESSION['user']['id']);
        $prostock->__set('cantidad',              $_REQUEST['cantidad']);
        $prostock->__set('documento',             "-");
        $prostock->__set('create_time',           date("Y-m-d H:i:s"));
        $prostock->__set('update_time',           date("Y-m-d H:i:s"));

        $negativo = "-" . $prostock->__get('cantidad');

        $e = $producto->verificar_stock($prostock->__get('cantidad'), $prostock->__get('productos_pro_id'));


        //Kardex

        $kardex->__set('tipo', "SALIDA");
        $kardex->__set('descripcion', 'SALIDA POR SISTEMA ADM');
        $kardex->__set('unidades', $_REQUEST['cantidad']);
        $kardex->__set('fecha', date("Y-m-d H:i:s"));
        $kardex->__set('pro_id', $_REQUEST['producto']);

        $registro_kar = $kardex->agregar();

        echo $e;
        if ($e) {
            $res = $prostock->quitar($negativo);
            if ($res == 1) {

                echo "<script>";
                echo "location.href='../views/admin/index.php?param=stock'";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "location.href='../views/admin/index.php?param=stock'";
            echo "</script>";
        }



        break;
}
