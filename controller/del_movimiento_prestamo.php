<?php
session_start();

$id_empresa = $_SESSION['id_empresa'];

require '../models/MovimientoDinero.php';
require '../models/MovimientoPrestamo.php';

$c_movdinero = new MovimientoDinero();
$c_movprestamo = new MovimientoPrestamo();

$c_movprestamo->setIdMovimiento(filter_input(INPUT_GET, 'id_movimiento'));
$c_movprestamo->setIdPrestamo(filter_input(INPUT_GET, 'id_prestamo'));

$c_movprestamo->eliminar();

$c_movdinero->setIdMovimiento($c_movprestamo->getIdMovimiento());
$c_movdinero->eliminar();

header("Location: ../contents/ver_movimientos_prestamo.php?id_prestamo=" . $c_movprestamo->getIdPrestamo());