<?php
session_start();
require '../models/Banco.php';

$c_banco = new Banco();

$c_banco->setNombre(filter_input(INPUT_POST, 'inputNombre'));
$c_banco->setNrocuenta(filter_input(INPUT_POST, 'inputCuenta'));
$c_banco->setMonto(filter_input(INPUT_POST, 'inputMonto'));
$c_banco->setIdBanco(filter_input(INPUT_POST, 'inputCodigo'));

if ($c_banco->getIdBanco() == 0) {
    $c_banco->generarCodigo();
    $c_banco->insertar();
}

header("Location: ../contents/ver_mis_bancos.php");