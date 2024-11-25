<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$sucursal = $_SESSION['sucursal'];

if ($nombre != NULL || $sucursal == 0) {

    $dupliciddad = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM evento WHERE nombre_evento='$nombre' && id_sucursal='$sucursal'&& fecha_evento='$fecha'&& hora_evento='$hora'"));

    if ($dupliciddad == true) {
        echo "<script> alert ('Este evento ya se encuentra registrado'); </script>";
    } else {
        $tiempo1 = explode(" ", microtime());
        $cadena = $tiempo1[0];
        $sacado = substr($cadena, 2, 10);
        $time1 = date('His');
        $fechaHora = date("YmdHis", $time1);
        $codigoUnico = $fechaHora . $sacado;

        $Record = mysqli_query($link, "INSERT INTO evento SET
       id_evento = '$codigoUnico',
       id_sucursal = '$sucursal',
       nombre_evento = '$nombre',
       fecha_evento = '$fecha',
       hora_evento = '$hora',
       lugar_evento = '$lugar',
       estado = 'Activo'");

        if (!$Record) {
            echo "Ocurió un error al registrar";
        } elseif ($Record) {
            echo "Registrado: &nbsp;&nbsp;";
            echo " $nombre";
            ?> <script languaje="javascript"> List();</script>
            <?php

        }
    }
} else {
    echo "Faltan datos";
    echo ":&nbsp; Debe llenar todo";
}

?>
