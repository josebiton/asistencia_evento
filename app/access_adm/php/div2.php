<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';
$cod = $_POST['cod'];
$idl = $_POST['idl'];
$idp = $_POST['idp'];
$id_sucursal = $_SESSION['sucursal'];
if ($cod != 0) {
    if ($cod != null && $idl != NULL && $idp != NULL) {
        $dupliciddad = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM accesos WHERE id_login='$idl'&& codigo='$cod'&& sucursal='$id_sucursal'"));
        if ($dupliciddad == true) {
            echo "<script> alert ('No se permite crear doble acceso'); </script>";
        } else {
            $tiempo0 = explode(" ", microtime());
                $cadena0 = $tiempo0[0];
                $sacado0 = substr($cadena0, 2, 10);
                $time0 = date('His');
                $fechaHora0 = date("YmdHis", $time0);
                $codigoUnico0 = $fechaHora0 . $sacado0;

                $Record = mysqli_query($link, "INSERT INTO accesos SET
       id_acceso = '$codigoUnico0',
       id_login = '$idl',
       codigo = '$cod',
       sucursal = '$id_sucursal',       
       estado = 'Activo'");
           
        }
    } else {
        echo "<script> alert ('Falta datos'); </script>";
    }
} else {
    echo "<script> alert ('Elija un perfil');</script>";
}
?>
<script languaje="javascript">
    ListAccess();
    AsignAccesoSuc('<?php echo $idp ?>', '<?php echo $idl ?>', '<?php echo $id_sucursal ?>');
</script>

