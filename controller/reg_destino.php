<?php
require '../models/Destino.php';

$destino = new Destino();
$destino->setNombre(filter_input(INPUT_POST, inputNombre));
$destino->setDireccion(filter_input(INPUT_POST, inputDireccion));
$destino->setUbigeo(filter_input(INPUT_POST, inputUbigeo));

$destino->generarCodigo();
$destino->insertar();
header("Location: ../contents/ver_destinos.php");