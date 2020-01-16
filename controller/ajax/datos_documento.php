<?php
session_start();
require '../../models/DocumentoEmpresa.php';
$c_tido = new DocumentoEmpresa();

$c_tido->setIdDestino(1);
$c_tido->setIdDocumento(filter_input(INPUT_POST, 'id_tido'));
echo json_encode($c_tido->obtenerDatos());