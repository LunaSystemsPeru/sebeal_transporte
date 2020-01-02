function eliminarMovimiento(id_movimiento) {
    Swal.fire({
        title:"Estas seguro de eliminar?",
        text: "No se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
    }).then((result) => {
        if (result.value) {
            window.location.href = '../controller/del_movimiento_banco.php?id_movimiento=' + id_movimiento;
        }
    })
}

function eliminarMovimientoPrestamo(id_movimiento, id_prestamo) {
    Swal.fire({
        title:"Estas seguro de eliminar?",
        text: "No se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, eliminar!",
    }).then((result) => {
        if (result.value) {
            window.location.href = '../controller/del_movimiento_prestamo.php?id_movimiento=' + id_movimiento+'&id_prestamo=' + id_prestamo;
        }
    })
}
