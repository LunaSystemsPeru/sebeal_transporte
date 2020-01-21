<?php
require '../models/Chofer.php';

$chofer = new Chofer();
$chofer->generarCodigo();
$chofer->setBrevete(filter_input(INPUT_POST, 'brevete'));
$chofer->setVencimiento(filter_input(INPUT_POST,'vencimiento'));
$chofer->setDatos(filter_input(INPUT_POST,'datos'));
$chofer->setIdProveedor(filter_input(INPUT_POST,'proveedor'));
$chofer->setCategoria(filter_input(INPUT_POST,'categoria'));
$chofer->insertar();

header('location: ../contents/ver_chofer.php');
