<?php
//http://flexslider.woothemes.com/thumbnail-controlnav.html
include_once '../../model/Categorias.php';

$categorias = new Categorias();
$listas_categorias = $categorias->listar();

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
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
                            <h3 class="card-title ">Lista de Categorias</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Imagen</th>

                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($listas_categorias as $s) :
                                    ?> <tr>

                                            <td><?= $s['cat_id'] ?></td>
                                            <td><?= $s['cat_nombre'] ?></td>
                                            <td><?php
                                                if ($s['cat_estado'] == 1) { ?>
                                                    <span class="badge badge-success"> Habilitado </span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger"> desabilitado </span>
                                                <?php }
                                                ?>
                                            </td>
                                            <td><img width="100px" src="../../resources/images/categorias/<?= $s['imagen'] ?>"></td>

                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <a href="?param=modificar_categorias&id=<?= $s['cat_id'] ?>" class="dropdown-item" type="button">Modificar</a>
                                                        <!-- <button class="dropdown-item" type="button">Ver</button> -->



                                                        <form method="post" action="../../controller/CategoriasController.php?accion=cambiar_estado">
                                                            <input type="hidden" name="id" value="<?= $s['cat_id'] ?>">
                                                            <button class="dropdown-item">Cambiar Estado</button>
                                                        </form>

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

                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <div class="col-md-4">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Agregar Categorias </h3>
                        </div>

                        <div class="card-body">


                            <form method="post" action="../../controller/CategoriasController.php?accion=guardar" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="">

                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" checked="" type="radio" name="estado" value="1">
                                        <span class="custom-control-label"> Habilitado </span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" type="radio" name="estado" value="0">
                                        <span class="custom-control-label"> Desabilitar </span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input id="imagen" name="imagen" type="file" class="form-control" accept="image/png,image/jpeg">
                                </div>

                                <div class="form-group">
                                    <button id="btnAgregar" type="submit" class="btn btn-primary btn-block"> Agregar </button>
                                </div>

                            </form>


                        </div>


                    </div>

                </div>

            </div>
        </div>
        <script>
            $("#btnAgregar").click(function(e) {
                e.preventDefault();
                var nombre = $("#nombre").val();
                var estado = $('input:radio[name=estado]:checked').val();
                var imagen = $('#imagen').prop("files");
                console.log(imagen.length);
                if (imagen.length > 0 && nombre != "" && estado != "") {
                    var formData = new FormData();
                    formData.append('nombre', nombre);
                    formData.append('estado', estado);
                    formData.append('imagen', imagen);


                    for (let i = 0; i < imagen.length; i++) {
                        formData.append('imagen[' + i + ']', imagen[i])
                    }
                    $.ajax({
                        url: '../../controller/CategoriasController.php?accion=guardar', // point to server-side PHP script 
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