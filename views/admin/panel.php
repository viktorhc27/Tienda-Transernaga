<?php

include '../../model/Ventas.php';
include '../../model/Usuarios.php';
include '../../model/Productos.php';
$ventas = new Ventas();
$usuarios = new Usuarios();
$productos = new Productos();
$ventas = $ventas->leer();
$usuarios = $usuarios->leer();
$productos = $productos->leer();

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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <!-- <div class="card-header">
                                <h3 class="card-title ">Agregar</h3>
                            </div> -->
                        <!-- /.card-header -->
                        <!-- form start -->


                        <!-- ============================ COMPONENT 2 ================================= -->
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
                                    </figure> <!-- iconbox // -->
                                </article> <!-- panel-lg.// -->
                            </div><!-- col // -->
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
                                    </figure> <!-- iconbox // -->
                                </article> <!-- panel-lg.// -->
                            </div><!-- col // -->
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
                                    </figure> <!-- iconbox // -->
                                </article> <!-- panel-lg.// -->
                            </div><!-- col // -->




                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Productos Agregados</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Stock</th>
                                          
                                                <th>Estado</th>


                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($productos as $p) :
                                            ?>
                                                <tr>
                                                    
                                                   
                                                    <td><?= $p['pro_nombre'] ?></td>
                                                    <td><?= $p['pro_precio_venta'] ?></td>
                                                    <td><?= $p['pro_stock'] ?></td>
                                                    
                                                   
                                                    <td><?= $p['pro_estado'] ?></td>
                                                   
                                                </tr>

                                            <?php
                                            endforeach;
                                            ?>



                                        </tbody>
                                    </table>

                           
                        </div>

                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title "></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
        </div>