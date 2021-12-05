<div class="container">
    <section class="section-conten padding-y" style="min-height:84vh">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kardex</li>
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
                            <h3 class="card-title ">Kardex por producto</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body text-center">
                            <form class="form-horizontal" method="post" action="../../controller/ReportesController.php?accion=kardex">
                                <div class="form-group">
                                    <label>Codigo del Producto</label>
                                    <input type="text" name="codigo" class="form-control" placeholder="Codigo Producto">
                                    <br>
                                    <button class="btn btn-success">Buscar</button>
                                </div>
                            </form>

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