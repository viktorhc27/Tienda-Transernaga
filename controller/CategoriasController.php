<?php
include_once '../model/Conexion.php';
include_once '../model/Categorias.php';
$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'guardar':
       

        $p = $_REQUEST['nombre'];
        $categorias = new Categorias();
        $categorias->__set('cat_id', 0);
        $categorias->__set('cat_nombre', $_REQUEST['nombre']);
        $categorias->__set('cat_estado', $_REQUEST['estado']);
        $categorias->__set('create_time', date("Y-m-d H:i:s"));
        $categorias->__set('update_time', date("Y-m-d H:i:s"));
      
        $res = $categorias->agregar();

        echo "<script type='text/javascript'>window.location.href = '../views/admin/index.php?param=categorias';</script>";
        echo $res;
        break;
}
