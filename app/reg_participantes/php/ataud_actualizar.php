<?php
error_reporting(0);
include_once '../../../common/conexion.php';
$id= $_POST['id'];
$barras = $_POST['barras'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$tipo = $_POST['tipo'];
$proveedor = $_POST['proveedor'];

$UpdBien = mysqli_query($link, "UPDATE ataudes SET
       codigo_barras = '$barras',
       modelo = '$modelo',
       tipo = '$tipo',
       color = '$color',
       id_proveedor = '$proveedor' WHERE id_ataud = '$id'");
if(!$UpdBien){ echo "Ocurió un error"; }else{    
   ?> <script languaje="javascript"> ListadoAtaudes(); </script>
<?php
}



?>




