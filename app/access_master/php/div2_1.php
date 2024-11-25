<?php
error_reporting(0);
date_default_timezone_set('America/Lima');
include_once '../../../common/conexion.php';
$ids = $_POST['ids'];
$idl = $_POST['idl'];
$idp = $_POST['idp'];
$cod = '101';
if ($ids != 0) {
    if ($idl != NULL || $idp != NULL) {
        $dupliciddad = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM accesos WHERE id_login='$idl'&& codigo='$cod'&& sucursal='$ids'"));
        if ($dupliciddad == true) {
            echo "<script> alert ('No se permite crear doble acceso'); </script>";
        } else {
            $segundologin = mysqli_num_rows(mysqli_query($link, "SELECT * FROM login WHERE id_login='$idl'&& id_sucursal='$ids'"));
            $tiempo0 = explode(" ", microtime());
            $cadena0 = $tiempo0[0];
            $sacado0 = substr($cadena0, 2, 10);
            $time0 = date('His');
            $fechaHora0 = date("YmdHis", $time0);
            $codigoUnico0 = $fechaHora0 . $sacado0;
            if ($segundologin > 0) {
                $Record2 = mysqli_query($link, "INSERT INTO accesos SET
       id_acceso = '$codigoUnico0',
       id_login = '$idl',
       codigo = '$cod',
       sucursal = '$ids',       
       estado = 'Activo'");
                ?>
<script languaje="javascript">
    ListAccess();
    AsignAccessM('<?php echo $idp ?>', '<?php echo $idl ?>', '<?php echo $ids ?>');

</script>
 <?php
            } else {
                $Record1 = mysqli_query($link, "INSERT INTO login SET
       id_login = '$codigoUnico0',
       id_persona = '$idp',
       id_sucursal = '$ids',
       user = '$codigoUnico0',       
       pass = '123',       
       estado = 'Activo'");
                $Record2 = mysqli_query($link, "INSERT INTO accesos SET
       id_acceso = '$codigoUnico0',
       id_login = '$codigoUnico0',
       codigo = '$cod',
       sucursal = '$ids',       
       estado = 'Activo'");
                ?>
<script languaje="javascript">
    ListAccess();
    AsignAccessM('<?php echo $idp ?>', '<?php echo $codigoUnico0 ?>', '<?php echo $ids ?>');

</script>
 <?php
            }
        }
    } else {
        echo "<script> alert ('Falta datos'); </script>";
    }
} else {
    echo "<script> alert ('Elija sucursal');</script>";
}
?>


