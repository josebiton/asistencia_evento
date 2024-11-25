
//.............................................
$(function(){
        $("#RegPersona").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("RegPersona"));
            formData.append("dato", "valor");
            var $contenidoAjax = $('div#MsjRegUser').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
            $.ajax({
                url: "php/RegPersona.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#MsjRegPersona").html(res);
            $( '#ModalRegPersona' ).modal( 'hide' ).data( 'bs.modal', null );
                });
        });
    });
    //...............................
   function ListPersonas(){
             var $contenidoAjax = $('div#ListPersonas').html('<center><p><img src=".../../common/img/loading.gif" /></p></center>');
        $.ajax({
          url:"ListPersonas.php"
      }).done(function( data ) {
	  $('#ListPersonas').html(data);
      });
      }
 //...............................
 function DelPersona(x,y){
          if(confirm("¿ Realmente desea eliminar a esta persona ?")){ 
             var $contenidoAjax = $('div#MsjDelPersona').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "id" : x,
        "idl" : y
       };      
        $.ajax({
        data:  parametros,
    url:   'php/DelPersona.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#MsjDelPersona').html(data);
      });
  }
      }
      //...............................
      
function UpdPersona(x,y){
             var $contenidoAjax = $('div#FormDataPersona').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "id" : x,
        "idl" : y
       };
        $.ajax({
        data:  parametros,
    url:   'FormUpdPersona.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#FormDataPersona').html(data);           
      });
      }
//...............................
 $(function(){
        $("#FormUpdPersona").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("FormUpdPersona"));
            formData.append("dato", "valor");
            var $contenidoAjax = $('div#MsjUpdPersona').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
            $.ajax({
                url: "php/UpdPersona.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#MsjUpdPersona").html(res);
            $( '#ModalUpdPersona' ).modal( 'hide' ).data( 'bs.modal', null );
                });
        });
    });
    //...............................     
  
function provincias(x0) {
    var $contenidoAjax = $('div#distritos').html('<center><p><img src="../../common/img/loading.gif"/></p></center>');
    var parametros = {
        "provincia": x0
    };
    $.ajax({
        data: parametros,
        url: 'distritos.php',
        type: 'POST'

    }).done(function (data) {
        $('#distritos').html(data);
    });
}
//--------------------------------------------
  //...............................    
function region(x0) {
    var $contenidoAjax = $('div#provincias').html('<center><p><img src="../../common/img/loading.gif"/></p></center>');
    var parametros = {
        "region": x0
    };
    $.ajax({
        data: parametros,
        url: 'provincias.php',
        type: 'POST'

    }).done(function (data) {
        $('#provincias').html(data);
    });
}
//...............................    
function region1(x0) {
    var $contenidoAjax = $('div#provinciasUpd').html('<center><p><img src="../../common/img/loading.gif"/></p></center>');
    var parametros = {
        "region": x0
    };
    $.ajax({
        data: parametros,
        url: 'provincias_1.php',
        type: 'POST'

    }).done(function (data) {
        $('#provinciasUpd').html(data);
    });
}
//............................... 
function provincias1(x0) {
    var $contenidoAjax = $('div#distritosUpd').html('<center><p><img src="../../common/img/loading.gif"/></p></center>');
    var parametros = {
        "provincia": x0
    };
    $.ajax({
        data: parametros,
        url: 'distritos_1.php',
        type: 'POST'

    }).done(function (data) {
        $('#distritosUpd').html(data);
    });
}
//--------------------------------------------