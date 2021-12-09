<?php
require_once '../model/Productos.php';
require_once '../model/Conexion.php';
require_once '../model/Imagenes.php';
require_once '../model/ProductosImagenes.php';

$accion = $_REQUEST['accion'];

switch ($accion) {

    case 'agregar_producto':
        $producto = new Productos;
        $imagenes = new Imagenes;
        $proImagen = new ProductosImagenes;

        $producto->__set('id',                    0);
        $producto->__set('pro_codigo',            "TR" . $_REQUEST['codigo']);
        $producto->__set('pro_nombre',            $_REQUEST['nombre']);
        $producto->__set('pro_precio_compra',     $_REQUEST['precio_compra']);
        $producto->__set('pro_precio_venta',      $_REQUEST['precio_venta']);
        $producto->__set('pro_altura',            $_REQUEST['altura']);
        $producto->__set('pro_ancho',             $_REQUEST['ancho']);
        $producto->__set('pro_profundidad',       $_REQUEST['profundidad']);
        $producto->__set('pro_modelo',            $_FILES['modelo']['name'][0]);
        $producto->__set('pro_img',               $_FILES["imagen"]["name"][0]);
        $producto->__set('pro_peso',              $_REQUEST['peso']);
        $producto->__set('pro_stock',             0);
        $producto->__set('pro_color',             $_REQUEST['color']);
        $producto->__set('pro_estado',            $_REQUEST['estado']);
        $producto->__set('categoria_cat_id',      $_REQUEST['categoria']);
        $producto->__set('marcas_mar_id',         $_REQUEST['marcas']);
        $producto->__set('create_time',           date("Y-m-d H:i:s"));
        $producto->__set('update_time',           date("Y-m-d H:i:s"));

       
        $id_producto =  $producto->agregar();
        //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
        foreach ($_FILES["modelo"]['tmp_name'] as $key => $tmp_name) {
            //Validamos que el archivo exista
            if ($_FILES["modelo"]["name"][$key]) {
                $filename = $_FILES["modelo"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["modelo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

                $directorio = '../resources/images/modelos/' . $id_producto; //Declaramos un  variable con la ruta donde guardaremos los archivos

                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                }

                $dir = opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
                $ruta_sinpuntos = str_replace('..', '', $directorio);
                $producto->__set('pro_modelo',            $filename);
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if (move_uploaded_file($source, $target_path)) {
                } else {
                }
                closedir($dir); //Cerramos el directorio de destino
            }
        }

        //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
        foreach ($_FILES["imagen"]['tmp_name'] as $key => $tmp_name) {
            //Validamos que el archivo exista
            if ($_FILES["imagen"]["name"][$key]) {
                $filename = $_FILES["imagen"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["imagen"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

                $directorio = '../resources/images/productos/' . $id_producto; //Declaramos un  variable con la ruta donde guardaremos los archivos


                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                }

                $dir = opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
                $ruta_sinpuntos = str_replace('..', '', $directorio);

                $imagenes->__set('img_id', 0);
                $imagenes->__set('nombre', $filename);
                $imagenes->__set('ruta', $ruta_sinpuntos);
                $imagenes->__set('create_time', date("Y-m-d H:i:s"));
                $imagenes->__set('update_time', date("Y-m-d H:i:s"));

                $id_imagenes = $imagenes->agregar();

                $proImagen->__set('imagenes_id', $id_imagenes);
                $proImagen->__set('producto_id', $id_producto);

                $r = $proImagen->agregar();

                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if (move_uploaded_file($source, $target_path)) {
                } else {
                }
                closedir($dir); //Cerramos el directorio de destino
            }
        }

        header('Content-Type:apllication/json');

        $res = $producto->verificar_productos($id_producto);

        if ($res == 1) {
            /*  echo "<script type='text/javascript'>window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=productos';</script>"; */
            $datos = array(
                'datos' => 'Agregado'
            );
        } else {
            $datos = array(
                'datos' => 'no Agregado'
            );
        }
        echo json_encode($datos, JSON_FORCE_OBJECT);





        break;

    case 'cambiar_estado':

        $id = $_REQUEST['id'];
        $productos = new Productos();
        $cambio = $productos->cambiar_estado($id);
        echo $cambio;

        /* header('Content-Type:apllication/json'); */
        if ($cambio == 1) {
            /* $datos = array(
                'datos' => 'hecho'
            ); */

            echo "<script type='text/javascript'>window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=productos';</script>";
        } else {
            echo "<script type='text/javascript'>window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=productos';</script>";
        }
        /* echo json_encode($datos, JSON_FORCE_OBJECT); */
        break;
    case "buscar":
        $productos = new Productos();
        $id = $_REQUEST['id'];

        $array_producto = $productos->buscar($id);
        header('Content-Type:apllication/json');
        if (!empty($array_producto)) {
            $datos = array(
                'imagen' => $array_producto['12']
            );
        }
        echo json_encode($datos, JSON_FORCE_OBJECT);
        /*  echo "<pre>";
        print_r($array_producto['12']);
        echo "</pre>"; */

        break;
}
