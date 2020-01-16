<?php

require  '../models/ContratoPago.php';
require  '../models/BancoMovimiento.php';
$contratoPago=new ContratoPago();
$bancoMovimiento=new BancoMovimiento();
$contratoPago->setIdContrato(filter_input(INPUT_POST, 'id_contrato'));
$contratoPago->setIdMovimiento(filter_input(INPUT_POST, 'id_movimiento'));
$bancoMovimiento->setIdMovimiento(filter_input(INPUT_POST, 'id_movimiento'));


$contratoPago->eliminar();
$bancoMovimiento->eliminar();
echo '{ "resul":true}';