<?php
//error_reporting(0);
//include_once '../../common/conexion.php';
include_once '../common/validador.php';
if (in_array(101, $Codigo)||in_array(105, $Codigo)) {}else{  header('Location: ../../common/cs.php');}

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
        <link href="../common/files/css/animate.css" rel="stylesheet">
        <link href="../common/files/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>"/>
        <style>            
.contenedor-imagen {
    width: 100px; /* Ancho del contenedor */
    height: auto; /* Alto del contenedor */
    overflow: hidden; /* Oculta el desbordamiento si la imagen es más grande */
    display: flex; /* Centra la imagen */
    justify-content: center;
    align-items: center;
    border: 0px solid #ddd; /* Opcional: borde alrededor del contenedor */
}


        </style>
    </head>

    <body>
        <div id="wrapper">
                <?php include_once '../common/menu_left.php'; ?>
            <div id="page-wrapper" class="gray-bg">
<?php include_once '../common/header.php'; ?>
                <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Participantes</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>App Views</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Participantes</strong>
                        </li>
                    </ol>
                </div>
            </div>
                <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox">
                        <div class="ibox-content">                            
                            <h2>Participantes</h2>
                            <p>
                                Puede verificar el ingreso de cada participantes medinate dos formas:<br>
                            <li>Lectura del codigo de barras del DNI del participantes.</li>
                            <li>Digite manualmente el DNI del participante.</li>
                            </p>
                            <div class="input-group">
                                <input type="text" id="registro" placeholder="Buscar Participante " class="input form-control" maxlength="8">
                                <span class="input-group-append">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div> 
                    <div class="row">
                <div class="col-sm-12">
                    <div id="resultado" ><img src="../../common/img/loading.gif" alt="Esperando orden para buscar"></div>
                </div>    
        </div>
        </div>

<?php include_once '../common/footer.php'; ?>

<script src="../common/files/js/jquery_3.5.1.js"></script>
        <script src="../common/files/js/bootstrap.js"></script>
        <!-- Custom and plugin javascript -->
        <script src="../common/files/js/inspinia.js"></script>

<script>
          $(document).ready(function() {
            $("#registro").on("input", function() {
                var valor = $(this).val();
                
                // Verificar que solo contenga números
                if (!/^\d*$/.test(valor)) {
                    $(this).val(valor.replace(/\D/g, ""));  // Eliminar caracteres no numéricos
                    return;
                }
                
                // Verificar si tiene exactamente 8 dígitos
                if (valor.length === 8) {
                    $.ajax({
                        url: "php/registro.php",
                        method: "POST",
                        data: { query: valor },
                        success: function(response) {
                            $("#resultado").html(response);
                            $("#registro").val("");  // Limpiar el campo de texto después de la consulta
                        }
                    });
                }
            });
        });
    </script>

    </body>

</html>

