<?php
include_once '../../common/conexion.php';
$idLogin = $_POST['id'];
$key="21031988";
$UserEncript= mysqli_fetch_assoc(mysqli_query($link, "SELECT user FROM login WHERE id_login='$idLogin'"));
$desencriptar= $UserEncript['user'];
function decrypt($string, $key) {
   $result = '';
   $cadena_encriptada = base64_decode($string);
   for($i=0; $i<strlen($cadena_encriptada); $i++) {
      $char = substr($cadena_encriptada, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}
$usuario = decrypt($desencriptar,$key);
?>
<div class="form-group col-lg-12 row">
    <div class="col-sm-6"> 
        <input type="hidden" value="<?php echo $idLogin;?>" name="idl">
        <input type="text" placeholder="Usuario"class="form-control"name="user" required="" value="<?php echo $usuario;?>">
    </div>
    <div class="col-sm-6">  
     <input type="password" placeholder="******"class="form-control"name="pass" required="" >
    </div>
</div>
<div class="form-group col-lg-12 row">
    <div class="col-sm-12">  <center><input type="submit" class="btn btn-primary"value="Restablecer Datos de Acceso"></center></div>
</div>



