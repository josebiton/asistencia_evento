<?php
error_reporting(0);
include_once '../../../common/conexion.php';
$id = $_POST['id'];
$busca= mysqli_query($link, "SELECT foto, codigo_barras FROM ataudes WHERE id_ataud='$id'");
$busca1= mysqli_fetch_assoc($busca);
$namefoto=$busca1['foto'];
$codebar=$busca1['codigo_barras'].'.png';
if($namefoto!=NULL){
    $directorio="../uploads/";
    unlink($directorio.$namefoto);   
    $codes="../../cbarras/codigos/";
    unlink($codes.$codebar);   
$producto_eliminar = mysqli_query($link, "DELETE FROM ataudes WHERE id_ataud='$id'");
   

if(!$producto_eliminar){ echo "Ocurió un error";}else{
   ?> <script languaje="javascript"> ListadoAtaudes(); </script>
<?php
}
}
?>
      


