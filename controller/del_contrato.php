<?php
require  '../models/Contrato.php';
$contrato=new Contrato();

$contrato->setId(filter_input(INPUT_POST, 'inputIcontrato'));
$contrato->eliminar();
echo '{ "resul":true}';

