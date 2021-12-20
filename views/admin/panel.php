<?php

include '../../model/Ventas.php';
include '../../model/Usuarios.php';
include '../../model/Productos.php';
include_once '../../model/Categorias.php';
include_once '../../model/Marcas.php';
$ventas = new Ventas();
$usuarios = new Usuarios();
$productos = new Productos();
$ventas = $ventas->leer();
$usuarios = $usuarios->leer();
$productos = $productos->leer_assoc();

$m = new Marcas();
$c = new Categorias();

?>

<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Inicio </a></li>
                <li class="breadcrumb-item " aria-current="page">Panel Principal</li>
            </ol>
        </nav>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="row">
                            <div class="col-md-4">
                                <article class="card card-body">
                                    <figure class="itemside">
                                        <div class="aside">
                                            <span class="icon-sm rounded-circle bg-warning">
                                                <i class="fa fa-money-bill-alt white"></i>
                                            </span>
                                        </div>
                                        <figcaption class="info">
                                            <h5 class="title">Productos</h5>
                                            <p><?= count($productos) ?></p>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-md-4">
                                <article class="card card-body">
                                    <figure class="itemside">
                                        <div class="aside">
                                            <span class="icon-sm rounded-circle bg-primary">
                                                <i class="fa fa-money-bill-alt white"></i>
                                            </span>
                                        </div>
                                        <figcaption class="info">
                                            <h5 class="title">Ventas</h5>
                                            <p><?= count($ventas) ?></p>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <div class="col-md-4">
                                <article class="card card-body">
                                    <figure class="itemside">
                                        <div class="aside">
                                            <span class="icon-sm rounded-circle bg-success">
                                                <i class="fa fa-truck white"></i>
                                            </span>
                                        </div>
                                        <figcaption class="info">
                                            <h5 class="title">Clientes Registrados</h5>
                                            <p><?= count($usuarios) ?></p>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Administración</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <section class="section-content padding-y bg">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a style="color: black;" href="?param=registrar">
                                                    <article class="card card-body">
                                                        <figure class="text-center">
                                                            <span class="rounded-circle icon-md bg-success"><i class="fas fa-users white"></i></span>
                                                            <figcaption class="pt-4">
                                                                <h5 class="title">Usuarios</h5>
                                                            </figcaption>
                                                        </figure>
                                                    </article>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a style="color: black;" href="?param=ventas">
                                                    <article class="card card-body">
                                                        <figure class="text-center">
                                                            <span class="rounded-circle icon-md bg-primary"><i class="fas fa-shopping-bag white"></i></span>
                                                            <figcaption class="pt-4">
                                                                <h5 class="title">Ventas</h5>
                                                            </figcaption>
                                                        </figure>
                                                    </article>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a style="color: black;" href="?param=reportes_ventas">
                                                    <article class="card card-body">
                                                        <figure class="text-center">
                                                            <span class="rounded-circle icon-md bg-primary"><i class="fas fa-file-pdf white"></i></span>
                                                            <figcaption class="pt-4">
                                                                <h5 class="title">Reportes</h5>
                                                            </figcaption>
                                                        </figure>
                                                    </article>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a style="color: black;" href="?param=productos">
                                                    <article class="card card-body">
                                                        <figure class="text-center">
                                                            <span class="rounded-circle icon-md bg-danger"><i class="fa fa-concierge-bell white"></i></span>
                                                            <figcaption class="pt-4">
                                                                <h5 class="title">Servicios</h5>

                                                            </figcaption>
                                                        </figure>
                                                    </article>
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <a style="color: white;" href="?param=kardex">
                                                    <article class="card card-body">
                                                        <figure class="text-center">
                                                            <span class="rounded-circle icon-md bg-success"><i class="fas fa-search"></i></span>
                                                            <figcaption class="pt-4">
                                                                <h5 class="title" style="color: black">Kardex</h5>

                                                            </figcaption>
                                                        </figure>
                                                    </article>
                                                </a>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h3 class=" text-center">Grafico de Ventas por dias</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Fecha de inicio</label>
                                    <input id="fecha1" type="date" class="form-control" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha de Final</label>
                                    <input id="fecha2" type="date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- <div class="form-group col-md-6">
                                    <label>Fecha de Final</label>
                                    <select id="opcion" class="form-control">
                                        <option>Seleccione</option>
                                        <option value="dias">Dias</option>
                                       
                                    </select>
                                </div> -->
                            </div>
                            <button id="btn" class="btn btn-primary">Agregar</button>
                            <canvas id="myChart" width="600" height="500" style="display: block; box-sizing: border-box; height: 233px; width: 280.333px;"></canvas>
                        </div>

                    </div>

                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-head">
                            <h3 class="text-center">Agregados Recientemente</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Categoria</th>
                                    <th>Marca</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $p) :

                                    $categoria_nombre = $c->buscar($p['categorias_cat_id']);

                                    $nombre_m = $m->buscar($p['marcas_mar_id']);
                                ?>

                                    <tr>
                                        <td><?= $p['pro_id'] ?></td>
                                        <td><?= $p['pro_codigo'] ?></td>
                                        <td><?= $p['pro_nombre'] ?></td>
                                        <td><img width="50px" src="../../resources/images/productos/<?= $p['pro_id'] ?>/<?= $p['pro_img'] ?>"></td>
                                        <td><?= $categoria_nombre['cat_nombre'] ?></td>
                                        <td><?= $nombre_m['mar_nombre'] ?></td>
                                        <td><?php
                                            if ($p['pro_estado'] == 1) { ?>
                                                <span class="badge badge-success"> Habilitado </span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger"> desabilitado </span>
                                            <?php }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

