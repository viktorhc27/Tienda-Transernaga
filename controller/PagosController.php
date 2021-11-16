<?php

require_once '../Model/conexion.php';
require_once '../Model/Usuarios.php';
require_once '../Model/Ventas.php';
require_once '../Model/Productos.php';

$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'agregar':
        session_start();

        $usuarios = new Usuarios();
        $ventas = new Ventas();
        $productos = new Productos();

        $usuarios->__set('id', 0);
        $usuarios->__set('us_nombre', $_REQUEST['nombre']);
        $usuarios->__set('us_apellApp', $_REQUEST['app']);
        $usuarios->__set('us_apellApm', $_REQUEST['apm']);
        $usuarios->__set('us_correo', $_REQUEST['correo']);
        $usuarios->__set('us_sexo', $_REQUEST['sexo']);
        $direccion = $_REQUEST['direccion'];
        $departamento = $_REQUEST['departamento'];
        $block = $_REQUEST['block'];
        $numero = $_REQUEST['numero'];
        $direccion_completa = $direccion . ", " . $departamento . ", " . $block . ", N° " . $numero;
        $usuarios->__set('us_direccion', $direccion_completa);
        $usuarios->__set('us_telefono', $_REQUEST['telefono']);
        $usuarios->__set('create_time', date("Y-m-d H:i:s"));
        $usuarios->__set('update_time', date("Y-m-d H:i:s"));
        $usuarios->__set('roles_ro_id', 1);
        $number = mt_Rand(1000000000, 9999999999);
        $res = $usuarios->agregar();
        $codigo = "TR" . strtoupper(uniqid());
        $tipo_armado = $_REQUEST['tipo_armado'];
        $hora = date("Y-m-d H:i:s");

        foreach ($_SESSION['cart'] as $i) :
            $data_product = $productos->buscar($i['id_producto']);

            $calculo = $data_product['pro_precio_venta'] * $i['cantidad'];
            $ventas->__set('usuarios_id', $res);
            $ventas->__set('productos_pro_id', $i['id_producto']);
            $ventas->__set('ven_id', $number);
            $ventas->__set('ven_codigo', $codigo);
            $ventas->__set('ven_total', $calculo);
            $ventas->__set('tipo_armado', $tipo_armado);
            $ventas->__set('ven_cantidad', $i['cantidad']);
            $ventas->__set('create_time', $hora);
            $ventas->__set('update_time', $hora);
            $r = $ventas->agregar();

            echo $r;
            if ($r == 1) {
                echo "<script type='text/javascript'>";
                echo " window.location.href = '../views/boleta.php?id_us=$res&cod=$codigo&arm=$tipo_armado'";
                echo "</script>";
            } else {
                
                echo "<br>";
            }


        endforeach;




        /* if ($res == 1) {
            array para convertir a JSON
             $datos = array(
                'estado' => 'agregado'
            ); *
            echo "agregado";
        } else {
            $datos = array(
                'estado' => 'error'
            ); 
        }
       */
        break;
        case 'registrado':
            session_start();
    
            $usuarios = new Usuarios();
            $ventas = new Ventas();
            $productos = new Productos();
    

            $id= $_REQUEST['id'];

            $codigo = "TR" . strtoupper(uniqid());
            $tipo_armado = $_REQUEST['tipo_armado'];
            $hora = date("Y-m-d H:i:s");
            $number = mt_Rand(1000000000, 9999999999); // better than Rand()
            foreach ($_SESSION['cart'] as $i) :
                $data_product = $productos->buscar($i['id_producto']);
    
                $calculo = $data_product['pro_precio_venta'] * $i['cantidad'];
                $ventas->__set('usuarios_id', $id);
                $ventas->__set('productos_pro_id', $i['id_producto']);
                $ventas->__set('ven_id', $codigo);
                $ventas->__set('ven_codigo', $codigo);
                $ventas->__set('ven_total', $calculo);
                $ventas->__set('tipo_armado', $tipo_armado);
                $ventas->__set('ven_cantidad', $i['cantidad']);
                $ventas->__set('create_time', $hora);
                $ventas->__set('update_time', $hora);
                $r = $ventas->agregar();
    echo $r;
                if ($r == 1) {
                  
                    echo "<script type='text/javascript'>";
                    echo " window.location.href = '../views/boleta.php?id_us=$id&cod=$codigo&arm=$tipo_armado'";
                    echo "</script>";
                } else {
                   
                    echo "<br>";
                }
    
    
            endforeach;
    
    
    
    
            /* if ($res == 1) {
                array para convertir a JSON
                 $datos = array(
                    'estado' => 'agregado'
                ); *
                echo "agregado";
            } else {
                $datos = array(
                    'estado' => 'error'
                ); 
            }
           */
            break;
}
