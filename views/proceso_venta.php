<?php

include_once './model/Conexion.php';
include_once './model/Productos.php';
include_once './model/Usuarios.php';

$productos = new Productos();
$usuarios = new Usuarios();

$impuestos = 18;

?>


<section class="section-conten padding-y" style="min-height:84vh">
    <div class="container">
        <?php
        if (!empty($_SESSION['user'])) {
        } else {

        ?> <div class="alert alert-warning" role="alert">
                <i class="fas fa-question"></i>

                ¿Ya eres cliente? Haz clic <a href="#" class="alert-link">aquí</a>.para acceder
            </div>

        <?php
        }

        ?>

        <div class="row">
            <div class="col-md-6">
                <div class="card mx-auto">
                    <?php
                    if (!empty($_SESSION['user'])) {
                        $us = $usuarios->buscar($_SESSION['user']['id']);
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Perfil de Entrega</h4>
                                <form method="post" action="controller/PagosController.php?accion=registrado">
                                <div class="form-group">
                                    <i style="font-size:80px" class="far fa-user "></i>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" value="<?= $us['us_nombre'] ?>" disabled>
                                        <input type="hidden" name="id" class="form-control" value="<?= $us['us_id'] ?>" >
                                    </div> <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <label>Apellidos</label>
                                        <input type="hidden" name="app" value="<?= $us['us_apellApp'] ?>">
                                        <input type="hidden" name="apm" value="<?= $us['us_apellApm'] ?>">

                                        <input type="text" class="form-control" value="<?= $us['us_apellApp'] . " " . $us['us_apellApm'] ?>" disabled>
                                        <input type="hidden" name= class="form-control" value="<?= $us['us_apellApp'] . " " . $us['us_apellApm'] ?>" disabled>
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row.// -->

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Telefono</label>
                                        <input type="text" name="telefono" class="form-control" value="<?= $us['us_telefono'] ?>" disabled>
                                        <input type="hidden" name="telefono" class="form-control" value="<?= $us['us_telefono'] ?>" >
                                    </div> <!-- form-group end.// -->
                                    <div class="form-group col-md-6">
                                        <label>Direccion</label>
                                        <input type="text" name="direccion" class="form-control" value="<?= $us['us_direccion'] ?>" disabled>
                                        <input type="hidden" name="direccion" class="form-control" value="<?= $us['us_direccion'] ?>" >
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row.// -->

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Correo</label>
                                        <input type="text" name="correo" class="form-control" value="<?= $us['us_correo'] ?>" disabled>
                                        <input type="hidden" name="correo" class="form-control" value="<?= $us['us_correo'] ?>" >
                                    </div> <!-- form-group end.// -->

                                </div> <!-- form-row.// -->
                            </div> <!-- card-body.// -->
                        </div> <!-- card .// -->

                </div> <!-- card .// -->
            </div>
            <div class="col-md-6">

                <article class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Tipo de Armado</h4>
                        <form action="">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="js-check box ">
                                        <input type="radio" name="tipo_armado" value="domicilio" checked="">
                                        <h6 class="title">Armar en Domicilio</h6>
                                        <p class="text-muted">El producto sera transportado hacia su domicio, para posteriormente realizar el ensamblaje del producto </p>
                                    </label> <!-- js-check.// -->
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="js-check box">
                                        <input type="radio" name="tipo_armado" value="empresa">
                                        <h6 class="title">Armar en empresa</h6>
                                        <p class="text-muted">El producto sera ensamblado en la empresa y porteriormente realizar la entrega en su domicilio </p>
                                    </label> <!-- js-check.// -->
                                </div>
                            </div> <!-- row.// -->


                    </div> <!-- card-body.// -->
                    <button class="btn btn-warning btn-block"> Pagar</a>
                        </form>
                </article>
            </div> <!-- card .// -->
        <?php
                    } else { ?>

            <article class="card-body">
                <header class="mb-4">
                    <h4 class="card-title">Direccion de entrega</h4>
                </header>
                <form method="post" action="controller/PagosController.php?accion=no_registrado">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Nombre</label>
                            <input name="nombre" type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        <div class="col form-group">
                            <label>Apellido Paterno</label>
                            <input name="app" type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        <div class="col form-group">
                            <label>Apellido Materno</label>
                            <input name="apm" type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->
                    <div class="form-group">
                        <label>Email</label>
                        <input name="correo" type="email" class="form-control" placeholder="">
                        <small class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                    </div> <!-- form-group end.// -->
                    <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" id="radio1" type="radio" name="sexo" value="hombre">
                            <span class="custom-control-label"> Masculino </span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" id="radio1" type="radio" name="sexo" value="mujer">
                            <span class="custom-control-label"> Femenino </span>
                        </label>
                    </div> <!-- form-group end.// -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Telefono</label>
                            <input name="telefono" id="telefono" type="text" class="form-control">
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Direccion</label>
                            <input name="direccion" id="direccion" type="text" class="form-control">

                        </div>
                        <div class="form-group col-md-6">
                            <label>Departamento</label>
                            <input name="departamento" id="departamento" type="text" class="form-control">

                        </div>
                        <div class="form-group col-md-6">
                            <label>Block</label>
                            <input name="block" id="block" type="text" class="form-control">

                        </div>
                        <div class="form-group col-md-6">
                            <label>Numero</label>
                            <input name="numero" id="numero" type="text" class="form-control">
                        </div>
                    </div> <!-- form-row.// -->

            </article><!-- card-body.// -->

        </div> <!-- card .// -->
    </div>
    <div class="col-md-6">

        <article class="card mb-4">
            <div class="card-body">
                <h4 class="card-title mb-4">Tipo de Armado</h4>
                <form action="">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label class="js-check box ">
                                <input type="radio" name="tipo_armado" value="domicilio" checked="">
                                <h6 class="title">Armar en Domicilio</h6>
                                <p class="text-muted">El producto sera transportado hacia su domicio, para posteriormente realizar el ensamblaje del producto </p>
                            </label> <!-- js-check.// -->
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="js-check box">
                                <input type="radio" name="tipo_armado" value="empresa">
                                <h6 class="title">Armar en empresa</h6>
                                <p class="text-muted">El producto sera ensamblado en la empresa y porteriormente realizar la entrega en su domicilio </p>
                            </label> <!-- js-check.// -->
                        </div>
                    </div> <!-- row.// -->


            </div> <!-- card-body.// -->
            <button class="btn btn-warning btn-block"> Pagar</a>
                </form>
        </article>
    </div> <!-- card .// -->
<?php

                    }

