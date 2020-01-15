<?php
require  '../models/BancoMovimiento.php';
$bancoMovimiento=new BancoMovimiento();

$idContrato=filter_input(INPUT_POST, '');

$bancoMovimiento->setIdClasificacion(filter_input(INPUT_POST, ''));
$bancoMovimiento->setFecha(filter_input(INPUT_POST, ''));
$bancoMovimiento->setSale(filter_input(INPUT_POST, ''));
$bancoMovimiento->setIngresa(0);
$bancoMovimiento->setIdBanco(filter_input(INPUT_POST, ''));
$bancoMovimiento->setDescripcion(filter_input(INPUT_POST, ''));
$bancoMovimiento->setIdUsuario(filter_input(INPUT_POST, ''));
if ($bancoMovimiento->insertar()){
    header("Location: ../contents/ver_detaller_contrato.php?contrato=" . $idContrato);
}