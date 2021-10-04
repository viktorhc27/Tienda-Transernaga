<?php 
require_once '../model/Usuarios.php';
require_once '../model/Conexion.php';

$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'login':
        session_start();
        $usuarios = new Usuarios();

        $usuarios->__set('us_correo', $_REQUEST['correo']);
        $usuarios->__set('us_password',$_REQUEST['password']);

        $res= $usuarios->login();

        $_SESSION['user']= array(
            'nombre'=>$res['us_nombre'],
            'correo'=>$res['us_correo'],
            'role'=>$res['roles_ro_id']
        );

        break;

    case 'register_user':
        $password_hash = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
        $usuarios = new Usuarios();
        $usuarios->__set('us_nombre',$_REQUEST['nombre']);
        $usuarios->__set('us_apellApp',$_REQUEST['app']);
        $usuarios->__set('us_apellApm',$_REQUEST['apm']);
        $usuarios->__set('us_correo',$_REQUEST['correo']);
        $usuarios->__set('us_password',$password_hash);
        $usuarios->__set('us_telefono',$_REQUEST['telefono']);
        $usuarios->__set('us_direccion',$_REQUEST['direccion']);
        $usuarios->__set('us_sexo',$_REQUEST['sexo']);
        $usuarios->__set('roles_ro_id','usuario');
        $usuarios->__set('create_time',date("Y-m-d H:i:s"));
        $usuarios->__set('update_time',date("Y-m-d H:i:s"));
        $usuarios->agregar();
    break;

    case 'register_employees':
        $password_hash = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
        $usuarios = new Usuarios();
        $usuarios->__set('us_nombre',$_REQUEST['nombre']);
        $usuarios->__set('us_apellApp',$_REQUEST['app']);
        $usuarios->__set('us_apellApm',$_REQUEST['apm']);
        $usuarios->__set('us_correo',$_REQUEST['correo']);
        $usuarios->__set('us_password',$password_hash);
        $usuarios->__set('us_telefono',$_REQUEST['telefono']);
        $usuarios->__set('us_direccion',$_REQUEST['direccion']);
        $usuarios->__set('us_sexo',$_REQUEST['sexo']);
        $usuarios->__set('roles_ro_id','admin');
        $usuarios->__set('create_time',date("Y-m-d H:i:s"));
        $usuarios->__set('update_time',date("Y-m-d H:i:s"));
        $usuarios->agregar();
    break;
}
