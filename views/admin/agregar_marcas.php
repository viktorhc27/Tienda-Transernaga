<?php

include_once '../../model/Marcas.php';

$marcas = new Marcas();
$listas_marcas = $marcas->listar();

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Marcas</li>
            </ol>
        </nav>

        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-7">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Lista de Marcas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Nombre</th>
                                        <th>Imagen</th>

                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($listas_marcas as $s) :
                                    ?> <tr>

                                            <td><?= $s['mar_nombre'] ?></td>
                                            <td>
                                                <img width="100px" src="../../resources/images/marcas/<?= $s['mar_imagen'] ?>">
                                            </td>

                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <a href="?param=modificar_marcas&id=<?= $s['mar_id'] ?>" class="dropdown-item" type="button">Modificar</a>
                                                        <!-- <button class="dropdown-item" type="button">Ver</button> -->
                                                        <!-- <button class="dropdown-item" type="button">Desabilitar</button> -->
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;

                                    ?>




                                </tbody>
                            </table>

                        </div>
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <div class="col-md-4">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Agregar Marcas </h3>
                        </div>

                        <div class="card-body">


                            <form method="post" action="../../controller/MarcasController.php?accion=guardar" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="">
                                    <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input id="imagen" type="file" name="imagen" class="form-control">
                                </div> <!-- form-group end.// -->


                                <div class="form-group">
                                    <button id="btnAgregar" type="submit" class="btn btn-primary btn-block"> Agregar </button>
                                </div> <!-- form-group// -->

                            </form>


                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">

                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>

                <!-- /.row -->
            </div>
        </div>
        <script>
            $("#btnAgregar").click(function(e) {
                e.preventDefault();
                var nombre = $("#nombre").val();
                var estado = $('input:radio[name=estado]:checked').val();
                var imagen = $('#imagen').prop("files");
                console.log(imagen.length);
                if (imagen.length > 0 && nombre != "") {
                    var formData = new FormData();
                    formData.append('nombre', nombre);

                    formData.append('imagen', imagen);


                    for (let i = 0; i < imagen.length; i++) {
                        formData.append('imagen[' + i + ']', imagen[i])
                    }
                    $.ajax({
                        url: '../../controller/MarcasController.php?accion=guardar', // point to server-side PHP script 
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

                        setTimeout(function() {
                            location.reload();
                        }, 1000)

                    });

                }
                if (nombre == "") {
                    $('#nombre').removeClass('is-valid');
                    $('#nombre').addClass('is-invalid');

                }
                if (imagen.length == 0) {
                    $('#imagen').removeClass('is-valid');
                    $('#imagen').addClass('is-invalid');
                }
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'LLene todos los campos',
                    showConfirmButton: false,
                    timer: 1500
                })


            })

            $("#nombre").blur(function() {
                var dato = $("#nombre").val();
                if (dato.trim() != '') {
                    $('#nombre').removeClass('is-invalid');
                    $('#nombre').addClass('is-valid');
                } else {
                    $('#nombre').removeClass('is-valid');
                    $('#nombre').addClass('is-invalid');
                }

            });

            $("#imagen").change(function() {
                var dato = $('#imagen').prop("files");
                if (dato.length > 0) {
                    $('#imagen').removeClass('is-invalid');
                    $('#imagen').addClass('is-valid');
                } else {
                    $('#imagen').removeClass('is-valid');
                    $('#imagen').addClass('is-invalid');
                }

            });
        </script>