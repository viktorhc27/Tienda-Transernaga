<?php 
include_once '../../model/Categorias.php';
include_once '../../model/Marcas.php';

$ca =new Categorias();
$ma =new Marcas();
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
                <div class="card-body">
                    <form method="post" action="../../controller/ProductosController.php?accion=agregar_producto"  enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Codigo</label>
                                <input name="codigo" type="text" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>precio compra</label>
                                <input type="text" name="precio_compra" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label">precio venta</label>
                                    <input type="text" name="precio_venta" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label>Altura</label>
                                <input type="text" name="altura" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label">Ancho</label>
                                    <input type="text" name="ancho" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label">profundidad</label>
                                    <input type="text" class="form-control" name="profundidad">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Modelo</label>
                                <input type="file" class="form-control" name="modelo">
                            </div>
                            <div class="form-group col-md-6">
                                <label>imagenes</label>
                                <input type="file" class="form-control"  id="archivo[]" name="archivo[]" multiple="">
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
                                <select>
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
                                        <option value="<?=$cat['cat_id']?>" ><?=$cat['cat_nombre']?></option>
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
                                        <option value="<?=$m['0']?>" ><?=$m['1']?></option>
                                    <?php
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>