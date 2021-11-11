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
        print_r($res);
        if (!empty($res)) {
            if (password_verify($_REQUEST['password'], $res['us_password'])) {

                $_SESSION['user'] = array(
                    'id' => $res['us_id'],
                    'nombre' => $res['us_nombre'],
                    'correo' => $res['us_correo'],
                    'role' => $res['roles_ro_id']
                );
                echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";
            }else{
                echo "<script type='text/javascript'>window.location.href = '../index.php?error=password';</script>";
            }
        }else{
            
            echo "<script type='text/javascript'>window.location.href = '../index.php?error=datos';</script>";
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

        echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";
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
        $usuarios->__set('roles_ro_id', $_REQUEST['rol']);
        $usuarios->__set('create_time', date("Y-m-d H:i:s"));
        $usuarios->__set('update_time', date("Y-m-d H:i:s"));
        $res=$usuarios->agregar();
        
        echo "<script type='text/javascript'>window.location.href = '../views/admin/index.php?param=registrar';</script>";
        break;
}
