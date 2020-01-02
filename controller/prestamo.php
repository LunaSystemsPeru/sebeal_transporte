<?php
session_start();

$id_empresa = $_SESSION['id_empresa'];

require '../models/Prestamo.php';
require '../models/MovimientoDinero.php';
require '../models/MovimientoPrestamo.php';

$c_prestamo = new Prestamo();
$c_movdinero = new MovimientoDinero();
$c_movprestamo = new MovimientoPrestamo();

$c_prestamo->setIdBanco(filter_input(INPUT_POST, 'selectBanco'));
$c_prestamo->setFecha(filter_input(INPUT_POST, 'inputFecha'));
$c_prestamo->setObservaciones(filter_input(INPUT_POST, 'inputCliente'));

$c_movdinero->setFecha($c_prestamo->getFecha());
$c_movdinero->setDescripcion("INICIO DE PRESTAMO PARA " . $c_prestamo->getObservaciones());
$c_movdinero->setEgresa(filter_input(INPUT_POST, 'inputEfectivo'));
$c_movdinero->setIngresa(0);
$c_movdinero->setIdBanco($c_prestamo->getIdBanco());

//insertar prestamo vacio
$c_prestamo->generarCodigo();
$c_prestamo->insertar();

//insertar primer movimiento retiro de dinero
$c_movdinero->generarCodigo();
$c_movdinero->insertar();

//insertar tabla que amarra prestamo y movimiento
$c_movprestamo->setIdMovimiento($c_movdinero->getIdMovimiento());
$c_movprestamo->setIdPrestamo($c_prestamo->getIdPrestamo());
$c_movprestamo->insertar();

header("Location: ../ver_prestamos.php");