?>

</div>
<br>
<hr>
<br>
<div class="row">
    <div class="col-md-12">

        <table id="res" class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($_SESSION['cart'] as $c) :

                    $pro = $productos->buscar($c['id_producto']);
                ?>
                    <tr>
                        <td scope="row">#</th>
                        <td scope="row"><img width="90px" src="./resources/images/productos/<?= $pro['pro_id'] ?>/<?= $pro['pro_img'] ?>"></th>
                        <td><?= $pro['pro_nombre'] ?></td>
                        <td><?= $c['cantidad'] ?></td>
                        <td class="countable"><?= $pro['pro_precio_venta'] * $c['cantidad'] ?> </td>
                    </tr>

                <?php
                endforeach;

                ?>

            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div>

            <div class="card-body">
                <dl class="dlist-align">
                    <dt>Armado</dt>
                    <dd class="armado text-right">15000</dd>
                </dl>
                <dl class="dlist-align">
                    <dt>Impuestos</dt>

                    <dd id="impuesto" class="text-right"></dd>
                </dl>

                <dl class="dlist-align">
                    <dt>Total:</dt>
                    <dd id="preciototal" class="countable text-right text-dark b"></dd>
                </dl>
                <hr>
                <!-- <a href="./views/boleta.php" class="btn btn-warning btn-block"> Pagar</a> -->

                < </div>
            </div>
        </div>

    </div>


</div>


</section>
<script>
    var sum = 0;
    var table = document.getElementById("res");
    var ths = table.getElementsByTagName('th');
    var tds = table.getElementsByClassName('countable');
    var impuestos = 18


    const armado = Array.from(document.getElementsByClassName("armado"));
    var n_armado = parseInt(armado[0].innerText);

    for (var i = 0; i < tds.length; i++) {
        sum += isNaN(tds[i].innerText) ? 0 : parseInt(tds[i].innerText);
    }

    var row = table.insertRow(table.rows.length);
    var cell = row.insertCell(0);
    cell.setAttribute('colspan', ths.length);
    var stotal = sum + n_armado;
    var impuesto = sum * (impuestos / 100)
    var total = stotal + impuesto;
    console.log(sum);
    console.log(impuesto);
    console.log(stotal);
    console.log(total);


    var totalBalance = document.createTextNode('$  ' + total);

    var decimales = "0"

    document.getElementById("impuesto").innerHTML = "$ " + number_format(impuesto, decimales);

    document.getElementById("preciototal").innerHTML = "$ " + number_format(totalBalance.textContent, decimales);



    function number_format(amount, decimals) {

        amount += ''; // por si pasan un numero en vez de un string
        amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

        decimals = decimals || 0; // por si la variable no fue  pasada

        // si no es un numero o es igual a cero retorno el mismo cero
        if (isNaN(amount) || amount === 0)
            return parseFloat(0).toFixed(decimals);

        // si es mayor o menor que cero retorno el valor formateado como numero
        amount = '' + amount.toFixed(decimals);

        var amount_parts = amount.split('.'),
            regexp = /(\d+)(\d{3})/;

        while (regexp.test(amount_parts[0]))
            amount_parts[0] = amount_parts[0].replace(regexp, '$1' + '.' + '$2');

        return amount_parts.join('.');
    }
</script>