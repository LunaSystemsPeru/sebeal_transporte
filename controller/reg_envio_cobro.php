<?php
session_start();
require '../models/BancoMovimiento.php';
require '../models/EnvioCobro.php';

$movimiento = new BancoMovimiento();
$cobro = new EnvioCobro();

$movimiento->setIdBanco(filter_input(INPUT_POST, 'id_banco'));
$movimiento->setFecha(filter_input(INPUT_POST, 'fecha'));
$movimiento->setDescripcion("COBRO DE " . filter_input(INPUT_POST, 'detalle_envio'));
$movimiento->setIngresa(filter_input(INPUT_POST, 'monto'));
$movimiento->setSale(0);
$movimiento->setIdClasificacion(1);
$movimiento->setIdUsuario($_SESSION['id_usuario']);
$movimiento->generarCodigo();

$movimiento->insertar();

$cobro->setIdEnvio(filter_input(INPUT_POST, 'id_envio'));
$cobro->setIdMovimiento($movimiento->getIdMovimiento());
$cobro->insertar();

header("Location: ../contents/ver_detalle_cobranza.php?envio=" . $cobro->getIdEnvio());