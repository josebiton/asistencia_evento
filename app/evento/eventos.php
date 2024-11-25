<?php
include_once '../common/validador.php';
if (!in_array(200, $Codigo)) {
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
                    <div class="col-lg-12"> 
                        <div class="text-left">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $IdModalRecord; ?>">
                                <?php echo $nuevo; ?>
                            </button>
                        </div>

                        <div class="modal inmodal" id="<?php echo $IdModalRecord; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Cerrar</span></button>
                                        <i class="fa fa-heart-o modal-icon"></i>
                                        <p><small class="font-bold"><?php echo $titulo_reg; ?></small></p>                                        
                                    </div>

                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" id="IdFormRecord2" method="post">

                                            <div class="form-group col-lg-12 row">
                                                <div class="col-sm-12">
                                                    <input type="text" placeholder="Nombre del evento"class="form-control"name="nombre" required="">
                                                </div>
                                            </div>                                         
                                            <div class="form-group col-lg-12 row">                                                                                                 
                                                <div class="col-sm-12 form-group">
                                                    <input type="date" placeholder="Fecha del evento"class="form-control"name="fecha" required=""> 
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 row">                                                                                                 
                                                <div class="col-sm-12 form-group">
                                                    <input type="time" placeholder="Hora del evento"class="form-control"name="hora" required=""> 
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 row">                                                                                                 
                                                <div class="col-sm-12 form-group">
                                                    <input type="text" placeholder="Lugar del evento"class="form-control"name="lugar" required=""> 
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div id="<?php echo $MsjRecord; ?>"></div>
                                                <button type="reset" class="btn btn-white">Limpiar</button>
                                                <input type="submit" class="btn btn-primary" value="Registrar">
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal" id="<?php echo $IdModalUpdate; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h6 class="modal-title">Editar Datos</h6>  

                                </div>
                                <form enctype="multipart/form-data" id="<?php echo $IdFormUpdate; ?>" method="post">
                                    <div class="modal-body" id="<?php echo $IdDivUpdate; ?>">

                                    </div>
                                    <div id="<?php echo $MsjUpdate; ?>"> </div> 
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="<?php echo $IdDivList; ?>">
                                <?php include_once 'List.php'; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="<?php echo $MsjDelete; ?>"> </div>

                <?php include_once '../common/footer.php'; ?>


            </div>
        </div>


        <!-- Mainly scripts -->
        <script src="../common/files/js/jquery_3.5.1.js"></script>

        <script src="js/evento.js" type="text/javascript"></script>

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
                                                            $('.seguros').DataTable({
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


