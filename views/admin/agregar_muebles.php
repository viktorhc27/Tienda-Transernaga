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
                    <form id="formulario" method="post" action="../../controller/ProductosController.php?accion=agregar_producto" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Codigo</label>
                                <input id="codigo" name="codigo" type="number" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Nombre</label>
                                <input id="nombre" name="nombre" type="text" classname="nombre" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label>precio compra</label>
                                <input id="precio_compra" type="number" name="precio_compra" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label">precio venta</label>
                                    <input id="precio_venta" type="number" name="precio_venta" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label>Altura</label>
                                <input id="altura" type="number" name="altura" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label">Ancho</label>
                                    <input id="ancho" type="number" name="ancho" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label">profundidad</label>
                                    <input id="profundidad" type="text" class="form-control" name="profundidad">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Modelos</label>
                                <input type="file" name="modelo" class="form-control-file" id="modelo">

                            </div>
                            <div class="form-group col-md-6">
                                <label>imagenes</label>
                                <input type="file" class="form-control-file" id="archivo" name="archivo[]" multiple="" accept="image/png,image/jpeg,image/webp">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Peso</label>
                                <input id="peso" type="number" class="form-control" name="peso">
                            </div>

                            <div class="form-group col-md-3">
                                <label>Color</label>
                                <input id="color" type="text" class="form-control" name="color">
                            </div>
                            <div class="form-group col-md-2">
                                <label>estado</label>
                                <select id="estado" name="estado" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="1">Habilitado</option>
                                    <option value="0">Deshabilitado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Categorias</label>
                                <select id="categoria" name="categoria" class="form-control" name="categoria">
                                    <option>Seleccione</option>
                                    <?php foreach ($categoria as $cat) :
                                    ?>
                                        <option value="<?= $cat['cat_id'] ?>"><?= $cat['cat_nombre'] ?></option>
                                    <?php
                                    endforeach; ?>
                                </select>

                            </div>
                            <div class=" form-group col-md-2">
                                <label>Marcas</label>
                                <select id="marcas" class="form-control" name="marcas">

                                    <option value="">Seleccione</option>
                                    <?php foreach ($marcas as $m) :
                                    ?>
                                        <option value="<?= $m['0'] ?>"><?= $m['1'] ?></option>
                                    <?php
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">


                        </div>

                        <button id="btn_guardar" type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="../../resources/js/validaciones/agregar_muebles.js"></script> -->
<script>
    $("#btn_guardar").click(function(e) {
        e.preventDefault();
        var formData = new FormData();
        var codigo = $("#codigo").val();
        var nombre = $("#nombre").val();
        var precio_compra = $("#precio_compra").val();
        var precio_venta = $("#precio_venta").val();
        var altura = $("#altura").val();
        var ancho = $("#ancho").val();
        var profundidad = $("#profundidad").val();

        var modelo = $("#modelo").prop("files");
        var imagenes = $('#archivo').prop("files");

        var peso = $("#peso").val();
        var stock = $("#stock").val();
        var color = $("#color").val();
        var estado = $("#estado").val();
        var categoria = $("#categoria").val();
        var marcas = $("#marcas").val();


        if (parseInt(precio_compra) < parseInt(precio_venta)) {

            if (codigo != "" && nombre != "" && precio_compra != "" && precio_venta != "" && altura != "" && ancho != "" && profundidad != "" && peso != "" && color != "" && categoria != "" && marcas != "" && estado != "") {


                if (modelo.length > 0 && imagenes.length > 0) {
                    formData.append('codigo', codigo);
                    formData.append('nombre', nombre);
                    formData.append('precio_compra', precio_compra);
                    formData.append('precio_venta', precio_venta);
                    formData.append('altura', altura);
                    formData.append('ancho', ancho);
                    formData.append('profundidad', profundidad);
                    formData.append('modelo', modelo);
                    formData.append('peso', peso);
                    formData.append('stock', stock);
                    formData.append('color', color);
                    formData.append('estado', estado);
                    formData.append('categoria', categoria);
                    formData.append('marcas', marcas);

                    for (let i = 0; i < imagenes.length; i++) {
                        formData.append('imagen[' + i + ']', imagenes[i])
                    }
                    for (let i = 0; i < modelo.length; i++) {
                        formData.append('modelo[' + i + ']', modelo[i])
                    }
                    console.log(formData.get("modelo[0]"));
                    $.ajax({
                        url: '../../controller/ProductosController.php?accion=agregar_producto', // point to server-side PHP script 
                        data: formData,
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'post',
                    }).done(function(respuesta) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Agregado',
                            showConfirmButton: false,
                            timer: 1500
                        })

                    });

                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Debe subir los Archivos',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }




            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Complete todos los campos',
                    showConfirmButton: false,
                    timer: 1500
                })
            }



        } else {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'El PRECIO VENTA tiene que ser mayor al PRECIO COMPRA ',
                showConfirmButton: false,
                timer: 3500
            })
        }







    })
    $("#codigo").blur(function() {

    })
</script>