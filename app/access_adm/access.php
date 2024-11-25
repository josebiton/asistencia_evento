<?php
include_once '../common/validador.php';
if (!in_array(101, $Codigo)) {
    header('Location: ../../common/cs.php');
}
include_once '../common/config.php';
include_once 'config.php';
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
                    <div class="modal inmodal" id="myModal3" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h6 class="modal-title">Asignar Usuario y Clave</h6>
                                    <div id="MsjUpdatePass"> </div>
                                </div>
                                <form enctype="multipart/form-data" id="UpdatePass" method="post">
                                    <div class="modal-body" id="FormUpdPass">

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>               
                    <!-- .................-->
                </div>
                
                <!-- .................-->
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="ListUsers">
                                <?php include_once 'ListUsers.php'; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="<?php echo $IdDiv2; ?>">
                                
                            </div>
                        </div>

                    </div>
                </div>

                <?php include_once '../common/footer.php'; ?>

                <div id="MsjDelPersona"> </div>
            </div>
        </div>


        <!-- Mainly scripts -->
        <script src="../common/files/js/jquery_3.5.1.js"></script>

        <script src="js/access_adm.js" type="text/javascript"></script>

        <script src="../common/files/js/popper.min.js"></script>
        <script src="../common/files/js/bootstrap.js"></script>
        <script src="../common/files/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="../common/files/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="../common/files/js/plugins/dataTables/datatables.min.js"></script>
        <script src="../common/files/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="../common/files/js/inspinia.js"></script>
        <script src="../common/files/js/plugins/pace/pace.min.js"></script>

        <!-- Page-Level Scripts -->
        <script>
                                                        $(document).ready(function () {
                                                            $('.inquilinos').DataTable({
                                                                pageLength: 25,
                                                                responsive: true,
                                                                dom: '<"html5buttons"B>lTfgitp',
                                                                buttons: [
                                                                    {extend: 'copy'},
                                                                    {extend: 'csv'},
                                                                    {extend: 'excel', title: 'ExampleFile'},
                                                                    {extend: 'pdf', title: 'ExampleFile'},

                                                                    {extend: 'print',
                                                                        customize: function (win) {
                                                                            $(win.document.body).addClass('white-bg');
                                                                            $(win.document.body).css('font-size', '10px');

                                                                            $(win.document.body).find('table')
                                                                                    .addClass('compact')
                                                                                    .css('font-size', 'inherit');
                                                                        }
                                                                    }
                                                                ]

                                                            });

                                                        });

        </script>
        <script language="javascript"  type="text/javascript" >
            function SoloNumeros(e) {
                teclaN = (document.all) ? e.keyCode : e.which;
                if (teclaN == 8) {
                    return true;
                }
                patronN = /[0-9]/;
                tecla_finalN = String.fromCharCode(teclaN);
                return patronN.test(tecla_finalN);
            }
            function SoloLetras(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                if (tecla == 8) {
                    return true;
                }
                patron = /[A-Za-z áéíóúÁÉÍÓÚ]/;
                //patron = /[A-Za-z0-9]/; // letras y numeros
                //patron = /[0-9]/; // solo numeros
                tecla_final = String.fromCharCode(tecla);
                return patron.test(tecla_final);
            }
        </script>  
        <script type="text/javascript">
            function toggle(elemento) {
                if (elemento.value == "Natural") {
                    document.getElementById("natural").style.display = "block";
                    document.getElementById("juridica").style.display = "none";
                } else {
                    if (elemento.value == "Juridica") {
                        document.getElementById("natural").style.display = "none";
                        document.getElementById("juridica").style.display = "block";
                    }
                }
            }

        </script>
    </body>

</html>


