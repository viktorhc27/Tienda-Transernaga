<?php
include_once '../model/Conexion.php';
include_once '../model/Categorias.php';
include_once '../model/Productos.php';
$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'guardar':

        $categorias = new Categorias();
        $categorias->__set('cat_id', 0);
        $categorias->__set('cat_nombre', $_REQUEST['nombre']);
        $categorias->__set('cat_estado', $_REQUEST['estado']);
        $categorias->__set('create_time', date("Y-m-d H:i:s"));
        $categorias->__set('update_time', date("Y-m-d H:i:s"));
        $categorias->__set('imagen', $_FILES['imagen']['name'][0]);

        $archivo_modelo = $_FILES['imagen']['tmp_name'][0]; // obtiene el archivo
        $ruta = "../resources/images/categorias";
        $ruta_modelo = $ruta . "/" . $categorias->__get('imagen'); //imagen/imagen.tipo    
        if (move_uploaded_file($archivo_modelo, $ruta_modelo)) {
            $res = $categorias->agregar();
            header('Content-Type:apllication/json');
            if ($res == 1) {
                $datos = array(
                    'datos' => 'hecho'
                );
            }
            echo json_encode($datos, JSON_FORCE_OBJECT);
        } else {
            echo "error";
        }


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

    case 'cambiar_estado':
        $id = $_REQUEST['id'];
        $categorias = new Categorias();
        $productos = new Productos();

        $res = $categorias->cambiar_estado($id);

        $list = $categorias->buscar($id);

        if ($list['cat_estado'] == 1) {
            $productos->activar($id);
        } else {
            $productos->desactivar($id);
        }
        /*    print_r($list['cat_estado']); */

        if ($res) {
            echo "<script type='text/javascript'>window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=categorias';</script>";
        } else {
            echo "<script type='text/javascript'>window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=categorias';</script>";
        }

        break;
}
