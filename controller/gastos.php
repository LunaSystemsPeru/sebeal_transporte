<?php
session_start();

require '../models/Gasto.php';
require '../models/BancoMovimiento.php';

$c_gasto = new Gasto();
$c_movimiento = new BancoMovimiento();

$c_movimiento->setIdBanco(filter_input(INPUT_POST, 'selectBanco'));
$c_movimiento->setFecha(filter_input(INPUT_POST, 'inputFecha'));
$c_movimiento->setDescripcion(strtoupper(filter_input(INPUT_POST, 'inputDescripcion')));
$c_movimiento->setIngresa(0);
$c_movimiento->setSale(filter_input(INPUT_POST, 'inputMonto'));
$c_movimiento->setIdClasificacion(filter_input(INPUT_POST, 'selectClasificacion'));
$c_movimiento->setIdUsuario($_SESSION['id_usuario']);

$c_movimiento->generarCodigo();
$c_movimiento->insertar();

$c_gasto->setIdMovimiento($c_movimiento->getIdMovimiento());
$c_gasto->insertar();

header("Location: ../contents/ver_gastos.php");