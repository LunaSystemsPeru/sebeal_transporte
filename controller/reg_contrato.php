<?php
require  '../models/Contrato.php';
$contrato=new Contrato();

$contrato->generarCodigo();
$contrato->setIdProveedor(filter_input(INPUT_POST, 'id_proveedor'));
$contrato->setMontoPactado(filter_input(INPUT_POST, 'monto'));
$contrato->setDuracion(filter_input(INPUT_POST, 'duracion'));
$contrato->setEstado(1);
$contrato->setFechaFin(filter_input(INPUT_POST, 'fecha-final'));
$contrato->setFechaInicio(filter_input(INPUT_POST, 'fecha-inicio'));
$contrato->setIdClasificacion(filter_input(INPUT_POST, 'select_clasificacion'));
$contrato->setMontoFacturado(0);
$contrato->setMontoPagado(0);
$contrato->setServicio(filter_input(INPUT_POST, 'servicio'));

if ($contrato->insertar()){
    header('Location: ../contents/ver_contratos.php');
}