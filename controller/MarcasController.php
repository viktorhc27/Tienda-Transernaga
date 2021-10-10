<?php
include_once '../model/Conexion.php';
include_once '../model/Marcas.php';
$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'guardar':
        $archivo_img = $_FILES['imagen']['tmp_name']; // obtiene el archivo

        $p = $_REQUEST['nombre'];
        $marcas = new Marcas();
        $marcas->__set('mar_id', 0);
        $marcas->__set('mar_nombre', $_REQUEST['nombre']);
        $marcas->__set('mar_imagen', $_FILES['imagen']['name']);
        $marcas->__set('create_time', date("Y-m-d H:i:s"));
        $marcas->__set('update_time', date("Y-m-d H:i:s"));
        //imagenes
        $ruta = "../resources/images/marcas";
        $ruta_img = $ruta . "/" . $marcas->__get('mar_imagen'); //imagen/imagen.tipo       

        move_uploaded_file($archivo_img, $ruta_img);
        $res = $marcas->agregar();

        echo $p;
        echo $res;
        break;
}
