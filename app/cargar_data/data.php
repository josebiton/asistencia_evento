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
        <link href="../common/files/css/animate.css" rel="stylesheet">
        <link href="../common/files/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>"/>
        <style>

        </style>
    </head>

    <body>
        <div id="wrapper">
            <?php include_once '../common/menu_left.php'; ?>
            <div id="page-wrapper" class="gray-bg">
                <?php include_once '../common/header.php'; ?>

                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content">                            
                                    <h2>Lista en excel</h2>
                                    <hr>
                                    <p>
                                        Puede cargar la lista de participantes desde un archivo excel, el cual debe contener las siguientes columnas:<br>
                                        Nombres y apellidos |dni|grupo|fecha_pago|hora_pago
                                    </p>                                    
                                    <div class="custom-file">
                                        <form enctype="multipart/form-data" id="IdFormRecord" method="post">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input id="file" type="file" name="file" class="custom-file-input" accept=".xlsx, .xls" required>
                                                    <label for="logo" class="custom-file-label">Suba aquí su archivo excel</label>
                                                </div>
                                                <div class="col-sm-6">  
                                                    <select class="select2_demo_3 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="id_e">
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

                                                <br><br>
                                                <button type="submit" class="btn btn-w-m btn-primary" name="upload">Cargar</button>
                                            </form>
                                        </div> 

                                    </div>
                                </div>
                            </div>

                        </div> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox ">
                                    <div class="ibox-content" id="result">
                                        ...
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div> 

                </div>

                <?php include_once '../common/footer.php'; ?>

            <script src="../common/files/js/jquery_3.5.1.js"></script>
            <script src="../common/files/js/bootstrap.js"></script>
            <script src="../common/files/js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="../common/files/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

            <!-- Custom and plugin javascript -->
            <script src="../common/files/js/inspinia.js"></script>
            <script src="../common/files/js/plugins/pace/pace.min.js"></script>

            <script>
                $('.custom-file-input').on('change', function () {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });

                $(function () {
                    $("#IdFormRecord").on("submit", function (e) {
                        e.preventDefault();
                        var f = $(this);
                        var formData = new FormData(document.getElementById("IdFormRecord"));
                        formData.append("upload", "valor");
                        var $contenidoAjax = $('div#result').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
                        $.ajax({
                            url: "upload.php",
                            type: "post",
                            dataType: "html",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                        })
                                .done(function (res) {
                                    $("#result").html(res);
                                });
                    });
                });
                //------------------------------------------

            </script>

    </body>

</html>

