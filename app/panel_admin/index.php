<?php
include_once '../../common/conexion.php';
include_once '../common/config.php';
include_once '../common/validador.php';
if (!in_array(101, $Codigo)) {
    header('Location: ../../common/cs.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="ES">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link href="../common/files/css/bootstrap.min.css" rel="stylesheet">
        <link href="../common/files/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- c3 Charts -->
        <link href="../common/files/css/plugins/c3/c3.min.css" rel="stylesheet">
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
                <div class="wrapper wrapper-content">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <span class="label label-success float-right">Hasta hoy</span>
                                    <h5>TOTAL REGISTRADOS</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">
                                        <?php
                                        $sql = "SELECT COUNT(*) AS total_registros FROM participantes";
                                        $result = $link->query($sql);
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $dato1= $row["total_registros"];
                                            echo $dato1;
                                        } else {
                                            echo "0 Registrados.";
                                        }
                                        ?></h1>
                                    <div class="stat-percent font-bold text-success">100% <i class="fa fa-bolt"></i></div>
                                    <small>Personas</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <span class="label label-info float-right">Hasta este momento</span>
                                    <h5>ASISTIERON</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">
                                    <?php
                                        $sqlx = "SELECT COUNT(*) AS total_registros FROM participantes WHERE asistio='SI'";
                                        $resultx = $link->query($sqlx);
                                        if ($resultx->num_rows > 0) {
                                            $rowx = $resultx->fetch_assoc();
                                            $dato2= $rowx["total_registros"];
                                            echo $dato2;
                                        } else {
                                            echo "0 Participantes.";
                                        }
                                        ?></h1>
                                    <div class="stat-percent font-bold text-info"><?php echo ($dato2*$dato1)/100;?> <i class="fa fa-level-up"></i></div>
                                    <small>Personas</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <span class="label label-primary float-right">Registrados hoy</span>
                                    <h5>Nuevos</h5>
                                </div>
                                <div class="ibox-content">
                                    <h1 class="no-margins">106,120</h1>
                                    <div class="stat-percent font-bold text-navy">17% <i class="fa fa-level-up"></i></div>
                                    <small>Personas</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Line Chart Example
                                        <small>With custom colors.</small>
                                    </h5>
                                </div>
                                <div class="ibox-content">
                                    <div>
                                        <div id="lineChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

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

            <!-- d3 and c3 charts -->
            <script src="../common/files/js/plugins/d3/d3.min.js"></script>
            <script src="../common/files/js/plugins/c3/c3.min.js"></script>


            <script>

                $(document).ready(function () {

                    c3.generate({
                        bindto: '#lineChart',
                        data: {
                            columns: [
                                ['Contratos', 30, 200, 100, 400, 150, 250, 30, 200, 100, 400, 150, 250],
                                ['Atendidos', 50, 20, 10, 40, 15, 25, 50, 20, 10, 40, 15, 25]
                            ],
                            colors: {
                                data1: '#1ab394',
                                data2: '#BABABA'
                            }
                        }
                    });

                    c3.generate({
                        bindto: '#slineChart',
                        data: {
                            columns: [
                                ['Contratos', 30, 200, 100, 400, 150, 250],
                                ['xxx', 130, 100, 140, 200, 150, 50]
                            ],
                            colors: {
                                data1: '#1ab394',
                                data2: '#BABABA'
                            },
                            type: 'spline'
                        }
                    });


                });

            </script>
    </body>
</html>