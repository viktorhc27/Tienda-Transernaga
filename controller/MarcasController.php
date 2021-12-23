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
        $marcas->__set('mar_imagen', $_FILES['imagen']['name'][0]);
        $marcas->__set('create_time', date("Y-m-d H:i:s"));
        $marcas->__set('update_time', date("Y-m-d H:i:s"));
        //imagenes
        $archivo_modelo = $_FILES['imagen']['tmp_name'][0];
        $ruta = "../resources/images/marcas";
        $ruta_img = $ruta . "/" . $marcas->__get('mar_imagen'); //imagen/imagen.tipo       



        if (move_uploaded_file($archivo_modelo, $ruta_img)) {
            $res = $marcas->agregar();
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
        $marcas = new Marcas();
        $marcas->__set('mar_id', $_REQUEST['id']);
        $marcas->__set('mar_nombre', $_REQUEST['nombre']);
        

        if ($imagen == "") {
            $marcas->__set('mar_imagen', $_REQUEST['imagen']);
        } else {
            $nombre = $_FILES['imagen_new']['tmp_name'];
            
            $marcas->__set('mar_imagen', $_FILES['imagen_new']['name']);
            $archivo_modelo = $_FILES['imagen_new']['tmp_name'];
            $ruta = "../resources/images/categorias";
            $ruta_modelo = $ruta . "/" . $marcas->__get('mar_imagen');
            if (move_uploaded_file($archivo_modelo, $ruta_modelo)) {
                echo "agregado";
            } else {
                echo "error";
            }
        }

        $marcas->__set('update_time', date("Y-m-d H:i:s"));

        $res = $marcas->modificar();
       echo $res;
        if ($res == 1) {
            echo "<script type='text/javascript'>window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=marcas';</script>";
        } else {
        }


        break;
}
