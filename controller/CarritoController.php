<?php
session_start();
$accion = $_REQUEST["accion"];
switch ($accion) {
    case "agregar":
        include '../model/conexion.php';
        include '../model/Productos.php';
        $productos = new Productos();

        $id_producto = $_REQUEST["id_producto"];
        $cantidad = $_REQUEST["cantidad"];

        if (!empty($_SESSION["cart"])) {

            if (in_array($id_producto, $_SESSION["cart"][$id_producto])) {
                if ($productos->verificar_stock($cantidad, $id_producto)) {

                    $_SESSION["cart"][$id_producto]["cantidad"] = $_SESSION["cart"][$id_producto]["cantidad"] + $cantidad;
                }
            } else {
                if ($productos->verificar_stock($cantidad, $id_producto)) {
                    //no existe en el carrito
                    $_SESSION["cart"][$id_producto] = array(
                        'id_producto' => $id_producto,
                        'id_usuario' => '',
                        'cantidad' => $cantidad,
                    );
                }
            }
        } else {
            if ($productos->verificar_stock($cantidad, $id_producto)) {
                $_SESSION["cart"][$id_producto] = array(
                    'id_producto' => $id_producto,
                    'id_usuario' => '',
                    'cantidad' => $cantidad,
                );
            }
        }
        echo "<script>";
        echo "location.href='../index.php?param=cart'";
        echo "</script>";
        break;

    case "quitar":
        include '../model/conexion.php';
        include '../model/Productos.php';
        $productos = new Productos();

        $id_producto = $_REQUEST["id"];
        $cantidad = $_REQUEST["cantidad"];

        if (isset($_SESSION["cart"][$id_producto])) {
            $res = $productos->devolver($cantidad, $id_producto);
            if ($res == 1) {
                unset($_SESSION["cart"][$id_producto]);

                echo "<script>";
                echo "location.href='../index.php?param=cart'";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "location.href='../index.php?param=cart'";
            echo "</script>";
        }
        break;
    case "actualizar":
        include '../model/conexion.php';
        include '../model/Productos.php';
        $productos = new Productos();
        $cantidad = $_REQUEST["cantidad"];
        $id_producto = $_REQUEST['id'];

        if (isset($_SESSION["cart"])) {

            if ($cantidad > $_SESSION["cart"][$id_producto]["cantidad"]) {

                $aumentar = $cantidad - $_SESSION["cart"][$id_producto]['cantidad'];

                $res = $productos->verificar_stock($aumentar, $id_producto);

                if ($res) {

                    $_SESSION["cart"][$id_producto]["cantidad"] = $_SESSION["cart"][$id_producto]["cantidad"] + $aumentar;
                }
            }
            if ($cantidad < $_SESSION["cart"][$id_producto]["cantidad"]) {

                $descontar = $cantidad - $_SESSION["cart"][$id_producto]['cantidad'];
                $descontar = $descontar * -1;

                $res = $productos->devolver($descontar, $id_producto);
                if ($res == 1) {

                    $_SESSION["cart"][$id_producto]["cantidad"] = $_SESSION["cart"][$id_producto]["cantidad"] - $descontar;
                }
            }
            if ($cantidad == 0) {
                $descontar = $cantidad - $_SESSION["cart"][$id_producto]['cantidad'];
                $descontar = $descontar * -1;

                $res = $productos->devolver($descontar, $id_producto);
                if ($res == 1) {

                    unset($_SESSION["cart"][$id_producto]);
                }
            }
        }
        echo "<script>";
        echo "location.href='http://localhost/tienda-transernaga/index.php?param=cart'";
        echo "</script>";
        break;

    case "finalizar_compra":

        unset($_SESSION["cart"]);
        if (empty($_SESSION["cart"])) {
            echo "<script>";
            echo "location.href='http://localhost/tienda-transernaga/index.php?param=inicio'";
            echo "</script>";
        }
        /* header('Content-Type:apllication/json');
    
            //array para convertir a JSON
            $datos = array(
                'estado' => 'agregado'
            );
    
            //enviar JSON al servidor para recibirlo en ajax
            echo json_encode($datos, JSON_FORCE_OBJECT); */

        break;
}
