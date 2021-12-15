<?php
include_once '../model/Conexion.php';
include_once '../model/Categorias.php';
$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'guardar':
        $categorias = new Categorias();
        $categorias->__set('cat_id', 0);
        $categorias->__set('cat_nombre', $_REQUEST['nombre']);
        $categorias->__set('cat_estado', $_REQUEST['estado']);
        $categorias->__set('create_time', date("Y-m-d H:i:s"));
        $categorias->__set('update_time', date("Y-m-d H:i:s"));
        $categorias->__set('imagen', $_FILES['imagen']['name']);

        $archivo_modelo = $_FILES['imagen']['tmp_name']; // obtiene el archivo
        $ruta = "../resources/images/categorias";
        $ruta_modelo = $ruta . "/" . $categorias->__get('imagen'); //imagen/imagen.tipo    
        if (move_uploaded_file($archivo_modelo, $ruta_modelo)) {
            echo "agregado";
        } else {
            echo "error";
        }
        $res = $categorias->agregar();
        /*   echo "<script type='text/javascript'>window.location.href = '../views/admin/index.php?param=categorias';</script>"; */
        echo $res;
        break;

    case 'modificar':
        $imagen = $_FILES['imagen_new']['name'];
        echo $imagen;
        $categorias = new Categorias();
        $categorias->__set('cat_id', $_REQUEST['id']);
        $categorias->__set('cat_nombre', $_REQUEST['nombre']);
        $categorias->__set('cat_estado', $_REQUEST['estado']);

        if ($imagen == "") {
            $categorias->__set('imagen', $_REQUEST['imagen']);
        } else {
            $nombre = $_FILES['imagen_new']['tmp_name'];
            echo $nombre;
            $categorias->__set('imagen', $_FILES['imagen_new']['name']);
            $archivo_modelo = $_FILES['imagen_new']['tmp_name']; 
            $ruta = "../resources/images/categorias";
            $ruta_modelo = $ruta . "/" . $categorias->__get('imagen_new');   
            if (move_uploaded_file($archivo_modelo, $ruta_modelo)) {
                echo "agregado";
            } else {
                echo "error";
            }
        }

        $categorias->__set('update_time', date("Y-m-d H:i:s"));

        $res = $categorias->modificar();
        echo $res;
         if ($res == 1) {
            echo "<script type='text/javascript'>window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=categorias';</script>";
        } else {
        }


        break;
}
