<?php
require '../models/PagoFrecuente.php';

$pagoFrecuente = new PagoFrecuente();
$pagoFrecuente->setFechaRecordatorio(filter_input(INPUT_POST, 'inputFecha'));
$pagoFrecuente->setMonto(filter_input(INPUT_POST, 'inputMonto'));
$pagoFrecuente->setPagado(filter_input(INPUT_POST, 'inputPagado'));
$pagoFrecuente->setIdProveedor(filter_input(INPUT_POST, 'inputProveedor'));
$pagoFrecuente->setServicio(filter_input(INPUT_POST, 'inputServicio'));
$pagoFrecuente->setFrecuencia(filter_input(INPUT_POST, 'inputFrecuencia'));
$pagoFrecuente->setEstado(filter_input(INPUT_POST,'inputEstado'));
$pagoFrecuente->setIdClasificacion(filter_input(INPUT_POST,'select_clasificacion'));

$pagoFrecuente->generarCodigo();
$pagoFrecuente->insertar();
$pagoFrecuente->verFilas();
header("Location: ../contents/ver_pagos_frecuentes.php");