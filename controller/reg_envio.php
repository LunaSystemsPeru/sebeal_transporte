<?php
session_start();
require '../models/Envio.php';

$c_envio = new Envio();

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

$c_envio->generarCodigo();

$array_resultado = array();

$registrado = $c_envio->insertar();

if ($registrado) {
    $array_resultado = array("exito" => true, "valor_id" => $c_envio->getIdEnvio());
}
echo json_encode($array_resultado);