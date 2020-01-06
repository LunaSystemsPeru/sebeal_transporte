<?php

require '../../models/ValidarDocumento.php';
$validar = new ValidarDocumento();

$numero = filter_input(INPUT_POST, 'numero');
$validar->setDocumento(filter_input(INPUT_POST, 'numero'));
print_r($validar->obtener_datos_documentos());
