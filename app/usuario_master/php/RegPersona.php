<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$nacimiento0 = $_POST['nacimiento'];
if (empty($nacimiento0)) {
    $nacimiento = "1900-01-01";
} else {
    $nacimiento = $nacimiento0;
}
$sexo = $_POST['sexo'];
$region = $_POST['regionUS'];
$provincia = $_POST['provincia'];
$distrito = $_POST['distritoUS'];
$sucursal = $_POST['sucursal'];
$direccion = $_POST['direccion'];
$foto = $_POST['foto'];
//-----------------------------------------


//-----------------------------------------


if ($nombres != NULL && $dni != NULL && $sucursal!=0) {

    $dupliP1 = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM personas WHERE 
         nombres='$nombres'&&apellidos='$apellidos'&&dni='$dni'"));

    if ($dupliP1 == true) {
        echo "<script> alert ('Esta persona ya se encuentra registrada'); </script>";
    } else {
        $tiempo1 = explode(" ", microtime());
        $cadena = $tiempo1[0];
        $sacado = substr($cadena, 2, 10);
        $time1 = date('His');
        $fechaHora = date("YmdHis", $time1);
        $codigoUnico = $fechaHora . $sacado;
   
            $RegPer = mysqli_query($link, "INSERT INTO personas SET
       id_persona = '$codigoUnico',
       tipo_persona = 'Natural',
       nombres = '$nombres',
       apellidos = '$apellidos',
       dni = '$dni',
       ruc = '',
       telefono = '$telefono',
       email = '$email',
       sexo = '$sexo',
       nacimiento = '$nacimiento',
       region = '$region',
       provincia = '$provincia',
       distrito = '$distrito',
       direccion = '$direccion',
       foto = '',
       estado = 'Activo'");
            $tiempo2 = explode(" ", microtime());
        $cadena2 = $tiempo2[0];
        $sacado2 = substr($cadena2, 2, 10);
        $time2 = date('His');
        $fechaHora2 = date("YmdHis", $time2);
        $codigoUnico2 = $fechaHora2 . $sacado2;
      $RegLogin = mysqli_query($link, "INSERT INTO login SET
              id_login='$codigoUnico2',
              id_persona='$codigoUnico',
              id_sucursal='$sucursal',
              user='$dni',
              pass='123456',
              estado='Activo'"); 
      $RegAcces= mysqli_query($link, "INSERT INTO accesos SET
              id_acceso='$codigoUnico',
              id_login='$codigoUnico2',
              codigo='000',
              sucursal='$sucursal',
              estado='Activo'"); 
      
            if (!$RegPer||!$RegLogin||!$RegAcces) {
                echo "Ocurió un error con uno d elos registros";
            } elseif ($RegPer&&$RegLogin&&$RegAcces) {
                echo "Registrado: &nbsp;&nbsp;";
                echo " $nombre";
                ?> <script languaje="javascript"> ListPersonas();</script>
                <?php

            }
        }
    } else {
    echo "Faltan datos";echo ":&nbsp; Debe llenar como mínimo Nombre, DNI, Sucursal"; 
}
?>
