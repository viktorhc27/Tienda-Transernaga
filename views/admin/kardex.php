<style>
    .tt-menu {
        background-color: white;
        border-radius: 4px;
        border: 1px solid gray;
        margin-top: 10px;
        max-height: 200px;
        overflow-y: auto;
        width: 100%;
        text-align: center;
    }
</style>
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
                        <div>
                            
                        </div>
                        <div class="card-body text-center">
                            <form class="form-horizontal" method="post" action="../../controller/ReportesController.php?accion=kardex">
                                <div class="form-group">
                                    <label>Codigo del Producto</label>
                                    <input type="text" name="codigo" id="titulo" placeholder="Codigo Producto" class="form-control">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(function() {
        $("#titulo").autocomplete({
            source: '../../controller/ProductosController.php?accion=auto'
        });

    });
</script>