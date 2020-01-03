<?php
require '../models/Usuario.php';

$c_usuario = new Usuario();

$c_usuario->setIdUsuario(filter_input(INPUT_POST, 'inputCodigo'));
$c_usuario->setDocumento(filter_input(INPUT_POST, 'inputDni'));
$c_usuario->setDatos(filter_input(INPUT_POST, 'inputNombre'));
$c_usuario->setDireccion(filter_input(INPUT_POST, 'inputDireccion'));
$c_usuario->setFechaNacimiento(filter_input(INPUT_POST, 'inputFechaNacimiento'));
$c_usuario->setEmail(filter_input(INPUT_POST, 'inputEmail'));
$c_usuario->setTelefono(filter_input(INPUT_POST, 'inputTelefono'));
$c_usuario->setFechaIngreso(date("Y-m-d"));
$c_usuario->setIdAgencia(filter_input(INPUT_POST, 'selectAgencia'));
$c_usuario->setUsuario(filter_input(INPUT_POST, 'inputUsername'));
$c_usuario->setPassword(filter_input(INPUT_POST, 'inputPassword'));

if ($c_usuario->getIdUsuario() == 0) {
    $c_usuario->generarCodigo();
    $c_usuario->insertar();
}
