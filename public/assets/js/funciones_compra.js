$(document).ready(function () {
    //autocomplete
    $("#documento").autocomplete({
        source: "../controller/ajax/buscar_proveedor.php",
        minLength: 2,
        select: function (event, ui) {
            event.preventDefault();
            $('#id_proveedor').val(ui.item.id);
            $('#documento').val(ui.item.ruc);
            $('#razon_social').val(ui.item.razon_social);
            $('#direccion').val(ui.item.direccion);
            $('#select_documento').prop("disabled", false);
            $('#select_documento').focus();
        }
    });

});