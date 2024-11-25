<?php
error_reporting(0);
include_once '../config.php'; 
include_once '../../../common/conexion.php';
$patron = array(
    "<"=>"",
    ">"=>"",
    "!"=>"",
    "*"=>"",
    "["=>"",
    "="=>"",
    "/"=>"",
    "\\"=>"",
    "$"=>"");
$email00 = $_POST['user'];
$email0 = ltrim($email00);
$email1 = preg_replace('/\s+/', '', $email0);
$emailx = strtr($email1,$patron);
$key="21031988";
$pass00 = $_POST['pass'];
$pass0 = ltrim($pass00);
$pass1 = preg_replace('/\s+/', '', $pass0);
$passx = strtr($pass1,$patron);
//---------------incriptar user-------------------
function encryptu($user1, $key) {
   $result = '';
   for($i=0; $i<strlen($user1); $i++) {
      $char = substr($user1, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
$user = encryptu($emailx,$key);
//---------------------incriptar password--------------------------
function encryptp($passx, $key) {
   $result = '';
   for($i=0; $i<strlen($passx); $i++) {
      $char = substr($passx, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
$pass = encryptp($passx,$key);
//--------------------------------------------------------------

if($user != NULL){ 

    if($pass != NULL){

	$consulta = mysqli_query($link, "SELECT id_login, user, id_sucursal FROM login WHERE user = '$user' && pass = '$pass'&& estado = 'Activo' ");
	 
         $resultfetch = mysqli_fetch_array($consulta);
       if($resultfetch != NULL){
         $_SESSION['id_login'] = $resultfetch['id_login'];
	 $_SESSION['user'] 	= $resultfetch['user'];         
	 $_SESSION['sucursal'] 	= $resultfetch['id_sucursal'];         
    ?>
 <script language="javascript">
window.location.href = "<?php echo $redirige_a; ?>";
</script>

 <?php

     }else{ ?>
<a href="javascript:;" onclick="login($('#user').val(),$('#pass').val())" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Ingresar <i class="fa fa-arrow-circle-right"></i></a>

                                      <p>Datos Incorrectos</p>                            <?php   }
   
        }else{   ?>
<a href="javascript:;" onclick="login($('#user').val(),$('#pass').val())" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Ingresar <i class="fa fa-arrow-circle-right"></i></a>

                                      <p>Ingrese una contraseña</p>
  <?php  }        
} else{   ?>
<a href="javascript:;" onclick="login($('#user').val(),$('#pass').val())" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Ingresar <i class="fa fa-arrow-circle-right"></i></a>

                                      <p>Ingrese un usuario</p>
  <?php  }

?>
