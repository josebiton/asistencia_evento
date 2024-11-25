<?php
include_once '../../common/conexion.php';
include_once '../common/config.php';
include_once '../common/validador.php';if(!in_array(200, $Codigo)){header('Location: ../../common/cs.php');}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="ES">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link href="../common/files/css/bootstrap.min.css" rel="stylesheet">
        <link href="../common/files/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../common/files/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <link href="../common/files/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="../common/files/css/animate.css" rel="stylesheet">
        <link href="../common/files/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>"/>
    </head>
    <body>
        <div id="wrapper">
            <?php include_once '../common/menu_left.php'; ?>
            <div id="page-wrapper" class="gray-bg">
                <?php include_once '../common/header.php'; ?>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                    <h1>hola soy admin master</h1>
                    </div>
                    
                
                <?php include_once '../common/footer.php'; ?>


            </div>
        </div>
        <script src="../common/files/js/jquery_3.5.1.js"></script>

        <script src="js/servicios.js" type="text/javascript"></script>

        <script src="../common/files/js/popper.min.js"></script>
        <script src="../common/files/js/bootstrap.js"></script>
        <script src="../common/files/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="../common/files/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="../common/files/js/plugins/dataTables/datatables.min.js"></script>
        <script src="../common/files/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="../common/files/js/inspinia.js"></script>
        <script src="../common/files/js/plugins/pace/pace.min.js"></script>
        <script src="../common/files/js/plugins/iCheck/icheck.min.js"></script>
    </body>
</html>