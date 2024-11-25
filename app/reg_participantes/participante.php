<?php
//error_reporting(0);
include_once '../../common/conexion.php';
include_once '../common/validador.php';
if (!in_array(101, $Codigo)) {
    if (!in_array(105, $Codigo)) {
        header('Location: ../../common/cs.php');
    }
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
        <link href="../common/files/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="../common/files/css/animate.css" rel="stylesheet">
        <link href="../common/files/css/style.css" rel="stylesheet">
        <link href="../common/files/css/plugins/toastr/toast.style.css" rel="stylesheet">
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Nuevo Participante
                            </button>
                        </div>
                        <div id="InventarioEliminar"> </div>
                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Cerrar</span></button>
                                        <i class="fa fa-apple modal-icon"></i>
                                        <p><small class="font-bold">Registre un nuevo Participante</small></p>
                                        <div id="MensajeRegistroAtaud"> ...</div>
                                    </div>
                                    <form enctype="multipart/form-data" id="RegistroParti" method="post">
                                        <div class="modal-body">

                                            <div class="form-group"><input type="text" placeholder="Nombres"class="form-control" name="nombres" value="" required="" ></div>
                                            <div class="form-group col-lg-12 row" >
                                                <div class="col-sm-12"><input type="text" placeholder="DNI"class="form-control" name="dni" value="" required=""maxlength="8"></div>
                                            </div>
                                            <div class="form-group col-lg-12 row">
                                                <div class="col-lg-12">
                                                    <select class="form-control"name="evento">
                                                        <option value="0">Elija un evento</option>
                                                        <?php
                                                        $sucursal = $_SESSION['sucursal'];
                                                        $proveedores = mysqli_query($link, "SELECT id_evento,nombre_evento,fecha_evento FROM evento");
                                                        while ($row = mysqli_fetch_array($proveedores)) {
                                                            ?>
                                                            <option value="<?php echo $row['id_evento']; ?>"><?php echo $row['nombre_evento']; echo "&nbsp;&nbsp;&nbsp;(&nbsp;";echo $row['fecha_evento'];echo "&nbsp;)&nbsp;"; ?></option>
                                                        <?php }?>
                                                        </select>   
                                                </div>
                                            </div>                                          
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-white">Limpiar</button>
                                            <input type="submit" class="btn btn-primary" value="Registrar">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="">
                    <div id="listado"><?php include_once 'participantes_listado.php';?>  </div>
                </div>
                
             
<?php include_once '../common/footer.php'; ?>

            </div>
        </div>




        <script src="../common/files/js/jquery_3.5.1.js"></script>

        <script src="js/participantes.js" type="text/javascript"></script>

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
        <!-- para mensajitos -->
        

        <script>
            $(document).ready(function () {
                $('.dataTables-example').DataTable({
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
  
        
    </body>

</html>

