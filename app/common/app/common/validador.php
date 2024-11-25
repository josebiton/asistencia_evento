<?php
error_reporting(0);
include_once '../../common/conexion.php';
if (!isset($_SESSION['id_login']) || $_SESSION['id_login'] == '') {
    echo '<script type="text/javascript">window.location = "../../common/cs.php"; </script>';     
}
$id_login = $_SESSION['id_login'];
$accesos = mysqli_query($link, "SELECT codigo FROM accesos WHERE id_login='$id_login'&& estado='Activo'");
$nConfig = mysqli_num_rows($accesos);

if ($nConfig > 0) {
    for ($i = 0; $i < $nConfig; $i++) {
        $codigos = mysqli_fetch_array($accesos);
        $Codigo[$i] = $codigos["codigo"];
    }
}
?>
