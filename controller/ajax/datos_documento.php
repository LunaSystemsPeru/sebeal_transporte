<?php
require  "../../models/DocumentosEmpresa.php";

$documentosEmpresa=new DocumentosEmpresa();

$documentosEmpresa->setIdDocumento(filter_input(INPUT_POST, 'id'));
echo $documentosEmpresa->obtenerDatos_json();