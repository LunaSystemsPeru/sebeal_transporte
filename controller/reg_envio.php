<?php
session_start();
require '../models/Envio.php';
require '../models/EnvioDetalle.php';

$c_envio = new Envio();
$c_detalle = new EnvioDetalle();

$c_envio->setFechaRecepcion(filter_input(INPUT_POST, 'inputFecha'));
$c_envio->setIdDocumento(filter_input(INPUT_POST, 'select_documento'));
$c_envio->setSerie(filter_input(INPUT_POST, 'inputSerie'));
$c_envio->setNumero(filter_input(INPUT_POST, 'inputNumero'));
$c_envio->setIdDestinatario(filter_input(INPUT_POST, 'hidden_id_destinatario'));
$c_envio->setIdRemitente(filter_input(INPUT_POST, 'hidden_id_remitente'));
$c_envio->setIdDireccion(filter_input(INPUT_POST, 'select_direccion'));
$c_envio->setIdAorigen($_SESSION['id_origen']);
$c_envio->setIdAdestino(filter_input(INPUT_POST, 'selectDestino'));
$c_envio->setIdUsuario($_SESSION['id_usuario']);
$c_envio->setTotalPactado(filter_input(INPUT_POST, 'inputTotal'));
$c_envio->setReferencia(filter_input(INPUT_POST, 'inputReferencia'));

$c_envio->generarCodigo();
$registrado = $c_envio->insertar();

$c_detalle->setIdEnvio($c_envio->getIdEnvio());
foreach ($_SESSION['enviodetalle'] as $fila) {
    $c_detalle->setDescripcion($fila['descripcion']);
    $c_detalle->setCosto($fila['costo']);
    $c_detalle->setCantidad($fila['cantidad']);
    $c_detalle->setPeso($fila['peso']);
    $c_detalle->setIdUnidad($fila['id_unidad']);
    $c_detalle->generarCodigo();
    $c_detalle->insertar();
}

$array_resultado = array();

if ($registrado) {
    $array_resultado = array("exito" => true, "valor_id" => $c_envio->getIdEnvio());
}
echo json_encode($array_resultado);