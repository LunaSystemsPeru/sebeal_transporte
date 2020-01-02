<?php
session_start();
$_SESSION['id_empresa'] = 1;

require '../models/Banco.php';

$c_banco = new Banco();

$c_banco->setIdEmpresa($_SESSION['id_empresa']);
$c_banco->setEfectivo(filter_input(INPUT_POST, 'inputEfectivo'));
$c_banco->setVirtual(filter_input(INPUT_POST, 'inputVirtual'));
$c_banco->setNombre(filter_input(INPUT_POST, 'inputNombre'));
$c_banco->setIdBanco(filter_input(INPUT_POST, 'inputCodigo'));

if ($c_banco->getIdBanco() == 0) {
    $c_banco->generarCodigo();
    $c_banco->insertar();
}

header("Location: ../contents/ver_mis_bancos.php");