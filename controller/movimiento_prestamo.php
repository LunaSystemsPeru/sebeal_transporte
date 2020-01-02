<?php
session_start();

$id_empresa = $_SESSION['id_empresa'];

require '../models/MovimientoDinero.php';
require '../models/MovimientoPrestamo.php';

$c_movdinero = new MovimientoDinero();
$c_movprestamo = new MovimientoPrestamo();

$ingresa = 0;
$egresa = 0;
$tipo = filter_input(INPUT_POST, 'selectMovimiento');
$descripcion = "";
$id_prestamo = filter_input(INPUT_POST, 'inputIdPrestamo');

if ($tipo == 2) {
    $ingresa = filter_input(INPUT_POST, 'inputMonto');
    $egresa = 0;
    $descripcion = "PAGO DE DEUDA DE " . filter_input(INPUT_POST, 'inputCliente');
} else {
    $ingresa = 0;
    $egresa = filter_input(INPUT_POST, 'inputMonto');
    $descripcion = "AUMENTO DE DEUDA DE " . filter_input(INPUT_POST, 'inputCliente');
}

$c_movdinero->setFecha(filter_input(INPUT_POST, 'inputFecha'));
$c_movdinero->setDescripcion($descripcion);
$c_movdinero->setEgresa($egresa);
$c_movdinero->setIngresa($ingresa);
$c_movdinero->setIdBanco(filter_input(INPUT_POST, 'inputidBanco'));

//insertar primer movimiento retiro de dinero
$c_movdinero->generarCodigo();
$c_movdinero->insertar();

//insertar tabla que amarra prestamo y movimiento
$c_movprestamo->setIdMovimiento($c_movdinero->getIdMovimiento());
$c_movprestamo->setIdPrestamo($id_prestamo);
$c_movprestamo->insertar();

header("Location: ../contents/ver_movimientos_prestamo.php?id_prestamo=" . $id_prestamo);