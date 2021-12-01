<?php
require_once '../model/Usuarios.php';
require_once '../model/Conexion.php';

$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'login':

        session_start();
        $usuarios = new Usuarios();

        $usuarios->__set('us_correo', $_REQUEST['correo']);

        $res = $usuarios->login();
        header('Content-Type:apllication/json');

        if (!empty($res)) {

            if (password_verify($_REQUEST['password'], $res['us_password'])) {
                $datos = array(
                    'estado' => 'ok'
                );

                $_SESSION['user'] = array(
                    'id' => $res['us_id'],
                    'nombre' => $res['us_nombre'],
                    'correo' => $res['us_correo'],
                    'role' => $res['roles_ro_id']

                );
            } else {
                $datos = array(
                    'estado' => 'password incorrecta'
                );
            }
        } else {
            $datos = array(
                'estado' => 'ingrese datos'
            );
        }
        echo json_encode($datos, JSON_FORCE_OBJECT);


        break;

    case 'register_user':

        $password_hash = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
        $usuarios = new Usuarios();
        header('Content-Type:apllication/json');
        $usuarios->__set('us_id', 0);
        $usuarios->__set('us_nombre', $_REQUEST['nombre']);
        $usuarios->__set('us_apellApp', $_REQUEST['app']);
        $usuarios->__set('us_apellApm', $_REQUEST['apm']);
        $usuarios->__set('us_correo', $_REQUEST['correo']);
        $usuarios->__set('us_password', $password_hash);
        $usuarios->__set('us_telefono', $_REQUEST['telefono']);
        $usuarios->__set('us_direccion', $_REQUEST['direccion']);
        $usuarios->__set('us_sexo', $_REQUEST['sexo']);
        $usuarios->__set('roles_ro_id', 1);
        $usuarios->__set('create_time', date("Y-m-d H:i:s"));
        $usuarios->__set('update_time', date("Y-m-d H:i:s"));
        $res = $usuarios->agregar_();
        if ($res == 1) {

            $datos = array(
                'estado' => "agregado"
            );
            echo json_encode($datos, JSON_FORCE_OBJECT);
        }


        /* 
        echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; */
        break;

    case 'register_employees':
        header('Content-Type:apllication/json');
        $password_hash = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
        $usuarios = new Usuarios();
        $usuarios->__set('us_nombre', $_REQUEST['nombre']);
        $usuarios->__set('us_apellApp', $_REQUEST['app']);
        $usuarios->__set('us_apellApm', $_REQUEST['apm']);
        $usuarios->__set('us_correo', $_REQUEST['correo']);
        $usuarios->__set('us_password', $password_hash);
        $usuarios->__set('us_telefono', $_REQUEST['telefono']);

        $usuarios->__set('us_direccion', $_REQUEST['direccion']);
        $usuarios->__set('us_sexo', $_REQUEST['sexo']);
        $usuarios->__set('roles_ro_id', $_REQUEST['rol']);
        $usuarios->__set('create_time', date("Y-m-d H:i:s"));
        $usuarios->__set('update_time', date("Y-m-d H:i:s"));
        $res = $usuarios->agregar_();


        if ($res == 1) {
            //array para convertir a JSON
            $datos = array(
                'estado' => 'agregado'
            );
        } else {
            $datos = array(
                'estado' => 'error'
            );
        }
        //enviar JSON al servidor para recibirlo en ajax
        echo json_encode($datos, JSON_FORCE_OBJECT);


        break;
    case 'verificar':
        $employees = new Usuarios();
        $employees->__set('us_correo', $_REQUEST['correo']);
        $res = $employees->verificar_correo();
        header('Content-Type:apllication/json');
        if ($res == 1) {
            $datos = array(
                'datos' => "existe",
            );
        } else {
            $datos = array(
                'datos' => 'no existe'
            );
        }
        echo json_encode($datos, JSON_FORCE_OBJECT);

        break;

    case "modificar":
        $usuarios = new Usuarios();
        $usuarios->__set('us_id', $_REQUEST['id']);
        $usuarios->__set('us_nombre', $_REQUEST['nombre']);
        $usuarios->__set('us_apellApp', $_REQUEST['app']);
        $usuarios->__set('us_apellApm', $_REQUEST['apm']);
        $usuarios->__set('us_correo', $_REQUEST['correo']);
        $usuarios->__set('us_telefono', $_REQUEST['telefono']);
        $usuarios->__set('us_direccion', $_REQUEST['direccion']);
        $usuarios->__set('us_correo', $_REQUEST['correo']);

        $rol = $_REQUEST['nuevo_rol'];
        
        if($rol== 0){
            $usuarios->__set('roles_ro_id', $_REQUEST['rol']);

        }else{
            $usuarios->__set('roles_ro_id', $_REQUEST['nuevo_rol']);
        }
        $res = $usuarios->modificar();

        
        /* header('Content-Type:apllication/json'); */
        if ($res == 1) {
            /* $datos = array(
                'datos' => 'modificado'
            ); */
            echo "<script type='text/javascript'>";
            echo "window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=registrar'";
            echo "</script>";
        } else {
            $datos = array(
                'datos' => 'error'
            );
        }
        /* echo json_encode($datos, JSON_FORCE_OBJECT); */

        break;

    case 'cambiar_estado':
        $usuarios = new Usuarios();
        $id = $_REQUEST['id'];
       

        $res = $usuarios->cambiar_estado($id);
        
         /* if($res == 1){ */
                echo "<script type='text/javascript'>";
                echo "window.location.href = 'http://localhost/tienda-transernaga/views/admin/index.php?param=registrar'";
                echo "</script>";   
           /*  } */



        break;

        /* case 'verificar_modificar':
                $employees = new Employees();
                $employees->setEm_correo($_REQUEST['correo']);
                $res = $employees->verificar_correo();
                header('Content-Type:apllication/json');
                if ($res == true) {
                    $datos = array(
                        'datos' => 'existe'
                    );
                } else {
                    $datos = array(
                        'datos' => 'no existe'
                    );
                }
                echo json_encode($datos, JSON_FORCE_OBJECT);
        
                break; */
}
