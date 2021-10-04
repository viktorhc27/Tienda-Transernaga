<?php
require_once '../model/Usuarios.php';
require_once '../model/Conexion.php';

$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'login':
        echo "login";
        session_start();
        $usuarios = new Usuarios();

        $usuarios->__set('us_correo', $_REQUEST['correo']);

        $res = $usuarios->login();

        if (!empty($res)) {
            if (password_verify($_REQUEST['password'], $res['us_password'])) {

                $_SESSION['user'] = array(
                    'nombre' => $res['us_nombre'],
                    'correo' => $res['us_correo'],
                    'role' => $res['roles_ro_id']
                );
            }
        }else{
            echo 'error';
        }



        break;

    case 'register_user':

        $password_hash = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
        $usuarios = new Usuarios();



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
        $res = $usuarios->agregar();

        echo $res;
        break;

    case 'register_employees':
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
        $usuarios->__set('roles_ro_id', '2');
        $usuarios->__set('create_time', date("Y-m-d H:i:s"));
        $usuarios->__set('update_time', date("Y-m-d H:i:s"));
        $usuarios->agregar();
        break;
}