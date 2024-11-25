<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';
$nombres = $_POST['nombre'];
$telefono = $_POST['telefono'];

$region = $_POST['regionUS'];
$provincia = $_POST['provincia'];
$distrito = $_POST['distritoUS'];
$direccion = $_POST['direccion'];


if ($nombres != NULL) {

    $dupliP1 = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM sucursales WHERE 
         nombre='$nombres'"));

    if ($dupliP1 == true) {
        echo "<script> alert ('Esta sucursal ya se encuentra registrada'); </script>";
    } else {
        $tiempo1 = explode(" ", microtime());
        $cadena = $tiempo1[0];
        $sacado = substr($cadena, 2, 10);
        $time1 = date('His');
        $fechaHora = date("YmdHis", $time1);
        $codigoUnico = $fechaHora . $sacado;
   
            $RegSucursal = mysqli_query($link, "INSERT INTO sucursales SET
       id_sucursal = '$codigoUnico',
       nombre = '$nombres',
       telefono = '$telefono',
       region = '$region',
       provincia = '$provincia',
       distrito = '$distrito',
       direccion = '$direccion',
       estado = 'Activo'");
           
      
            if (!$RegSucursal) {
                echo "Ocurió un error al registrar";
            } elseif ($RegSucursal) {
                echo "Registrado: &nbsp;&nbsp;";
                echo " $nombre";
                ?> <script languaje="javascript"> ListSucursales();</script>
                <?php

            }
        }
    } else {
    echo "Faltan datos";echo ":&nbsp; Debe llenar como mínimo Nombre"; 
}
?>
