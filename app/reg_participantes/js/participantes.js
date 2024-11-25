$(function () {
    $("#RegistroParti").on("submit", function (e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("RegistroParti"));
        formData.append("dato", "valor");
        var $contenidoAjax = $('div#computo_listado').html('<center><p><img src="../files/img/cargando.gif" /></p></center>');
        $.ajax({
            url: "php/parti_registro.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
                .done(function (res) {
                    $("#MensajeRegistroAtaud").html(res);
                    $('#myModal').modal('hide').data('bs.modal', null);
                });
    });
});
//...............................
function ListadoAtaudes() {
    var $contenidoAjax = $('div#listado').html('<center><p><img src="../files/img/cargando.gif" /></p></center>');
    $.ajax({
        url: "participantes_listado.php"
    }).done(function (data) {
        $('#listado').html(data);
    });
}
//...............................
function AtaudesEditar(x) {
    var $contenidoAjax = $('div#ModalEditar').html('<center><p><img src="../files/img/cargando.gif" /></p></center>');
    var parametros = {
        "id": x
    };
    $.ajax({
        data: parametros,
        url: 'ataudes_editar.php',
        type: 'POST'
    }).done(function (data) {
        $('#ModalEditar').html(data);
    });
}
//...............................
function AtaudesEditarFoto(x) {
    var $contenidoAjax = $('div#ModalEditarF').html('<p><img src="../files/img/cargando.gif" /></p>');
    var parametros = {
        "id": x
    };
    $.ajax({
        data: parametros,
        url: 'ataudes_editar_foto.php',
        type: 'POST'
    }).done(function (data) {
        $('#ModalEditarF').html(data);
    });
}
//.........................................................................
function AtaudesEliminar(x, y) {
    var parametros = {
        "id": x
    };
    if (confirm("¿ Realmente desea eliminar este Archivo de forma permanente ?")) {
        $.ajax({
            data: parametros,
            url: 'php/ataud_eliminar.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                $("#InventarioEliminar").html("Procesando, espere por favor...");
            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#InventarioEliminar").html(response);
            }
        });
    }
}
//.........................................................................
$(function () {
    $("#ActualizarAtaudes").on("submit", function (e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("ActualizarAtaudes"));
        formData.append("dato", "valor");
        var $contenidoAjax = $('div#MensajeUpdateAtaudes').html('<center><p><img src="../../common/img/loading.gif" /></p></center>');
        $.ajax({
            url: "php/ataud_actualizar.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
                .done(function (res) {
                    $("#MensajeUpdateAtaudes").html(res);
            $('#myModal3').modal('hide').data('bs.modal', null);
                });
    });
});
//...............................
function AtaudesDetalle(x) {
    var $contenidoAjax = $('div#ModalDetalles').html('<center><p><img src="../files/img/cargando.gif" /></p></center>');
    var parametros = {
        "id": x
    };
    $.ajax({
        data: parametros,
        url: 'ataudes_detalle.php',
        type: 'POST'
    }).done(function (data) {
        $('#ModalDetalles').html(data);
    });
}
//...............................
$(function () {
    $("#ActualizarFoto").on("submit", function (e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("ActualizarFoto"));
        formData.append("dato", "valor");
        var $contenidoAjax = $('div#ModalEditarF').html('<center><p><img src="../files/img/cargando.gif" /></p></center>');
        $.ajax({
            url: "php/ataud_actualizar_foto.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
                .done(function (res) {
                    $("#ModalEditarF").html(res);
            $( '#myModal4' ).modal( 'hide' ).data( 'bs.modal', null );
                });
    });
});
//...............................