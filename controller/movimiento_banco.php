<?php
session_start();

require '../models/MovimientoBanco.php';
require '../models/MovimientoTipo.php';

$c_movimiento = new MovimientoBanco();
$c_tipo = new MovimientoTipo();

$c_movimiento->setFecha(filter_input(INPUT_POST, 'inputFecha'));
$c_movimiento->setIdBanco(filter_input(INPUT_POST, 'inputCodigo'));
$c_movimiento->setIdTipo(filter_input(INPUT_POST, 'selectMovimiento'));

$monto = filter_input(INPUT_POST, 'inputMonto');

$c_tipo->setIdTipo($c_movimiento->getIdTipo());
$c_tipo->obtenerDatos();

if ($c_tipo->getTipo() == 1) {
    $c_movimiento->setIngresa($monto);
    $c_movimiento->setEgresa(0);
}
if ($c_tipo->getTipo() == 2) {
    $c_movimiento->setIngresa(0);
    $c_movimiento->setEgresa($monto);
}
$c_movimiento->generarCodigo();
if ($c_movimiento->insertar()) {
    header("Location: ../contents/ver_movimientos_banco.php?fecha=" . $c_movimiento->getFecha() . "&id_banco=" . $c_movimiento->getIdBanco());
}