<?php

require '../models/Vehiculo.php';

$vehiculo = new Vehiculo();
$vehiculo->generarCodigo();
$vehiculo->setPlaca(filter_input(INPUT_POST,'placa'));
$vehiculo->setMarca(filter_input(INPUT_POST,'marca'));
$vehiculo->setModelo(filter_input(INPUT_POST,'modelo'));
$vehiculo->setMtc(filter_input(INPUT_POST,'mtc'));
$vehiculo->setCapacidad(filter_input(INPUT_POST,'capacidad'));
$vehiculo->insertar();

header('location: /contents/ver_vehiculo.php');