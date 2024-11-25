<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';
$patron = array( "<"=>"",    ">"=>"",    "!"=>"",    "*"=>"",    "["=>"",    "="=>"",    "/"=>"",    "\\"=>"",    "$"=>"");
$idlogin = $_POST['idl'];

$email00 = $_POST['user'];
$email0 = ltrim($email00);
$email1 = preg_replace('/\s+/', '', $email0);
$user = strtr($email1,$patron);

$pass00 = $_POST['pass'];
$pass0 = ltrim($pass00);
$pass1 = preg_replace('/\s+/', '', $pass0);
$pass = strtr($pass1,$patron);
 
$key="21031988";
function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
$userx = encrypt($user,$key);
$passx = encrypt($pass,$key);

if ($idlogin!=NULL&&$user!=NULL&&$pass!=NULL){ 
$DupliUser= mysqli_num_rows(mysqli_query($link, "SELECT user FROM  login WHERE user='$userx'"));
if($DupliUser==0){
$UpdLogin= mysqli_query($link, "UPDATE login SET user='$userx',pass = '$passx' WHERE id_login= '$idlogin'");

if(!$UpdLogin){ echo "<script> alert('OPSS!!! Problemas al actualizar')</script>";}elseif($UpdLogin){
    echo "<script> alert('Usuario y Clave actualizados correctamente');</script>";
   ?> <script languaje="javascript"> ListPersonas(); </script>
<?php
}
}else{    echo "<script> alert ('Usuario ya existe. Pruebe con otro nombre');</script>";}

}else{ echo "<script> alert('Llenar campos / Caracteres no permitidos')</script>";}
?>
