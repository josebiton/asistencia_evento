<?php

error_reporting(0);
include_once '../../../common/conexion.php';
$id = $_POST['id'];
$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
$limite_kb = 4096;


if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024) {
    $tiempo1 = explode(" ", microtime());
    $cadena = $tiempo1[0];
    $sacado = substr($cadena, 2, 10);
    $time1 = date('His');
    $fechaHora = date("YmdHis", $time1);
    $codigoUnico = $fechaHora . $sacado;
    $arch = new SplFileInfo($_FILES['foto']['name']);
    $arch1 = ($arch->getExtension());
    $imagen = $codigoUnico . "." . $arch1;
    $busca = mysqli_query($link, "SELECT foto FROM ataudes WHERE id_ataud='$id'");
    $busca1 = mysqli_fetch_assoc($busca);
    $namefoto = $busca1['foto'];

    if ($namefoto != NULL) {
        $ruta = "../uploads/" . $imagen;
        if (!file_exists($ruta)) {
            $resultado = @move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);
            $directorio = "../uploads/";
            unlink($directorio . $namefoto);
            $UpdBien = mysqli_query($link, "UPDATE ataudes SET foto = '$imagen' WHERE id_ataud = '$id'");
            if (!$UpdBien) {
                echo "Ocurió un error";
            } else {
                echo "Foto Actualizada, :&nbsp; $imagen";
                ?> <script languaje="javascript"> ListadoAtaudes();</script>
                <?php

            }
        } else {
            echo "No encontramos la ruta";
        }
    }
}
?>




