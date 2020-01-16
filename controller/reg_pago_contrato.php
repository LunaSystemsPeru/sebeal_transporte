<?php
require  '../models/BancoMovimiento.php';
require  '../models/ContratoPago.php';
require  '../models/Contrato.php';
$bancoMovimiento=new BancoMovimiento();
$contratoPago=new ContratoPago();
$contrato=new Contrato();

$idContrato=filter_input(INPUT_POST, 'id_contrato');
$contrato->setId($idContrato);
$contrato->obtener_datos();

$bancoMovimiento->generarCodigo();
$bancoMovimiento->setIdClasificacion($contrato->getIdClasificacion());
$bancoMovimiento->setFecha(filter_input(INPUT_POST, 'fecha'));
$bancoMovimiento->setSale(filter_input(INPUT_POST, 'monto'));
$bancoMovimiento->setIngresa(0);
$bancoMovimiento->setIdBanco(filter_input(INPUT_POST, 'id_banco'));
$bancoMovimiento->setDescripcion("Pago de " . $contrato->getServicio() );
$bancoMovimiento->setIdUsuario($_SESSION['id_usuario']);
$contratoPago->setIdContrato($idContrato);
$contratoPago->setIdMovimiento($bancoMovimiento->getIdMovimiento());
if ($bancoMovimiento->insertar()){
    if ($contratoPago->insertar())
    header("Location: ../contents/ver_detalle_contrato.php?contrato=" . $idContrato);
}