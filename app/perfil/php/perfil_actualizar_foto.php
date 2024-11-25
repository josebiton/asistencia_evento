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
    $busca = mysqli_fetch_assoc(mysqli_query($link, "SELECT foto FROM personas WHERE id_persona='$id'"));
    $namefoto = $busca['foto'];

    if ($namefoto != NULL) {
        $rutaparaborrar = "../uploads/" . $namefoto;
        $ruta = "../uploads/" . $imagen;
        if (file_exists($rutaparaborrar)) {
            $directorio = "../uploads/";
            unlink($directorio . $namefoto);

            $resultado = @move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);

            $UpdBien = mysqli_query($link, "UPDATE personas SET foto = '$imagen' WHERE id_persona = '$id'");
            if (!$UpdBien) {
                echo "Ocurió un error";
            } else {
                ?> 
                <script type="text/javascript">window.location = "../";</script>
                <?php

            }
        } else {
            echo "No encontramos la ruta";
        }
    } else {
        $imagen = $id . "." . $arch1;
        $ruta = "../uploads/" . $imagen;
        if (!file_exists($ruta)) {
            $resultado = @move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);
            $UpdFoto = mysqli_query($link, "UPDATE personas SET foto = '$imagen' WHERE id_persona = '$id'");
            if (!$UpdFoto) {
                echo "Ocurió un error";
            } else {
                ?> 
                <script type="text/javascript">window.location = "../";</script>
                <?php

            }
        } else {
            echo "hay una foto con igual nombre. llame al administrador del sistema";
        }
    }
} else {
    echo "Cargue una imagen valida por favor";
}
?>




