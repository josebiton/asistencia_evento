<?php
error_reporting(0);
include_once '../../../common/conexion.php';
$idp = $_POST['idp'];  
$cod = $_POST['cod'];  
$idl = $_POST['idl'];  
$ids = $_SESSION['sucursal']; 
$buscaMasAccesos= mysqli_num_rows(mysqli_query($link, "SELECT * FROM accesos WHERE id_login='$idl'&& sucursal='$ids'"));
$buscaMasLogins= mysqli_num_rows(mysqli_query($link, "SELECT * FROM login WHERE id_persona='$idp'"));
if($buscaMasAccesos>1){
$delete =  mysqli_query($link, "DELETE FROM accesos WHERE id_login='$idl' && codigo='$cod' && sucursal='$ids'");   
$delete0 =  mysqli_query($link, "DELETE FROM accesos WHERE id_login='$idl' && codigo='0'"); 
}else{
   $delete =  mysqli_query($link, "DELETE FROM accesos WHERE id_login='$idl' && codigo='$cod' && sucursal='$ids'");   
$delete0 =  mysqli_query($link, "DELETE FROM accesos WHERE id_login='$idl' && codigo='0'");

}
 if($buscaMasLogins>1){
     $delete1 =  mysqli_query($link, "DELETE FROM login WHERE id_login='$idl' && id_sucursal='$ids'"); 
 }

?>
<script languaje="javascript"> 
    ListAccess();
    AsignAccesoSuc('<?php echo $idp;?>','<?php echo $idl;?>','<?php echo $ids;?>');

</script>
 <?php 

  

?>