<?php

$hoy = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
?>
<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas</li>
            </ol>
        </nav>

        <br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title ">Reporte Inventario</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <h3 class="text-center">Generar Reporte de Inve ntario Personalizado</h3>
                            <div class="form-row text-center">
                                <form class="col-md-12" method="post" action="./reportes/reporte_inventario.php">
                                    <div class="form-group col-md-12">
                                        <label>ORDENAR POR</label>
                                        <select name="orden" class="form-control">
                                            <option value="1">Nombre (Ascendente)</option>
                                            <option value="2">Nombre (Descendente)</option>
                                            <option value="3">Stock (menor - mayor)</option>
                                            <option value="4">Stock (mayor - menor)</option>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-12">

                                        <button href="#" class="btn btn-success">Generar Reporte</button>
                                    </div>
                                </form>
                            </div>

                        </div>


                    </div>
                    <!-- form start -->

                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>


            <!-- /.row -->
        </div>
</div>