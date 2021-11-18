<?php
include_once '../../model/Categorias.php';
include_once '../../model/Marcas.php';

$ca = new Categorias();
$ma = new Marcas();
$categoria = $ca->listar();
$marcas = $ma->listar();


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-content">
                <div class="card-header">
                    <h3 class="card-title">Agregar Muebles</h3>
                </div>
                <div id="mensaje"></div>
                <div class="card-body">
                    <form id="formuploadajax" method="post" action="../../controller/ProductosController.php?accion=agregar_producto" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Codigo</label>
                                <input id="codigo" name="codigo" type="text" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Nombre</label>
                                <input id="nombre" name="nombre" type="text" classname="nombre" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>precio compra</label>
                                <input id="precio_compra" type="text" name="precio_compra" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label">precio venta</label>
                                    <input id="precio_venta" type="text" name="precio_venta" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label>Altura</label>
                                <input id="altura" type="text" name="altura" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label">Ancho</label>
                                    <input id="ancho" type="text" name="ancho" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label">profundidad</label>
                                    <input id="profundidad" type="text" class="form-control" name="profundidad">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Modelos</label>
                                <input type="file" name="modelo" class="form-control-file" id="fichero">
                                <p id="texto"> </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>imagenes</label>
                                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Peso</label>
                                <input type="text" class="form-control" name="peso">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Stock</label>
                                <input type="text" class="form-control" name="stock">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Color</label>
                                <input type="text" class="form-control" name="color">
                            </div>
                            <div class="form-group col-md-3">
                                <label>estado</label>
                                <select name="estado" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="">Habilitado</option>
                                    <option value="">Deshabilitado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Categorias</label>
                                <select class="form-control" name="categoria">
                                    <option>Seleccione</option>
                                    <?php foreach ($categoria as $cat) :
                                    ?>
                                        <option value="<?= $cat['cat_id'] ?>"><?= $cat['cat_nombre'] ?></option>
                                    <?php
                                    endforeach; ?>
                                </select>

                            </div>
                            <div class=" form-group col-md-6">
                                <label>Marcas</label>
                                <select class="form-control" name="marcas">

                                    <option>Seleccione</option>
                                    <?php foreach ($marcas as $m) :
                                    ?>
                                        <option value="<?= $m['0'] ?>"><?= $m['1'] ?></option>
                                    <?php
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <button id="btn_guardar" type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="../../resources/js/validaciones/agregar_muebles.js"></script> -->