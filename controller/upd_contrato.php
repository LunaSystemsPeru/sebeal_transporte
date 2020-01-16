<?php
require  '../models/Contrato.php';
$contrato=new Contrato();
$contrato->setId(filter_input(INPUT_POST, 'idContrato'));
$contrato->setMontoPactado(filter_input(INPUT_POST, 'monto'));
$contrato->setFechaInicio(filter_input(INPUT_POST, 'fecha'));
$contrato->setDuracion(filter_input(INPUT_POST, 'duracion'));

$contrato->actualizarContrato();
echo '{ "resul":true}';
