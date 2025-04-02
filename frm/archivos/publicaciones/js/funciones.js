function agregarPublicacion() {
       if(validarDatos()){
        var formData = new FormData(document.getElementById("formPrograma"));
        $.ajax({
            url: "php/agregar.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                limpiarCampos();
                alertify.alert(res);
            },
            error: function (e) {
                $("#mensajes").html("No se puede agregar los datos, Error:" + e.status);
            }
        });
    }
}

function validarDatos(){
    if($("#titulo").val()==""){
        alertify.alert("<span style='color:red'>Debe escribir un titulo<span>");
        return false;
    }else if (document.getElementById("Imagen").files.length == 0) {
        alertify.alert("Debe seleccionar una imagen previamente");
        return false;
    }
    return true;
}

function buscarTituloPublicacion() {
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        type: 'POST',
        url: 'php/buscarTitulo.php',
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function (objeto) {
            $("#mensajes").html("Enviando datos al servidor...");
            $("#contenidoBusqueda").css("display", "none");
        },
        success: function (json) {
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click", function () {
                var id = parseInt($(this).find("td:first").html());
                if(!Number.isNaN(id)){
                    $("#panelBuscar").html("");
                    $("#id").val(id);
                    buscarIdPublicacion();
                    $("#buscar").fadeOut("slow");
                    $("#panelPrograma").fadeIn("slow");
                }
            });
        },
        error: function (error) {
            alertify.alert("Error:" + error.responseText);
        }
    });
}

function buscarIdPublicacion() {
    var datosFormulario = $("#formPrograma").serialize();
    $.ajax({
        type: 'POST',
        url: 'php/buscarId.php',
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function () {
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function (json) {
            $("#mensajes").html(json.mensaje);
            $("#titulo").val(json.titulo);
            $("#contenido").val(json.contenido);
            $("#botonAgregar").prop('disabled', true);
            $("#botonModificar").prop('disabled', false);
            $("#botonEliminar").prop('disabled', false);
            $("#botonCancelar").prop('disabled', false);
        },
        error: function (e) {
            $("#mensajes").html("Error:" + e.responseText);
        }
    });
}
function eliminarPublicacion() {
    var datosFormulario = $("#formPrograma").serialize();
    $.ajax({
        type: 'POST',
        url: 'php/eliminar.php',
        data: datosFormulario,
        dataType: 'html',
        beforeSend: function (objeto) {
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function (res) {
            $("#mensajes").html(res);
            limpiarCampos();
            $("#botonAgregar").prop('disabled', false);
            $("#botonModificar").prop('disabled', true);
            $("#botonEliminar").prop('disabled', true);
            $("#botonCancelar").prop('disabled', true);
        },
        error: function (e) {
            $("#mensajes").html("Error" + e.responseText);
        }
    });
}

function modificarPublicacion() {
    var formData = new FormData(document.getElementById("formPrograma"));
    $.ajax({
        url: "php/modificar.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function (res) {
            $("#mensajes").html(res);
            limpiarCampos();
            $("#botonAgregar").prop('disabled', false);
            $("#botonModificar").prop('disabled', true);
            $("#botonEliminar").prop('disabled', true);
            $("#botonCancelar").prop('disabled', true);
        },
        error: function (e) {
            $("#mensajes").html(e.responseText);
        }
    });
}

function limpiarCampos() {
    document.getElementById("formPrograma").reset();
}