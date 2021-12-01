<?php
require_once '../model/Productos.php';
require_once '../model/Conexion.php';
require_once '../model/Imagenes.php';
require_once '../model/ProductosImagenes.php';

$accion = $_REQUEST['accion'];

switch ($accion) {

    case 'agregar_producto':


        print_r($_REQUEST["nombre"]);
        echo "<br>";
        echo "<pre>";
        print_r($_FILES["imagen"]['name']);
        echo "</pre>";

        echo "<br>";
        echo "<pre>";
        print_r($_FILES["imagen"]['tmp_name']);
        echo "</pre>";

        /* foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
            echo "<br>";
            print_r($_FILES["archivo"]["name"][$key]);
          
            
        } */
        break;
}
