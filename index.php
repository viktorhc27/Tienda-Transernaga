<?php
session_start();
if (empty($_REQUEST["param"])) {
    $_REQUEST['param'] = "inicio";
}
//cacquitasdasda
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="https://muebleslagos.cl/wp-content/uploads/2018/02/cropped-logo-Horizontal-32x32.png" sizes="32x32">
    <title>Transernaga</title>

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    <script src="resources/js/jquery-2.0.0.min.js" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="resources/css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link href="resources/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

    <!-- custom style -->
    <link href="resources/css/ui.css" rel="stylesheet" type="text/css" />
    <link href="resources/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    <script src="resources/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="resources/sweetalert2/dist/sweetalert2.min.css">

    <!-- Flexslider -->
    <link href="./resources/FlexSlider/flexslider.css" type="text/css" rel="stylesheet">

    <!-- custom javascript -->
    <script src="js/script.js" type="text/javascript"></script>

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code

        });
        // jquery end
    </script>

    <!-- script Flexslider -->
    <script src="./resources/FlexSlider/jquery.flexslider-min.js"></script>
</head>

<body>
    <header class="section-header">
        <nav style="background-color: #9a7200; " class="navbar navbar-black p-0 navbar-expand border-bottom">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> USD </a>
                        <ul class="dropdown-menu small">
                            <li><a class="dropdown-item" href="#">EUR</a></li>
                            <li><a class="dropdown-item" href="#">AED</a></li>
                            <li><a class="dropdown-item" href="#">RUBL </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Language </a>
                        <ul class="dropdown-menu small">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Arabic</a></li>
                            <li><a class="dropdown-item" href="#">Russian </a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link"> <i class="fa fa-comment"></i> Customer care </a></li>
                </ul>
            </div> <!-- container //  -->
            <!-- container .l.//  -->
        </nav>
        <section class="border-bottom">
            <nav class="navbar navbar-main navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="resources/images/logo-muebles.png" class="logo"></a>


                    <a href="?param=cart" class="widget-header d-md-none">
                        <div class="icon">
                            <i class="icon-sm rounded-circle border fa fa-shopping-cart"></i>
                            <span class="notify">
                                <?php

                                if (!empty($_SESSION['carrito'])) {

                                    echo count($_SESSION['carrito']);
                                } else {
                                    echo "0";
                                }
                                ?>
                            </span>
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav1" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="main_nav1">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="?param=inicio">Inicio </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?param=productos">Productos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="?param=Categorias">Categorias</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Foods and Drink</a>
                                    <a class="dropdown-item" href="#">Home interior</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Category 1</a>
                                    <a class="dropdown-item" href="#">Category 2</a>
                                    <a class="dropdown-item" href="#">Category 3</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                        </ul>
                        <div class="widgets-wrap d-none d-md-block">
                            <a href="?param=pedidos" class="widget-header">
                                <div class="icon">
                                    <i class="icon-sm rounded-circle border fas fa-store"></i>

                                </div>
                            </a>

                            <a href="?param=cart" class="widget-header">
                                <div class="icon">
                                    <i class="icon-sm rounded-circle border fa fa-shopping-cart"></i>
                                    <span class="notify">
                                        <?php

                                        if (!empty($_SESSION['cart'])) {

                                            echo count($_SESSION['cart']);
                                        } else {
                                            echo "0";
                                        }
                                        ?>

                                    </span>
                                </div>
                            </a>




                            <?php

                            if (!empty($_SESSION['user'])) {

                                if ($_SESSION['user']['role'] == "1" || $_SESSION['user']['role'] == 1) {

                            ?>

                                    <div class="widget-header dropdown">
                                        <a href="#" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                                            <div class="icontext">
                                                <div class="icon">
                                                    <i class="icon-sm rounded-circle border fa fa-user"></i>
                                                </div>
                                                <div class="text">
                                                    <small class="text-muted">Nombre</small>
                                                    <div><?= $_SESSION['user']['nombre'] ?> </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right aria-labelledby=" navbarDropdown">
                                            <a class="dropdown-item" href="#">Mi Cuenta</a>
                                            <a class="dropdown-item" href="#">Usuarios</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="./views/logout.php">Cerrar Sesion</a>
                                        </div>

                                    </div>



                                <?php
                                    //administrador
                                }
                                if ($_SESSION['user']['role'] == "2" || $_SESSION['user']['role'] == 2) {
                                ?>

                                    <div class="widget-header dropdown">
                                        <a href="#" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                                            <div class="icontext">
                                                <div class="icon">
                                                    <i class="icon-sm rounded-circle border fa fa-user"></i>
                                                </div>
                                                <div class="text">
                                                    <small class="text-muted">Nombre</small>
                                                    <div><?= $_SESSION['user']['nombre'] ?> </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right aria-labelledby=" navbarDropdown">
                                            <a class="dropdown-item" href="#">Mi Cuenta</a>
                                            <a class="dropdown-item" href="?param=administrador">Administrador</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="./views/logout.php">Cerrar Sesion</a>
                                        </div>

                                    </div>



                                <?php
                                }
                                if ($_SESSION['user']['role'] == "3" || $_SESSION['user']['role'] == 3) { ?>
                                    <div class="widget-header dropdown">
                                        <a href="#" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                                            <div class="icontext">
                                                <div class="icon">
                                                    <i class="icon-sm rounded-circle border fa fa-user"></i>
                                                </div>
                                                <div class="text">
                                                    <small class="text-muted">Nombre</small>
                                                    <div><?= $_SESSION['user']['nombre'] ?> </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right aria-labelledby=" navbarDropdown">
                                            <a class="dropdown-item" href="#">Mi Cuenta</a>
                                            <a class="dropdown-item" href="?param=ensamblador">Ensamblador</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="./views/logout.php">Cerrar Sesion</a>
                                        </div>

                                    </div>




                                <?php


                                }
                                if ($_SESSION['user']['role'] == "4" || $_SESSION['user']['role'] == 4) { ?> <div class="widget-header dropdown">
                                        <a href="#" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                                            <div class="icontext">
                                                <div class="icon">
                                                    <i class="icon-sm rounded-circle border fa fa-user"></i>
                                                </div>
                                                <div class="text">
                                                    <small class="text-muted">Nombre</small>
                                                    <div><?= $_SESSION['user']['nombre'] ?> </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right aria-labelledby=" navbarDropdown">
                                            <a class="dropdown-item" href="#">Mi Cuenta</a>
                                            <a class="dropdown-item" href="?param=administrador">Repartidor</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="./views/logout.php">Cerrar Sesion</a>
                                        </div>

                                    </div><?php

                                        }
                                    } else {

                                            ?>
                                <div class="widget-header dropdown">
                                    <a href="#" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                                        <div class="icontext">
                                            <div class="icon">
                                                <i class="icon-sm rounded-circle border fa fa-user"></i>
                                            </div>
                                            <div class="text">
                                                <small class="text-muted">iniciar sesión</small>
                                                <div>Mi cuenta <i class="fa fa-caret-down"></i> </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-height" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-154px, 42px, 0px);">
                                        <form method="post" action="./controller/UsuariosController.php?accion=login" class="px-4 py-3">
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input name="correo" type="email" class="form-control" placeholder="email@example.com">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input name="password" type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Entrar</button>
                                        </form>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="?param=register">¿Tienes cuenta? Inscribirse</a>
                                        <a class="dropdown-item" href="#">¿Se te olvidó tu contraseña?</a>
                                    </div> <!--  dropdown-menu .// -->
                                </div>



                            <?php
                                    }

                            ?>






                        </div> <!-- widgets-wrap.// -->

                    </div> <!-- collapse .// -->

                </div> <!-- container .// -->
            </nav>
        </section> <!-- header-main .// -->
    </header>

    <?php
    /**

     * Recibe por Parametros
     * @param type $param recibe en nombre de las ventana para mostrar la vista selecionada
     * 
     * 
     *          */
    //error_reporting(0);

    switch ($_REQUEST["param"]) {
        case "productos":
            include_once './views/productos.php';
            break;
        case "detalles_productos":
            include_once './views/detalles_productos.php';
            break;
        case "inicio":
            include_once './views/index.php';
            break;
        case "register":
            include_once './views/registro.php';
            break;
        case "login":
            include_once './views/login.php';
            break;
        case "resultado":
            include_once './views/busqueda.php';
            break;
        case "categorias":
            include_once './views/filtro.php';
            break;
        case "administrador": ?>
            <script type="text/javascript">
                window.location.href = "./views/admin/index.php?param=inicio";
            </script>
        <?php
            break;
        case "cart":
            include_once './views/cart.php';
            break;

        case "ve":
            include_once './views/proceso_venta.php';
            break;
        case "ensamblador": ?>
            <script type="text/javascript">
                window.location.href = "./views/ensamblador/index.php?param=inicio";
            </script>
    <?php
    }

    ?>



    <!-- ========================= FOOTER ========================= -->
    <footer class="section-footer border-top bg">
        <div class="container">
            <section class="footer-top  padding-y">
                <div class="row">
                    <aside class="col-md col-6">
                        <h6 class="title">Brands</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">Adidas</a></li>
                            <li> <a href="#">Puma</a></li>
                            <li> <a href="#">Reebok</a></li>
                            <li> <a href="#">Nike</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Company</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">About us</a></li>
                            <li> <a href="#">Career</a></li>
                            <li> <a href="#">Find a store</a></li>
                            <li> <a href="#">Rules and terms</a></li>
                            <li> <a href="#">Sitemap</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Help</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#">Contact us</a></li>
                            <li> <a href="#">Money refund</a></li>
                            <li> <a href="#">Order status</a></li>
                            <li> <a href="#">Shipping info</a></li>
                            <li> <a href="#">Open dispute</a></li>
                        </ul>
                    </aside>
                    <aside class="col-md col-6">
                        <h6 class="title">Account</h6>
                        <ul class="list-unstyled">
                            <li> <a href="#"> User Login </a></li>
                            <li> <a href="#"> User register </a></li>
                            <li> <a href="#"> Account Setting </a></li>
                            <li> <a href="#"> My Orders </a></li>
                        </ul>
                    </aside>
                    <aside class="col-md">
                        <h6 class="title">Social</h6>
                        <ul class="list-unstyled">
                            <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
                            <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
                            <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
                            <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
                        </ul>
                    </aside>
                </div> <!-- row.// -->
            </section> <!-- footer-top.// -->

            <section class="footer-bottom row">
                <div class="col-md-2">
                    <p class="text-muted"> &copy 2021 Muebles Transernaga </p>
                </div>
                <div class="col-md-8 text-md-center">
                    <span class="px-2">info@pixsellz.io</span>
                    <span class="px-2">+879-332-9375</span>
                    <span class="px-2">Street name 123, Avanue abc</span>
                </div>
                <div class="col-md-2 text-md-right text-muted">
                    <i class="fab fa-lg fa-cc-visa"></i>
                    <i class="fab fa-lg fa-cc-paypal"></i>
                    <i class="fab fa-lg fa-cc-mastercard"></i>
                </div>
            </section>
        </div><!-- //container -->
    </footer>
    <!-- ========================= FOOTER END // ========================= -->

</body>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

</html>