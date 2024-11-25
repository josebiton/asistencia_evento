<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$sucursal = $_SESSION['sucursal'];
$estado = $_POST['estado'];
if ($nombre != NULL) {
        $tiempo1 = explode(" ", microtime());
        $cadena = $tiempo1[0];
        $sacado = substr($cadena, 2, 10);
        $time1 = date('His');
        $fechaHora = date("YmdHis", $time1);
        $codigoUnico = $fechaHora . $sacado;
        $Update = mysqli_query($link, "UPDATE evento SET      
       nombre_evento = '$nombre',
       fecha_evento = '$fecha',
       hora_evento = '$hora',
       lugar_evento = '$lugar',
       estado = '$estado' WHERE  id_evento = '$id'");

        if(!$Update){ echo "<script> alert('OPSS!!! Problemas al actualizar')</script>";}elseif($Update){
    echo "<script> alert('Actualización correcta')</script>";
   ?> <script languaje="javascript"> List(); </script>
<?php

        }
    echo "Faltan datos";
    echo ":&nbsp; Debe llenar todo";
}
?>
