  //....................................
  function ResetPass(x){
             var $contenidoAjax = $('div#FormUpdPass').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "id" : x
       };
        $.ajax({
        data:  parametros,
    url:   'ResetPass.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#FormUpdPass').html(data);
      });
      }
//...............................
$(function(){
        $("#UpdatePass").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("UpdatePass"));
            formData.append("dato", "valor");
            var $contenidoAjax = $('div#MsjUpdatePass').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
            $.ajax({
                url: "php/UpdPass.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#MsjUpdatePass").html(res);
            $( '#myModal3' ).modal( 'hide' ).data( 'bs.modal', null );
                });
        });
    });
  
//--------------------------------------------

      //...............................

    //...............................     
function DelAccessM(x,c,y,z){
    if(confirm("¿ Realmente desea eliminar este acceso. perderá todos los accesos a este perfil ?")){
             var $contenidoAjax = $('div#ListUsers').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "idp" : x,
        "cod" : c,
        "idl" : y,
        "ids" : z,
       };
        $.ajax({
        data:  parametros,
    url:   'php/DelAccess.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#ListUsers').html(data);           
      });
  }
      }
//...............................
function AccessMaster(x,y,z){
             var $contenidoAjax = $('div#ReturnDiv2').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "ids" : x,
        "idp" : y,
        "idl" : z
       };
        $.ajax({
        data:  parametros,
    url:   'php/div2.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#ReturnDiv2').html(data);           
      });
      }
//...............................
function AsignAccessM(x,y,z){
             var $contenidoAjax = $('div#IdDiv2').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "idp" : x,
        "idl" : y,
        "ids" : z
       };
        $.ajax({
        data:  parametros,
    url:   'add.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#IdDiv2').html(data);           
      });
      }
//...............................
   function ListAccess(){
             var $contenidoAjax = $('div#ListUsers').html('<center><p><img src=".../../common/img/loading.gif" /></p></center>');
        $.ajax({
          url:"ListUsers.php"
      }).done(function( data ) {
	  $('#ListUsers').html(data);
      });
      }
 //...............................
 function AccessAdmin(x,y,z){
             var $contenidoAjax = $('div#ReturnDiv2').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "ids" : x,
        "idp" : y,
        "idl" : z
       };
        $.ajax({
        data:  parametros,
    url:   'php/div2_1.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#ReturnDiv2').html(data);           
      });
      }
//...............................