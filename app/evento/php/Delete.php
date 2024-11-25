<?php
error_reporting(0);
include_once '../../../common/conexion.php';
$id = $_POST['id'];
$delete =  mysqli_query($link, "DELETE FROM evento WHERE id_evento='$id'");   
if(!$delete){    echo "<script> alert('Ocurrió un error al eliminar')</script>";
}elseif($delete){   echo "<script> alert('Registro eliminado correctamente')</script>";
?>
<script languaje="javascript"> List(); </script>
 <?php 
}
  

?>