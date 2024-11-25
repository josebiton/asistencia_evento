<?php
header("Expires: Mon, 21 Mar 1988 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>APP</title>

    </head>
    <body>
        <?php
        include_once '../common/conexion.php';
        include_once 'common/validador.php';
        if (in_array(101, $Codigo)) {
            header('Location: panel_admin/');
        } elseif (in_array(200, $Codigo)) {
            header('Location: panel_admin_master/');
        } elseif (in_array(102, $Codigo)) {
            header('Location: panel_caja/');
        } elseif (in_array(103, $Codigo)) {
            header('Location: panel_vendedor/');
        }elseif (in_array(105, $Codigo)) {
            header('Location: panel_almacen/');
        }else {
            header('Location: ../common/cs.php');
        }
        ?>

    </body>
</html>


