$(function(){
        $("#CambiarFotoPerfil").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("CambiarFotoPerfil"));
            formData.append("dato", "valor");
            var $contenidoAjax = $('div#MsjFotoPerfil').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
            $.ajax({
                url: "php/perfil_actualizar_foto.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#MsjFotoPerfil").html(res);
                });
        });
    });
    //...............................
   
      //...............................