<?php


if (!empty($_SESSION['user'])) {

    include_once './model/Ventas.php';
    include_once './model/conexion.php';
    include_once './model/Productos.php';
    $ventas = new Ventas();
    $productos = new Productos();
    $id = $_SESSION['user']['id'];
    $pedidos = $ventas->mis_pedidos($id);
    

?>

    <section class="section-content padding-y bg">
        <div class="container">

            <!-- =========================  COMPONENT MYORDER 1 ========================= -->
            <div class="row">
                <aside class="col-md-3">
                    <!--   SIDEBAR   -->
                    <ul class="list-group">
                        <a class="list-group-item" href="?param=misdatos"> Mis datos</a>
                        <a class="list-group-item active" href="#"> Mis Pedidos</a>

                        <!--  <a class="list-group-item" href="#"> Return and refunds </a>
                        <a class="list-group-item" href="#">Settings </a>
                        <a class="list-group-item" href="#"> My Selling Items </a>
                        <a class="list-group-item" href="#"> Received orders </a> -->
                    </ul>
                    <br>
                    <a class="btn btn-light btn-block" href="#"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a>
                    <!--   SIDEBAR .//END   -->
                </aside>
                <main class="col-md-9">
                    <article class="card">
                        <header class="card-header">
                            <strong class="d-inline-block mr-3">Mis pedidos</strong>
                            <!-- <strong class="d-inline-block mr-3">Order ID: 6123456789</strong> -->
                            <!--  <span>Order Date: 16 December 2018</span> -->
                        </header>
                        <!-- <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-muted">Delivery to</h6>
                                <p>Michael Jackson <br>
                                    Phone +1234567890 Email: myname@pixsellz.com <br>
                                    Location: Home number, Building name, Street 123, Tashkent, UZB <br>
                                    P.O. Box: 100123
                                </p>
                            </div> 
                            <div class="col-md-4">
                                <h6 class="text-muted">Payment</h6>
                                <span class="text-success">
                                    <i class="fab fa-lg fa-cc-visa"></i>
                                    Visa **** 4216
                                </span>
                                <p>Subtotal: $356 <br>
                                    Shipping fee: $56 <br>
                                    <span class="b">Total: $456 </span>
                                </p>
                            </div>
                        </div> 
                    </div>  -->
                        <div class="table-responsive">
                            <?php if (!empty($pedidos)) { ?>
                                <table class="table table-hover">
                                    <tbody>
                                        <?php
                                        foreach ($pedidos as $s) : 
                                            $producto= $productos->buscar($s['productos_pro_id']);
                                        ?>
                                        

                                            <tr>
                                                <td >
                                                   
                                                    <img width="100px" src="resources/images/productos/<?= $producto['pro_id'] ?>/<?= $producto['pro_img'] ?>" class="img-xs border">
                                                </td>
                                                <td>
                                                    <p class="title mb-0"><?= $s['productos_pro_id'] ?></p>
                                                    <var class="price text-muted">Cantidad <?= $s['ven_cantidad'] ?></var><br>
                                                    <var class="price text-muted">CPL <?= number_format($s['ven_total'], 0, '.', '.') ?></var>
                                                </td>
                                                <td> Estado
                                                    <br>
                                                    <?php
                                                    if ($s['estados_id'] == 1) {
                                                        echo "<i style='color: orange;' class='fas fa-concierge-bell'> Esperando confirmacion</i>";
                                                    }
                                                    if ($s['estados_id'] == 2) {
                                                        echo "<i style='color: green;' class='fas fa-check-circle'> Confirmado</i>";
                                                    }
                                                    if ($s['estados_id'] == 3) {
                                                        echo "<i style='color: chocolate;' class='fas fa-truck-loading'> En Preparación</i>";
                                                    }
                                                    if ($s['estados_id'] == 4) {
                                                        echo "<i style='color: indigo;' class='fas fa-truck'> En reparto</i>";
                                                    }
                                                    if ($s['estados_id'] == 5) {
                                                        echo "<i style='color: green;' class='fas fa-check-circle'> Recibido</i>";
                                                    }
                                                    if ($s['estados_id'] == 6) {
                                                        echo "<i style='color: red;' class='fas fa-truck'> solicitud de cancelacion</i>";
                                                    }
                                                    if ($s['estados_id'] == 7) {
                                                        echo "<i style='color: red;' class='fas fa-check-circle'> Cancelado</i>";
                                                    }
                                                    ?>
                                                </td>
                                                <td width="250"> <a href="?param=detalles&id=<?= $s['venta_id'] ?>" class="btn btn-light"> Detalles </a> </td>
                                            </tr>



                                        <?php
                                        endforeach;


                                        ?>
                                    </tbody>
                                </table>

                            <?php } else {
                                echo "NO TIENES PEDIDOS";
                            } ?>


                        </div> <!-- table-responsive .end// -->
                    </article> <!-- order-group.// -->
                </main>
            </div> <!-- row.// -->
        </div>

    </section>
<?php
} else { ?>

    <section class="section-content padding-y bg">
        <div class="container">


            <div class="row">
                <aside class="col-md-3">

                    <ul class="list-group">
                        <a class="list-group-item active" href="#"> Busca tu pedido</a>

                    </ul>

                </aside>
                <main class="col-md-9">
                    <article class="card">
                        <header class="card-header">
                            <strong class="d-inline-block mr-3">Mis pedidos</strong>

                        </header>

                        <div class="card-body">


                            <!-- <h4 class="card-title mb-4">Get newsletters</h4> -->
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ID de Pedido" name="">
                                    <span class="input-group-append"><button class="btn btn-primary">Buscar</button></span>
                                </div><br>
                                <div class="input-group">
                                    Resultado
                                </div>
                            </form>
                            <!-- card-body.// -->



                        </div> <!-- table-responsive .end// -->
                    </article> <!-- order-group.// -->
                </main>
            </div> <!-- row.// -->
        </div>

    </section>
<?php
}

?>