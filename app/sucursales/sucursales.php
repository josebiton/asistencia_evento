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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRegSucursal">
                                <?php echo $nuevo; ?>
                            </button>
                        </div>

                        <div class="modal inmodal" id="ModalRegSucursal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Cerrar</span></button>
                                        <i class="fa fa-home modal-icon"></i>
                                        <p><small class="font-bold"><?php echo $titulo_reg; ?></small></p>                                        
                                    </div>

                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" id="RegSucursal" method="post">

                                            <div class="form-group col-lg-12 row">
                                                <div class="col-sm-12">
                                                    <input type="text" placeholder="* Nombre"class="form-control"name="nombre" required=""onkeypress="return SoloLetras(event)">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 row">
                                             <div class="col-sm-6"> 
                                                <input type="tel" placeholder="Teléfono"class="form-control"name="telefono" onkeypress="return SoloNumeros(event)" maxlength="9">
                                            </div> 
                                                <div class="col-sm-6"form-group"> 
                                                    <select class="form-control"onchange="javascript:region(this.value);" name="regionUS">
                                                        <option>Región</option>
                                                        <?php
                                                        $regiones = mysqli_query($link, "SELECT region FROM peru GROUP BY region");
                                                        while ($row = mysqli_fetch_array($regiones)) {
                                                            ?>
                                                            <option><?php echo $row['region']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>                                          
                                            <div class="form-group col-lg-12 row">                                                                                                 
                                                <div class="col-sm-6 form-group"id="provincias">
                                                    <select class="form-control">
                                                        <option>Elija una Región</option>
                                                    </select> 
                                                </div>
                                                <div class="col-sm-6 form-group" id="distritos">
                                                    <select class="form-control">
                                                        <option>Elija una Provincia</option>
                                                    </select>
                                                </div>
                                            </div>                                             
                                            <div class="form-group col-lg-12 row">
                                                <input type="text"class="form-control" placeholder="Dirección"name="direccion">   
                                            </div>
                                            <!-- <div class="form-group col-lg-12 row">
                                                 <input type="file"class="form-control"name="foto">   
                                             </div>
                                            -->
                                            <div class="modal-footer">
                                                <div id="MsjRegSucursal"></div>
                                                <button type="reset" class="btn btn-white">Limpiar</button>
                                                <input type="submit" class="btn btn-primary" value="Registrar">
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--  ................................ -->
                    <div class="modal inmodal" id="ModalUpdSucursal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h6 class="modal-title">Editar Datos</h6>  
                                    
                                </div>
                                <form enctype="multipart/form-data" id="FormUpdSucursal" method="post">
                                    <div class="modal-body" id="FormDataSucursal">

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- .................-->
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="ListSucursales">
                                <?php include_once 'ListSucursales.php'; ?>
                            </div>
                        </div>

                    </div>
                </div>
<div id="MsjDelSucursal"> </div>
                <?php include_once '../common/footer.php'; ?>


            </div>
        </div>


        <!-- Mainly scripts -->
        <script src="../common/files/js/jquery_3.5.1.js"></script>

        <script src="js/sucursales.js" type="text/javascript"></script>

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
                                                                $('.sucursales').DataTable({
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


