<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';

$id= $_POST['id'];
$idl= $_POST['idl'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$nacimiento0 = $_POST['nacimiento'];
if(empty($nacimiento0)){$nacimiento="1900-01-01";}else{$nacimiento=$nacimiento0;}
$sexo = $_POST['sexo'];
$region=$_POST['regionUpd'];
$provincia=$_POST['provinciaUpd'];
$distrito=$_POST['distritoUpd'];
$sucursal=$_POST['sucursal'];
$direccion = $_POST['direccion'];



if ($nombres != NULL && $dni != NULL && $sucursal!=null){ 

$UpdPersona= mysqli_query($link, "UPDATE personas SET
       nombres = '$nombres',
       apellidos = '$apellidos',
       dni = '$dni',
       telefono = '$telefono',
       email = '$email',
       sexo = '$sexo',
       nacimiento = '$nacimiento',
       region = '$region',
       provincia = '$provincia',
       distrito = '$distrito',
       direccion = '$direccion' WHERE id_persona = '$id'");
$UpdLogin= mysqli_query($link, "UPDATE login SET  id_sucursal='$sucursal'  WHERE id_login = '$idl'");
$UpdAccesos= mysqli_query($link, "UPDATE accesos SET
              sucursal='$sucursal'  WHERE id_login = '$idl'");
if(!$UpdPersona||!$UpdLogin||!$UpdAccesos){ echo "<script> alert('OPSS!!! Problemas al actualizar')</script>";}elseif($UpdPersona&&$UpdAccesos&&$UpdLogin){
    echo "<script> alert('Actualización correcta')</script>";
   ?> <script languaje="javascript"> ListPersonas(); </script>
<?php
}

}else{ echo "Faltan datos";}
?>
