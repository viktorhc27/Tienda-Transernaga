<?php
session_start();
$accion = $_REQUEST["accion"];
//
switch ($accion) {
    case "agregar":

        $id_producto = $_REQUEST["id_producto"];
        $cantidad = $_REQUEST["cantidad"];


        $_SESSION["cart"][$id_producto] = array(
            'id_producto' => $id_producto,
            'id_usuario' => '',
            'cantidad' => $cantidad,


        );

        echo "<script>";
        echo "location.href='../index.php?param=cart'";
        echo "</script>";

        /* header('Content-Type:apllication/json');

        //array para convertir a JSON
        $datos = array(
            'estado' => 'agregado'
        );

        //enviar JSON al servidor para recibirlo en ajax
        echo json_encode($datos, JSON_FORCE_OBJECT); */


        break;
    case "quitar":
        $id = $_REQUEST["id"];

        unset($_SESSION["cart"][$id]);
        echo "<script>";
        echo "location.href='../index.php?param=cart'";
        echo "</script>";


        break;
    case "actualizar":
        $cantidad = $_REQUEST["cantidad"];
        $id = $_REQUEST['id'];

        echo $cantidad;
        echo $id;
        $_SESSION['cart'][$id]['cantidad'] = $cantidad;

        echo "<script>";
        echo "location.href='../index.php?param=carro'";
        echo "</script>";



        break;
    case "finalizar_compra":

        unset( $_SESSION["cart"] ); 

        break;
}
