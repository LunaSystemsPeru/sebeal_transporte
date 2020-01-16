$(document).ready(function () {
    obtenerMisDocumentosSunat();
    //autocomplete
    $("#input_remitente").autocomplete({
        source: "../controller/ajax/buscar_clientes.php",
        minLength: 2,
        select: function (event, ui) {
            event.preventDefault();
            $('#hidden_id_remitente').val(ui.item.id);
            $('#hidden_ruc_remitente').val(ui.item.ruc);
            var tipo_cliente = ui.item.tipo;
            if (tipo_cliente === "1") {
                $("#select_cliente").val(2).change();
                $('#hidden_id_cliente').val(ui.item.id);
            }
            $('#input_remitente').val(ui.item.razon_social);
            $('#input_destinatario').focus();
        }
    });

    $("#input_destinatario").autocomplete({
        source: "../controller/ajax/buscar_clientes.php",
        minLength: 2,
        select: function (event, ui) {
            event.preventDefault();
            $('#hidden_id_destinatario').val(ui.item.id);
            $('#hidden_ruc_destinatario').val(ui.item.ruc);
            var tipo_cliente = ui.item.tipo;
            if (tipo_cliente === "1") {
                $("#select_cliente").val(1).change();
                $('#hidden_id_cliente').val(ui.item.id);
            }
            $('#input_destinatario').val(ui.item.razon_social);
            //  cargar_direccion();
            obtenerDireccionesDestinatario();
            $('#btn_finalizar_pedido').prop("disabled", false);
            $('#input_destino').focus();
        }
    });

    $("#input_producto").autocomplete({
        source: "ajax_post/buscar_productos.php",
        minLength: 2,
        select: function (event, ui) {
            event.preventDefault();
            $('#input_cactual').val(ui.item.cantidad);
            $('#input_precio').val(ui.item.precio);
            $('#hidden_costo').val(ui.item.costo);
            $('#input_lote').val(ui.item.lote);
            $('#input_vencimiento').val(ui.item.vcto);
            $('#hidden_id_producto').val(ui.item.id);
            $('#hidden_descripcion_producto').val(ui.item.nombre);
            $('#input_producto').val(ui.item.nombre);
            $('#btn_add_producto').prop("disabled", false);
            $('#btn_finalizar_pedido').prop("disabled", false);
            $('#input_precio').prop("readonly", false);
            $('#input_cventa').prop("readonly", false);
            $('#input_cventa').focus();
        }
    });
});

function obtenerDireccionesDestinatario() {
    var id_cliente = $("#hidden_id_destinatario").val();
    var select_direcciones = $("#select_direccion");
    var parametros = {
        "id_cliente": id_cliente
    };
    $.ajax({
        data: parametros,
        url: '../controller/ajax/ver_direcciones_cliente.php',
        type: 'post',
        beforeSend: function () {
            select_direcciones.prop("disabled", true)
        },
        success: function (response) {
            var json_response = JSON.parse(response);
            select_direcciones.find('option').remove();
            $(json_response).each(function (i, v) { // indice, valor
                select_direcciones.append('<option value="' + v.id_direccion + '">' + v.direccion + '</option>');
            });
            select_direcciones.prop('disabled', false);
        }
    });
}

function obtenerMisDocumentosSunat() {
    var id_tido = $("#select_documento").val();
    var parametros = {
        "id_tido": id_tido
    };
    $.ajax({
        data: parametros,
        url: '../controller/ajax/datos_documento.php',
        type: 'post',
        beforeSend: function () {
            $("#inputNumero").val("");
            $("#inputSerie").val("");
        },
        success: function (response) {
            var json_response = JSON.parse(response);
            $("#inputNumero").val(json_response.numero);
            $("#inputSerie").val(json_response.serie);
        }
    });
}

function agregarDetalle() {
    if ($("#inputDescripcion").val() !== "" && $("#inputCantidad").val() !== "" && $("#inputCantidad").val() !== "0") {
        var parametros = {
            "action": 1,
            "descripcion": $("#inputDescripcion").val(),
            "cantidad": $("#inputCantidad").val(),
            "costo": $("#input_unitario").val(),
            "peso": $("#inputPesoItem").val(),
            "id_unidad": $("#select_und_medida").val(),
            "nombre_unidad": $("#select_und_medida option:selected").text(),
        };
        enviarDetalle(parametros);
        limpiarBusqueda();
    }
}

function eliminarItem(iditem) {
    var parametros = {
        "action": 2,
        "id_item": iditem
    };
    enviarDetalle(parametros);
}

function enviarDetalle(parametros) {
    $.ajax({
        data: parametros,
        url: '../controller/ajax_session/envio_detalle.php',
        type: 'post',
        beforeSend: function () {
            $('#tabla-detalle tbody').html("");
        },
        success: function (response) {
            $('#tabla-detalle tbody').append(response);
        }
    });
}

function limpiarBusqueda() {
    $("#inputDescripcion").val("");
    $("#input_unitario").val("");
    $("#inputPesoItem").val("");
    $("#select_und_medida").val(1);
    $("#inputCantidad").val("");
}

function guardarEnvio() {
    if ($("#hidden_id_remitente").val() !== "0" && $("#hidden_id_destinatario").val() !== "0") {
        var parametros = {
            "inputFecha": $("#inputFecha").val(),
            "select_documento": $("#select_documento").val(),
            "inputSerie": $("#inputSerie").val(),
            "inputNumero": $("#inputNumero").val(),
            "hidden_id_remitente": $("#hidden_id_remitente").val(),
            "hidden_id_destinatario": $("#hidden_id_destinatario").val(),
            "select_direccion": $("#select_direccion").val(),
            "selectDestino": $("#selectDestino").val(),
            "inputTotal": $("#inputTotal").val()
        };
        $.ajax({
            data: parametros,
            url: '../controller/reg_envio.php',
            type: 'post',
            beforeSend: function () {
                //nothing here
            },
            success: function (response) {
                var json;
                try {
                    json = JSON.parse(response);
                    //  console.log('Sintaxis Correcta');
                    Swal.fire({
                        title: "Envio Registrado",
                        text: "El documento se registro con exito!",
                        type: "success",
                        showCancelButton: !0,
                        confirmButtonColor: "#348cd4",
                        cancelButtonColor: "#6c757d",
                        confirmButtonText: "Si, ver Ticket!"
                    }).then(function (t) {
                        //t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success")
                        window.location.href = 'ver_preimpresion_envio.php?id_envio=' + json.valor_id;
                    })
                } catch (error) {
                    if (error instanceof SyntaxError) {
                        let mensaje = error.message;
                        //   console.log('ERROR EN LA SINTAXIS:', mensaje);
                        swal.fire({
                            title: "Error al Registrar",
                            text: "Retorna Error " + response,
                            type: "error",
                            showCancelButton: false,
                            //cancelButtonClass: 'btn-secondary ',
                            confirmButtonColor: "#DD6B55",
                            //confirmButtonText: "Ver Ticket",
                            cancelButtonText: "No, cancel plx!",
                        });
                    } else {
                        throw error; // si es otro error, que lo siga lanzando
                    }
                }
            }
        });
    } else {
        swal.fire({
            title: "Error al Registrar",
            text: "Faltan Ingresar Datos",
            type: "error",
            showCancelButton: false,
            //cancelButtonClass: 'btn-secondary ',
            confirmButtonColor: "#DD6B55",
            //confirmButtonText: "Ver Ticket",
            cancelButtonText: "No, cancel plx!",
        });
    }
}