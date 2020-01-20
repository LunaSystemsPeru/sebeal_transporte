<?php
require '../models/Chofer.php';

$chofer = new Chofer();
$chofer->generarCodigo();
$chofer->setBrevete(filter_input(INPUT_POST, 'brevete'));
$chofer->setDatos(filter_input(INPUT_POST,'datos'));
$chofer->setVencimiento(filter_input(INPUT_POST,'vencimiento'));
$chofer->setCategoria(filter_input(INPUT_POST,'categoria'));
$chofer->insertar();

header('location: ../contents/ver_chofer.php');
