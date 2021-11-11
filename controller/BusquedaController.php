<?php
include '../model/Conexion.php';
include '../model/Productos.php';
$categorias = $_REQUEST['categorias'];
$busqueda = $_REQUEST['busqueda'];
if (!empty($busqueda)) {
    echo "<script type='text/javascript'>";
    echo "window.location.href = 'http://localhost/tienda-transernaga/index.php?param=resultado&s=" . $busqueda . "'";
    echo "</script>";
}
if (!empty($categorias)) {
    echo "<script type='text/javascript'>";
    echo "window.location.href = 'http://localhost/tienda-transernaga/index.php?param=categorias&c=" . $categorias . "'";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location.href = 'http://localhost/tienda-transernaga/index.php?param=productos'";
    echo "</script>";
}
