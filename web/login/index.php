<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
    <link href="files/css/bootstrap.min.css" rel="stylesheet">
    <link href="files/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="files/css/animate.css" rel="stylesheet">
    <link href="files/css/style.css" rel="stylesheet">
     <link rel="shortcut icon" type="image/png" href="../../common/img/mello.png"/>
</head>
<?php include_once 'config.php';?>
<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Bienvenidos</h2>
<p> <?php echo $nombre_sistema;?> es un sistema web de alta calidad desarrollado para brindar un servicio completo a su empresa, ofreciendo una manera simple de utilizar. </p>
<p> Nuestra empresa desarrolla soluciones utilizando las últimas tendencias en desarrollo de software. </p>
<p> <small> Nuestra meta es la satisfacción del cliente.</small> </p>
<a href="#" class="btn btn-success"> GrupoAZE  <span class="fa fa-arrow-right"></span></a>

            </div>
            <?php if($solo_login==1){?>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form">
                        <div class="form-group">
                            <input type="text" id="user"class="form-control"  required="" onkeypress="enviar(event);"placeholder="Usuario" autofocus="">
                        </div>
                        <div class="form-group">
                            <input type="password" id="pass"class="form-control" onkeypress="enviar(event);"placeholder="Password"required="">
                        </div>
                        <div id="MsjLog">
                         <a href="javascript:;" onclick="login($('#user').val(),$('#pass').val())" class="btn btn-primary block full-width m-b">Ingresar <i class="fa fa-arrow-circle-right"></i></a>   
                        </div>
<?php if($recuperar_pass==1){?>
                        <a href="#">
                            <small>¿ Olvidó su contraseña ?</small>
                        </a>
<?php }?>
                    </form>
                    <p class="m-t">
                        <small>System | AZE</small>
                    </p>
                </div>
            </div>
            <?php }elseif($login_registro==1){?>
           <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form">
                        <div class="form-group">
                            <input type="text" id="user"class="form-control"  required="" onkeypress="enviar(event);"placeholder="Usuario" autofocus="">
                        </div>
                        <div class="form-group">
                            <input type="password" id="pass"class="form-control" onkeypress="enviar(event);"placeholder="Password"required="">
                        </div>
                        <div id="MsjLog">
                         <a href="javascript:;" onclick="login($('#user').val(),$('#pass').val())" class="btn btn-primary block full-width m-b">Ingresar <i class="fa fa-arrow-circle-right"></i></a>   
                        </div>
<?php if($recuperar_pass==1){?>
                        <a href="#">
                            <small>¿ Olvidó su contraseña ?</small>
                        </a>
<?php }?>
                        <p class="text-muted text-center">
                            <small>¿ Aún no tiene una cuenta ?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="#">Crear Cuenta</a>
                    </form>
                    <p class="m-t">
                        <small>System | AZE</small>
                    </p>
                </div>
            </div> 
            <?php }?>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright GrupoAZE
            </div>
            <div class="col-md-6 text-right">
               <small>© 2021-2031</small>
            </div>
        </div>
    </div>

</body>
<script src="files/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script>
function enviar(evento){
if(evento.keyCode==13) {
login($('#user').val(),$('#pass').val());
}
}
//---------------------------------------------
function login(x0, x11){
var $contenidoAjax = $('div#MsjLog').html('<center><p><img src="files//img/loading.gif"/></p></center>');    
var parametros = {
    "user" : x0,
    "pass" : x11
};
$.ajax({
    data:  parametros,
    url:   'php/validarlogin.php',
    type:  'POST'

}).done(function( data ) {
$('#MsjLog').html(data);
});
}
</script>
</html>


