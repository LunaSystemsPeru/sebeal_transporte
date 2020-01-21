<?php
session_start();
require '../../models/DocumentoEmpresa.php';
$c_tido = new DocumentoEmpresa();

$c_tido->setIdDestino($_SESSION['id_origen']);
$c_tido->setIdDocumento(filter_input(INPUT_POST, 'id_tido'));
echo json_encode($c_tido->obtenerDatos());