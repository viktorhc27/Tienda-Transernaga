<?php include_once '../../model/Conexion.php';
session_start();
if (!empty($_SESSION['user']) && $_SESSION['user']['role'] == "2") {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control" content="max-age=604800" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="https://muebleslagos.cl/wp-content/uploads/2018/02/cropped-logo-Horizontal-32x32.png" sizes="32x32">
        <title>Transernaga</title>


        <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link href="../../resources/css/botonVerEnTuEspacio.css" rel="stylesheet" type="text/css" />
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <!-- Bootstrap4 files-->
        <script src="../../resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <link href="../../resources/css/bootstrap.css" rel="stylesheet" type="text/css" />

        <script src="../../resources/sweetalert2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="../../resources/sweetalert2/dist/sweetalert2.min.css">


        <!-- Font awesome 5 -->
        <link href="../../resources/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

        <!-- custom style -->
        <link href="../../resources/css/ui.css" rel="stylesheet" type="text/css" />
        <link href="../../resources/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

        <script src="../../resources/chart.js/dist/chart.js"></script>

        <!-- Flexslider -->
        <link href="../../resources/FlexSlider/flexslider.css" type="text/css" rel="stylesheet">
        <!-- script Flexslider -->
        <script src="../../resources/FlexSlider/jquery.flexslider-min.js"></script>
        <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script type="text/javascript">
            /// some script

            // jquery ready start
            $(document).ready(function() {
                // jQuery code

            });
            // jquery end
        </script>


        <link rel="stylesheet" type="text/css" href="../../resources/DataTables/datatables.min.css" />
        <link rel="stylesheet" type="text/css" href="../../resources/DataTables/Responsive-2.2.9/css/responsive.bootstrap4.min.css" />

        <title>Document</title>
    </head>

    <body>
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-white border">
                <div class="container">
                    <a class="navbar-brand" href="#"><img width="200" src="../../resources/images/logo-muebles.png"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="?param=inicio">Inicio <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?param=registrar">Usuarios</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ventas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="?param=ventas">Ventas totales</a>
                                    <a class="dropdown-item" href="?param=ventas_hoy">Ventas de hoy</a>
                                    <a class="dropdown-item" href="?param=ventas_pendientes">Ventas pendientes</a>


                                    <!-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a> -->
                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Servicios
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="?param=productos">Productos</a>
                                    <a class="dropdown-item" href="?param=categorias">Categorias</a>
                                    <a class="dropdown-item" href="?param=marcas">Marcas</a>
                                    <!-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a> -->
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?param=kardex">Kardex</a>


                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Reportes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="?param=reportes_ventas">Reportes Ventas</a>
                                    <a class="dropdown-item" href="?param=reportes_inventario">Reporte inventorio</a>


                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="../../index.php" tabindex="-1" aria-disabled="true">Tienda</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>



        <?php
        /**

         * Recibe por Parametros
         * @param type $param recibe en nombre de las ventana para mostrar la vista selecionada
         * 
         * 
         *          */
        //error_reporting(0);
        switch ($_REQUEST["param"]) {
            case "marcas":
                include_once 'agregar_marcas.php';
                break;
            case "categorias":
                include_once 'agregar_categorias.php';
                break;
            case "registrar":
                include_once 'agregar_funcionarios.php';
                break;
            case "inicio":
                include_once 'panel.php';
                break;
            case "productos":
                include_once 'productos.php';
                break;
            case "agregar-muebles":
                include_once 'agregar_muebles.php';
                break;
            case "ver_product":
                include_once 'ver_productos.php';
                break;
            case "editar_productos":
                include_once 'editar_muebles.php';
                break;
            case "editar_funcionarios":
                include_once 'editar_funcionarios.php';
                break;
            case "ventas":
                include_once 'ventas.php';
                break;
            case "modificar_categorias":
                include_once 'editar_categorias.php';
                break;
            case "modificar_marcas":
                include_once 'editar_marcas.php';
                break;
            case "stock":
                include_once 'stocks.php';
                break;
            case "ventas_pendientes":
                include_once 'ventas_pendientes.php';
                break;
            case "ventas_hoy":
                include_once 'ventas_hoy.php';
                break;
            case "reportes_ventas":
                include_once 'reportes_ventas.php';
                break;
            case "reportes_inventario":
                include_once 'reportes_inventario.php';
                break;
            case "kardex":
                include_once 'kardex.php';
                break;
            case "kardex_resultado":
                include_once 'kardex_resultado.php';
                break;
        }
        ?>










        </section>


        </div>

        <script type="text/javascript" src="../../resources/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="../../resources/DataTables/Responsive-2.2.9/js/responsive.bootstrap4.min.js"></script>
        <script>
            $(function() {
                $('#example').dataTable({
                    "searching": false,
                    "info": true,
                    "language": español,
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,



                });

                $("#example1").DataTable({
                    "destroy": true,
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({

                    "destroy": true,
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "language": español,

                });

            });

            var español = {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            }
        </script>

    </body>

    </html>

<?php
} else {
?>
    <script type='text/javascript'>
        window.location.href = '../../index.php';
    </script>
<?php
}


?>