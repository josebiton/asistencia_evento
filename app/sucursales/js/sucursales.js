
//.............................................
$(function(){
        $("#RegSucursal").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("RegSucursal"));
            formData.append("dato", "valor");
            var $contenidoAjax = $('div#MsjRegSucursal').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
            $.ajax({
                url: "php/RegSucursal.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#MsjRegSucursal").html(res);
            $( '#ModalRegSucursal' ).modal( 'hide' ).data( 'bs.modal', null );
                });
        });
    });
    //...............................
   function ListSucursales(){
             var $contenidoAjax = $('div#ListSucursales').html('<center><p><img src=".../../common/img/loading.gif" /></p></center>');
        $.ajax({
          url:"ListSucursales.php"
      }).done(function( data ) {
	  $('#ListSucursales').html(data);
      });
      }
 //...............................
 function DelSucursal(x){
          if(confirm("¿ Realmente desea eliminar a esta sucursal ?")){ 
             var $contenidoAjax = $('div#MsjDelSucursal').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "id" : x
       };      
        $.ajax({
        data:  parametros,
    url:   'php/DelSucursal.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#MsjDelSucursal').html(data);
      });
  }
      }
      //...............................
      
function AuditarSucursal(x,y){
             var $contenidoAjax = $('div#FormDataSucursal').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "id" : x
       };
        $.ajax({
        data:  parametros,
    url:   'php/auditar_sucursal.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#FormDataSucursal').html(data);           
      });
      }
//...............................
function UpdSucursal(x,y){
             var $contenidoAjax = $('div#FormDataSucursal').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "id" : x,
        "idl" : y
       };
        $.ajax({
        data:  parametros,
    url:   'FormUpdSucursal.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#FormDataSucursal').html(data);           
      });
      }
//...............................
 $(function(){
        $("#FormUpdSucursal").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("FormUpdSucursal"));
            formData.append("dato", "valor");
            var $contenidoAjax = $('div#MsjUpdSucursal').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
            $.ajax({
                url: "php/UpdSucursal.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#MsjUpdSucursal").html(res);
            $( '#ModalUpdSucursal' ).modal( 'hide' ).data( 'bs.modal', null );
                });
        });
    });
    //...............................     
  
//...............................

//--------------------------------------------
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