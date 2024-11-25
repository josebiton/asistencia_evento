
//.............................................
$(function(){
        $("#IdFormRecord2").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("IdFormRecord2"));
            formData.append("dato", "valor");
            var $contenidoAjax = $('div#MsjRecord').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
            $.ajax({
                url: "php/Record.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#MsjRecord").html(res);
            $( '#IdModalRecord' ).modal( 'hide' ).data( 'bs.modal', null );
                });
        });
    });
    //...............................
   function List(){
             var $contenidoAjax = $('div#IdDivList').html('<center><p><img src=".../../common/img/loading.gif" /></p></center>');
        $.ajax({
          url:"List.php"
      }).done(function( data ) {
	  $('#IdDivList').html(data);
      });
      }
 //...............................
 function Delete(x){
          if(confirm("¿ Realmente desea eliminar este registro ?")){ 
             var $contenidoAjax = $('div#MsjDelete').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "id" : x
       };      
        $.ajax({
        data:  parametros,
    url:   'php/Delete.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#MsjDelete').html(data);
      });
  }
      }
      //...............................
      
function Update(x){
             var $contenidoAjax = $('div#IdDivUpdate').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
             var parametros = {
        "id" : x,
       };
        $.ajax({
        data:  parametros,
    url:   'FormUpd.php',
    type:  'POST'
      }).done(function( data ) {
	  $('#IdDivUpdate').html(data);           
      });
      }
//...............................
 $(function(){
        $("#IdFormUpdate").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("IdFormUpdate"));
            formData.append("dato", "valor");
            var $contenidoAjax = $('div#MsjUpdate').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
            $.ajax({
                url: "php/Update.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    $("#MsjUpdate").html(res);
            $( '#IdModalUpdate' ).modal( 'hide' ).data( 'bs.modal', null );
                });
        });
    });
    //...............................     
