<?php
include_once '../model/Conexion.php';
include_once '../model/Ventas.php';
$accion = $_REQUEST['accion'];

switch ($accion) {
    case 'dias':
        $data = json_decode($_REQUEST['array'], true);
        $ventas = new Ventas();
        $numeros_fechas = sizeof($data);
        /* echo "<pre>";
        print_r($data);
        echo "</pre>";
        echo "<br>"; */
        for ($i = 0; $i < $numeros_fechas; $i++) {
            $date = DateTime::createFromFormat('d/m/Y', $data[$i]);
            $data[$i] = $date->format('Y-m-d');
        }
        for ($i = 0; $i < $numeros_fechas; $i++) {

            $valores = $ventas->grafico($data[$i]);

            $_SESSION["grafico"][$i] = array(
                'valor' => $valores[0],
            );

            /*   echo "<br>";
            echo "<pre>";
            print_r($valores);
            echo "</pre>"; */
        }
        

        /*   echo "<br>";
        echo "<pre>";
        print_r($_SESSION['grafico']);
        echo "</pre>"; */
        header('Content-Type:apllication/json');


        echo json_encode($_SESSION["grafico"], JSON_FORCE_OBJECT);

        break;
}
