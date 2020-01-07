<?php
require '../models/PagoFrecuente.php';

$pagoFrecuente = new PagoFrecuente();
$pagoFrecuente->setFechaRecordatorio(filter_input(INPUT_POST, inputFecha_rec));
$pagoFrecuente->setMonto(filter_input(INPUT_POST, inputMonto));
$pagoFrecuente->setPagado(filter_input(INPUT_POST, inputPagado));
$pagoFrecuente->setIdProveedor(filter_input(INPUT_POST, inputId_Prov));
$pagoFrecuente->setServicio(filter_input(INPUT_POST, inputServicio));
$pagoFrecuente->setFrecuencia(filter_input(INPUT_POST, inputFrecuencia));
$pagoFrecuente->setIdClasificacion(filter_input(INPUT_POST,select_clasificacion));

$pagoFrecuente->generarCodigo();
$pagoFrecuente->insertar();
$pagoFrecuente->verFilas();
header("Location: ../contents/ver_pagos_frecuentes.php");