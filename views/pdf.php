<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../resources/Dompdf/autoload.inc.php');
require_once ('../resources/Dompdf/src/Css/AttributeTranslator.php');
use Dompdf\Dompdf;

ob_start();
$dompdf = new dompdf();
include "./boleta.php";
$dompdf->loadHTML(ob_get_clean());

$dompdf->render();
$dompdf->stream();



?>