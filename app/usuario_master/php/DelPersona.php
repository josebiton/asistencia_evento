<?php
error_reporting(0);
include_once '../../../common/conexion.php';
$idPersona = $_POST['id'];
$idlogin = $_POST['idl'];
$buscarlogins= mysqli_num_rows(mysqli_query($link, "SELECT id_login FROM login WHERE id_persona='$idPersona'"));
if($buscarlogins>1){
 $delLogin =  mysqli_query($link, "DELETE FROM login WHERE id_login='$idlogin'"); 
$delAcces =  mysqli_query($link, "DELETE FROM accesos WHERE id_login='$idlogin'"); 
if(!$delLogin || !$delAcces){    echo "Ocurrió un error al eliminar algunos registros";}else{    echo "Registro eliminado correctamente";}
}elseif($buscarlogins==1){
  $delPersona =  mysqli_query($link, "DELETE FROM personas WHERE id_persona='$idPersona'"); 
$delLogin =  mysqli_query($link, "DELETE FROM login WHERE id_login='$idlogin'"); 
$delAcces =  mysqli_query($link, "DELETE FROM accesos WHERE id_login='$idlogin'");  
if(!$delPersona ||!$delLogin || !$delAcces){    echo "Ocurrió un error al eliminar algunos registros";}else{    echo "Registro eliminado correctamente";}
}

?>
<script languaje="javascript"> ListPersonas(); </script>
 <?php    

?>