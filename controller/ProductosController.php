<?php
require_once '../model/Productos.php';
require_once '../model/Conexion.php';
require_once '../model/Imagenes.php';
require_once '../model/Producto_imagenes';

$accion = $_REQUEST['accion'];

switch ($accion) {

    case 'agregar_producto':
        $producto= new Productos;

        $producto->__set('id',                    0);
        $producto->__set('pro_codigo',            $_REQUEST['nombre']);
        $producto->__set('pro_precio_compra',     $_REQUEST['precio_compra']);
        $producto->__set('pro_precio_venta',      $_REQUEST['precio_venta']);
        $producto->__set('pro_altura',            $_REQUEST['altura']);
        $producto->__set('pro_ancho',             $_REQUEST['ancho']);
        $producto->__set('pro_profundidad',       $_REQUEST['profundidad']);
        $producto->__set('pro_modelo',            $_REQUEST['modelo']);
        //$producto->__set('pro_imagenes',          $_REQUEST['imagenes']);//recibir el ultimo id
        $producto->__set('pro_peso',              $_REQUEST['peso']);
        $producto->__set('pro_stock',             $_REQUEST['stock']);
        $producto->__set('pro_color',             $_REQUEST['color']);
        $producto->__set('pro_estado',            $_REQUEST['estado']);
        $producto->__set('categoria_cat_id',      $_REQUEST['categoria']);
        $producto->__set('marcas_mar_id',         $_REQUEST['marcas']);

        $producto->agregar();



        break;
}
