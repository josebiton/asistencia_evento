<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';

$id= $_POST['id'];
$nombres = $_POST['nombre'];
$telefono = $_POST['telefono'];
$region=$_POST['regionUpd'];
$provincia=$_POST['provinciaUpd'];
$distrito=$_POST['distritoUpd'];
$direccion = $_POST['direccion'];



if ($nombres != NULL){ 

$UpdSucursal= mysqli_query($link, "UPDATE sucursales SET
       nombre = '$nombres',
       telefono = '$telefono',
       region = '$region',
       provincia = '$provincia',
       distrito = '$distrito',
       direccion = '$direccion' WHERE id_sucursal = '$id'");
if(!$UpdSucursal){ echo "<script> alert('OPSS!!! Problemas al actualizar')</script>";}elseif($UpdSucursal){
    echo "<script> alert('Actualización correcta')</script>";
   ?> <script languaje="javascript"> ListSucursales(); </script>
<?php
}

}else{ echo "Faltan datos";}
?>
