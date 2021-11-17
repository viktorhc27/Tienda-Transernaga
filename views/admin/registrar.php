<?php
include_once '../../model/Roles.php';
include_once '../../model/Usuarios.php';
$roles = new Roles();
$usuarios = new Usuarios();
$listas_usuarios = $usuarios->listar_funcionarios();
$lista_roles = $roles->leer();

?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Funcionarios</li>
            </ol>
        </nav>

        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Lista de Funcionarios</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Direccion</th>
                                        <th>Genero</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($listas_usuarios as $s) :
                                    ?> <tr>

                                            <td><?= $s['us_nombre'] ?></td>
                                            <td><?= $s['us_telefono'] ?></td>
                                            <td><?= $s['us_correo'] ?></td>
                                            <td><?= $s['us_direccion'] ?></td>
                                            <td><?= $s['us_sexo'] ?></td>
                                            <td><?= $s['roles_ro_id'] ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <button class="dropdown-item" type="button">Modificar</button>
                                                        <button class="dropdown-item" type="button">Ver</button>
                                                        <button class="dropdown-item" type="button">Desabilitar</button>
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
                <div class="col-md-3">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Registrar </h3>
                        </div>

                        <div class="card-body">

                            <!-- 
                            <form method="post" action="../../controller/UsuariosController.php?accion=register_employees"> -->

                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="nombre" name="nombre" type="text" class="form-control" placeholder="">
                                <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input id="app" name="app" type="text" class="form-control" placeholder="">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input id="apm" name="apm" type="text" class="form-control" placeholder="">
                            </div> <!-- form-group end.// -->



                            <div class="form-group">
                                <label>Email</label>
                                <input id="correo" name="correo" type="email" class="form-control" placeholder="">
                                <!-- <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small> -->
                            </div> <!-- form-group end.// -->


                            <div class="form-group">
                                <select id="sexo" class="form-control">
                                    <option value="">Select</option>
                                    <option value="hombre">Hombre</option>
                                    <option value="mujer">Mujer</option>
                                </select>
                            </div> <!-- form-group end.// -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Telefono</label>
                                    <input id="telefono" name="telefono" type="text" class="form-control">
                                </div> <!-- form-group end.// -->
                                <div class="form-group col-md-6">
                                    <label>Direccion</label>
                                    <input id="direccion" name="direccion" type="" id="direccion" type="text" class="form-control">

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Departamento</label>
                                    <input id="departamento" name="departamento" id="departamento" type="text" class="form-control">

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Block</label>
                                    <input id="block" name="block" id="block" type="text" class="form-control">

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Numero</label>
                                    <input id="numero" name="numero" id="numero" type="text" class="form-control">
                                </div>

                            </div> <!-- form-row.// -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Contraseña</label>
                                    <input id="password" name="password" type="password" class="form-control" type="password">
                                </div> <!-- form-group end.// -->
                                <div class="form-group col-md-6">
                                    <label>Repetir contraseña</label>
                                    <input class="form-control" type="password">
                                </div> <!-- form-group end.// -->
                            </div>

                            <div class="form-group ">
                                <label>Rol</label>
                                <select id="rol" name="rol" class="form-control">
                                    <option>Seleccione...</option>
                                    <?php

                                    foreach ($lista_roles as $r) :
                                    ?>

                                        <option value="<?= $r['ro_id'] ?>"><?= $r['rol_nombre'] ?></option>

                                    <?php
                                    endforeach;

                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <button id="btnGuardar" type="submit" class="btn btn-primary btn-block"> Registrar </button>
                            </div> <!-- form-group// -->

                            <!-- </form>
 -->

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

        <script type="text/javascript">
            $("#btnGuardar").click(function(e) {
                e.preventDefault();
                var nombre = $("#nombre").val();
                var app = $("#app").val();
                var apm = $("#apm").val();
                var correo = $("#correo").val();
                var password = $("#password").val();
                var telefono = $("#telefono").val();
                var direccion = $("#direccion").val();
                var departamento = $("#departamento").val();
                var block = $("#block").val();
                var numero = $("#numero").val();
                var direccion_full = direccion + ", " + departamento + ", " + block + ", N° " + numero;
                var sexo = $("#sexo").val()
                var rol = $("#rol").val()


                if (nombre != "" && app != "" && apm != "" && correo != "" && password != "" && telefono != "" && direccion && departamento != "" && block != "" && numero != "" && sexo != "" && rol != "") {

                    datos = {
                        "nombre": nombre,
                        "app": app,
                        "apm": apm,
                        "correo": correo,
                        "password": password,
                        "telefono": telefono,
                        "direccion": direccion_full,
                        "sexo": sexo,
                        "rol": rol,

                    };
                    console.log(datos)

                    $.ajax({
                        url: '../../controller/UsuariosController.php?accion=register_employees',
                        type: 'POST',
                        data: datos,

                    }).done(function(respuesta) {


                        if (respuesta.estado === "agregado") {

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Agregado',
                                showConfirmButton: false,
                                timer: 1500
                            })

                            $('#modal-sm').modal('hide');
                            setTimeout(function() {
                                location.reload();
                            }, 1000)
                        }
                    })

                } else {
                    $('#nombre').removeClass('is-valid');
                    $('#nombre').addClass('is-invalid');
                    $('#app').removeClass('is-valid');
                    $('#app').addClass('is-invalid');
                    $('#apm').removeClass('is-valid');
                    $('#apm').addClass('is-invalid');
                    $('#correo').removeClass('is-valid');
                    $('#correo').addClass('is-invalid');
                    $('#password').removeClass('is-valid');
                    $('#password').addClass('is-invalid');
                    $('#telefono').removeClass('is-valid');
                    $('#telefono').addClass('is-invalid');
                    $('#sexo').removeClass('is-valid');
                    $('#sexo').addClass('is-invalid');
                    $('#rol').removeClass('is-valid');
                    $('#rol').addClass('is-invalid');
                    $('#direccion').removeClass('is-valid');
                    $('#direccion').addClass('is-invalid');
                    $('#numero').removeClass('is-valid');
                    $('#numero').addClass('is-invalid');



                }
            })
            //valida correo
            $("#correo").blur(function() {
                var correo = $("#correo").val();

                if (correo != "") {
                    if (correo.indexOf('@', 0) == -1 || correo.indexOf('.', 0) == -1) {
                        $('#correo').removeClass('is-valid');
                        $('#correo').addClass('is-invalid');

                    } else {
                        datos = {
                            "correo": correo
                        };

                        $.ajax({
                            url: '../../../controllers/employeesControllers.php?accion=verificar',
                            type: 'POST',
                            data: datos,

                        }).done(function(respuesta) {
                            console.log(JSON.stringify(respuesta));
                            if (respuesta.datos === "existe") {
                                $('#correo').removeClass('is-valid');
                                $('#correo').addClass('is-invalid');
                                console.log("correo ocupado")
                            }
                            if (respuesta.datos === "no existe") {
                                $('#correo').removeClass('is-invalid');
                                $('#correo').addClass('is-valid');
                                console.log("correo no ocupado")
                            }
                        })

                    }

                } else {
                    $('#correo').removeClass('is-valid');
                    $('#correo').addClass('is-invalid');
                }
            });

            $("#nombre").blur(function() {
                var nombre = $("#nombre").val();
                if (nombre.trim() != '') {
                    $('#nombre').removeClass('is-invalid');
                    $('#nombre').addClass('is-valid');
                } else {
                    $('#nombre').removeClass('is-valid');
                    $('#nombre').addClass('is-invalid');
                }

            });
            $("#app").blur(function() {
                var apellidos = $("#app").val();
                if (apellidos.trim() != '') {
                    $('#app').removeClass('is-invalid');
                    $('#app').addClass('is-valid');
                } else {
                    $('#app').removeClass('is-valid');
                    $('#app').addClass('is-invalid');
                }

            });
            $("#apm").blur(function() {
                var apellidos = $("#apm").val();
                if (apellidos.trim() != '') {
                    $('#apm').removeClass('is-invalid');
                    $('#apm').addClass('is-valid');
                } else {
                    $('#apm').removeClass('is-valid');
                    $('#apm').addClass('is-invalid');
                }

            });
            $("#password").blur(function() {
                var dato = $("#password").val();
                if (dato.trim() != '') {
                    $('#password').removeClass('is-invalid');
                    $('#password').addClass('is-valid');
                } else {
                    $('#password').removeClass('is-valid');
                    $('#password').addClass('is-invalid');
                }

            });
            $("#telefono").blur(function() {
                var dato = $("#telefono").val();
                if (dato.trim() != '') {
                    $('#telefono').removeClass('is-invalid');
                    $('#telefono').addClass('is-valid');
                } else {
                    $('#telefono').removeClass('is-valid');
                    $('#telefono').addClass('is-invalid');
                }

            });
            $("#sexo").blur(function() {
                var dato = $("#sexo").val();
                if (dato.trim() != '') {
                    $('#sexo').removeClass('is-invalid');
                    $('#sexo').addClass('is-valid');
                } else {
                    $('#sexo').removeClass('is-valid');
                    $('#sexo').addClass('is-invalid');
                }

            });
            $("#rol").blur(function() {
                var dato = $("#rol").val();
                if (dato.trim() != '') {
                    $('#rol').removeClass('is-invalid');
                    $('#rol').addClass('is-valid');
                } else {
                    $('#rol').removeClass('is-valid');
                    $('#rol').addClass('is-invalid');
                }

            });
            $("#estado").blur(function() {
                var dato = $("#estado").val();
                if (dato.trim() != '') {
                    $('#estado').removeClass('is-invalid');
                    $('#estado').addClass('is-valid');
                } else {
                    $('#estado').removeClass('is-valid');
                    $('#estado').addClass('is-invalid');
                }

            });
        </script>