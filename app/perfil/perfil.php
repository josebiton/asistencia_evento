<?php
error_reporting(0);
include_once '../common/validador.php';

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
                <div class="row wrapper border-bottom white-bg page-heading">                
            </div>
                <br>
                <!-- .................-->
                <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                        <?php 
                        include_once '../../common/conexion.php';
                        $id_login=$_SESSION['id_login'];
                        $login= mysqli_fetch_assoc(mysqli_query($link, "SELECT id_persona FROM login WHERE id_login='$id_login'"));
    $id_persona = $login['id_persona'];
                        ?>
                        <div class="col-lg-6">
                            <div class="ibox ">
    <div class="ibox-title">
        <h5>Cambie su foto de perfil</h5>
    </div>
    <div class="ibox-content">
        <form enctype="multipart/form-data" id="CambiarFotoPerfil" method="post">
      <?php 
$FotoPerfil = mysqli_fetch_assoc(mysqli_query($link, "SELECT foto FROM personas WHERE id_persona = '$id_persona'"));
$foto=$FotoPerfil['foto'];
?>
<input type="hidden" name="id" value="<?php echo $id_persona; ?>">
<div class="form-group">
    <?php
    if(empty($foto)){ ?>
    <img src="img/silueta.png" alt="silueta de perfil" width="200" height="auto"/>
  <?php  }else{ ?>
      <img src="uploads/<?php echo $foto;?>" alt="Tuvimos  problemas para cargar la imagen" width="200" height="auto"/>
  <?php }    ?>
    
</div>
<div class="form-group"><label>Foto</label><input type="file"class="form-control"name="foto"></div>
<div class="modal-footer">
    <div id="MsjFotoPerfil"> </div>
    <input type="submit" class="btn btn-primary"  value="Actualizar Foto">
</div>
        </form>
    </div>
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

        <script src="js/perfil.js" type="text/javascript"></script>

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

        <script type="text/javascript">
          

        </script>
    </body>

</html>




