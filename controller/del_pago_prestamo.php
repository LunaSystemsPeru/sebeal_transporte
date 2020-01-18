<?php

require  '../models/PrestamoPago.php';
require '../models/BancoMovimiento.php';
$prestamoPago=new PrestamoPago();
$bancoMovimiento = new BancoMovimiento();
$prestamoPago->setIdPrestamo(filter_input(INPUT_POST, 'id_prestamo'));
$prestamoPago->setIdMovimiento(filter_input(INPUT_POST, 'id_movimiento'));
$bancoMovimiento->setIdMovimiento(filter_input(INPUT_POST, 'id_movimiento'));


$prestamoPago->eliminar();
$bancoMovimiento->eliminar();
echo '{ "resul":true}';