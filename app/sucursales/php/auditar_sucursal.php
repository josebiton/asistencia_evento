<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';
$id_login=$_SESSION['id_login'];
$id= $_POST['id'];
if ($id != NULL){ 

$UpdAccesoSuc= mysqli_query($link, "UPDATE accesos SET sucursal = '$id' WHERE id_login = '$id_login'");
$UpdloginSuc= mysqli_query($link, "UPDATE login SET id_sucursal = '$id' WHERE id_login = '$id_login'");
if(!$UpdAccesoSuc||!$UpdloginSuc){ echo "<script> alert('OPSS!!! Problemas al brindar acceso a sucursal')</script>";}elseif($UpdAccesoSuc&&$UpdloginSuc){
    echo "<script> alert('Accceso concedido a sucursal')</script>";
    $_SESSION['sucursal']="$id";
   ?> <script type="text/javascript">window.location="../sucursales/";</script> 
<?php
}

}else{ echo "Faltan datos";}
?>
