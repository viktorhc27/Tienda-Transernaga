<?php 
require_once '../model/Usuarios.php';
require_once '../model/Conexion.php';

$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'login':
        session_start();
        $usuarios = new Usuarios();

        $usuarios->__set('correo', $_REQUEST['correo']);
        $usuarios->__set('password',$_REQUEST['password']);

        $res= $usuarios->login();

        $_SESSION['user']= array(
            'nombre'=>$res['us_nombre'],
            'correo'=>$res['us_correo'],
            'role'=>$res['roles_ro_id']
        );

        break;

    case 'register':
        $usuarios = new Usuarios();

        
    break;
}
