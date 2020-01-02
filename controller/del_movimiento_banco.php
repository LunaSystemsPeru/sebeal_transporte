<?php
session_start();

require '../models/MovimientoBanco.php';

$c_movimiento = new MovimientoBanco();

$c_movimiento->setIdMovimiento(filter_input(INPUT_GET, 'id_movimiento'));
$c_movimiento->obtenerDatos();

if ($c_movimiento->eliminar()) {
    header("Location: ../contents/ver_movimientos_banco.php?fecha=" . $c_movimiento->getFecha() . "&id_banco=" . $c_movimiento->getIdBanco());
}