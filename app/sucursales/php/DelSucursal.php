<?php
error_reporting(0);
include_once '../../../common/conexion.php';
$id = $_POST['id'];
$delLogin =  mysqli_query($link, "DELETE FROM login WHERE id_sucursal='$id'"); 
$delAcces =  mysqli_query($link, "DELETE FROM accesos WHERE sucursal='$id'");
$delSucursal =  mysqli_query($link, "DELETE FROM sucursales WHERE id_sucursal='$id'");   
if(!$delSucursal ||!$delLogin || !$delAcces){    echo "<script> alert('Ocurrió un error al eliminar algunos registros')</script>";
}elseif($delSucursal && $delLogin && $delAcces){   echo "<script> alert('Sucursal eliminada correctamente')</script>";
?>
<script languaje="javascript"> ListSucursales(); </script>
 <?php 
}
  

?>