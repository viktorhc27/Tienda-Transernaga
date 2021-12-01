<?php
include_once '../../model/Productos.php';
include_once '../../model/Usuarios.php';
include_once '../../model/Conexion.php';

$productos = new Productos();

$listaproductos = $productos->leer();

?>
<style>
    .dropdown dd,
    .dropdown dt,
    .dropdown ul {
        margin: 0px;
        padding: 0px;
    }

    .dropdown dd {
        position: relative;
    }

    .dropdown a,
    .dropdown a:visited {
        color: #000000;
        text-decoration: none;
        outline: none;
    }

    .dropdown dt a {
        background: url('http://www.jankoatwarpspeed.com/wp-content/uploads/examples/reinventing-drop-down/arrow.png') no-repeat scroll right center;
        display: block;
        padding-right: 20px;
        width: 150px;
    }

    .dropdown dt a span {
        cursor: pointer;
        display: block;
        padding: 5px;
    }

    .dropdown dd ul {
        background: none repeat scroll 0 0;
        color: #C5C0B0;
        display: none;
        left: 0px;
        padding: 5px 0px;
        position: absolute;
        top: 2px;
        width: auto;
        min-width: 170px;
        list-style: none;
    }

    .dropdown span.value {
        display: none;
    }

    .dropdown dd ul li a {
        padding: 5px;
        display: block;
    }

    .dropdown img.flag {
        vertical-align: middle;
        margin-right: 10px;
        float: left;
    }

    .flagvisibility {
        display: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-content">
                <div class="card-header">
                    <h3 class="card-title">Agregar Stock</h3>
                </div>

                <div class="card-body">
                    <form id="formulario" method="post" action="../../controller/ProductosController.php?accion=agregar_producto" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <select class="form-control" size="10" multiple>

                                    <?php
                                    foreach ($listaproductos as $productos) : ?>
                                        <option value="<?= $productos['id'] ?>"> <?= $productos['pro_nombre'] ?></option>

                                    <?php
                                    endforeach;

                                    ?>

                                </select>
                            </div>

                        </div>
                        <dl id="sample" class="dropdown">
                            <dt><a href="#"><span>Seleccione : </span></a></dt>
                            <dd>
                                <ul>
                                    
                                    <?php
                                    foreach ($listaproductos as $productos) : ?>
                                        
                                        <li><a href="#"><?= $productos['pro_nombre'] ?><img class="flag" style="width:70px;" src="../../resources/images/productos/<?=$p['pro_id']?>/<?=$p['pro_img']?>" alt="" /><span class="value">FR</span></a></li>
                                    <?php
                                    endforeach;

                                    ?>
                                </ul>
                            </dd>
                        </dl>


                        <button id="btn_guardar" type="submit" class="btn btn-primary">Agregar</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".dropdown img.flag").addClass("flagvisibility");
    $(".dropdown dt a").click(function() {
        $(".dropdown dd ul").toggle();
    });

    $(".dropdown dd ul li a").click(function() {
        var text = $(this).html();
        $(".dropdown dt a span").html(text);
        $(".dropdown dd ul").hide();
        $("#result").html("Selected value is: " + getSelectedValue("sample"));
    });

    function getSelectedValue(id) {
        return $("#" + id).find("dt a span.value").html();
    }

    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown"))
            $(".dropdown dd ul").hide();
    });

    $(".dropdown img.flag").toggleClass("flagvisibility");
</script>