</div>
</section>
</div>
<script>
    $("#fecha1").change(function() {
        destroy()
        render()
    })
    $("#btn").click(function() {

        const ctx = document.getElementById('myChart').getContext('2d');

        var miArray = new Array()
        var valores = new Array()
        var datos = miArray;
        var fechaInicio = new Date($('#fecha1').val()).getTime();
        var fechaFin = new Date($('#fecha2').val()).getTime();
        var strfecha1 = formato($('#fecha1').val());
        var strfecha2 = $('#fecha2').val();

        function formato(texto) {
            return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3/$2/$1');
        }
        /* var opcion = $('#opcion').val() */
        var opcion = 'dias';
        var diff = fechaFin - fechaInicio;


        switch (opcion) {

            case 'dias':


                diferecia = (diff / (1000 * 60 * 60 * 24)) + 1;

                var datos = new Array()

                datos[0] = strfecha1

                for (var i = 1; i < diferecia; i++) {

                    var strfecha1 = sumaFecha(1, strfecha1);
                    datos[i] = strfecha1
                }
                /* console.log(datos); */
                $.ajax({
                    url: '../../controller/GraficosController.php?accion=dias',
                    type: 'POST',
                    data: {
                        'array': JSON.stringify(datos)
                    },

                }).done(function(respuesta) {
                    console.log(respuesta);
                    for (var i = 0; i < diferecia; i++) {
                        valores[i] = respuesta[i].valor;
                        /* console.log(respuesta[i].valor); */
                    }



                    var fechas = datos

                    const myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: datos,
                            datasets: [{
                                label: '',
                                data: valores,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    console.log(valores);

                })
                break;
            case 'años':

                console.log(diff / (31536000000));

                break;
        }



    });

    /*  const ctx = document.getElementById('myChart').getContext('2d');
     var miArray = new Array()
     var datos = miArray; */

    sumaFecha = function(d, fecha) {
        var Fecha = new Date();
        var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() + 1) + "/" + Fecha.getFullYear());
        var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
        var aFecha = sFecha.split(sep);
        var fecha = aFecha[2] + '/' + aFecha[1] + '/' + aFecha[0];
        fecha = new Date(fecha);
        fecha.setDate(fecha.getDate() + parseInt(d));
        var anno = fecha.getFullYear();
        var mes = fecha.getMonth() + 1;
        var dia = fecha.getDate();
        mes = (mes < 10) ? ("0" + mes) : mes;
        dia = (dia < 10) ? ("0" + dia) : dia;
        var fechaFinal = dia + sep + mes + sep + anno;
        return (fechaFinal);
    }
</script>