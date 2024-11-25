<?php 
//error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';

$nombres = $_POST['nombres'];
$dni = $_POST['dni'];
$idevento = $_POST['evento'];

$fecha_registro = date('d/m/Y');
$hora_registro = date('H:i:s');
$id_sucursal=$_SESSION['sucursal'];



$tiempo1=explode(" ",microtime());
$cadena = $tiempo1[0];
$sacado = substr($cadena,2,10);
$time1 = date('His');
$fechaHora = date("YmdHis", $time1);
$codigoUnico = $fechaHora.$sacado;


 $dupli= mysqli_query($link, "SELECT * FROM participantes WHERE id_evento='$idevento'&& dni ='$dni'");
 $dupli1= mysqli_num_rows($dupli);
if($dupli1==0){   
$RegBien = mysqli_query($link, "INSERT INTO participantes SET
       id_participante = '',
       id_evento = '$id_sucursal',
       nombres = '$nombres',
       dni = '$dni',
       grupo = 'Arquitectura',
       fecha_pago = '$fecha_registro',
       hora_pago = '$hora_registro',
       asistio = '',
       hora_llegada = '',
       estado = 'Activo'");
if(!$RegBien){ echo "Ocurió un error";}elseif($RegBien){
    
   ?> <script languaje="javascript"> ListadoAtaudes(); </script>
<?php
}


}else{    echo "<script> alert ('Esta persona ya se encuentra registrado'); </script>"; }

?>


