<?php
require  "../models/Cliente.php";
require  "../models/ClienteDireccion.php";

$c_cliente=new Cliente();
$c_direccion = new ClienteDireccion();

$c_cliente->setRazonSocial(filter_input(INPUT_POST, 'inputRuc'));
$c_cliente->setDocumento(filter_input(INPUT_POST, 'inputRazonSocial'));
$c_cliente->setTelefono(filter_input(INPUT_POST, 'inputTelefono'));
$c_cliente->setCostoCaja(0);
$c_cliente->setCostoKilo(0);
$c_cliente->setDireccionFactura(filter_input(INPUT_POST, 'inputDireccion'));
$c_cliente->setTipoCliente(filter_input(INPUT_POST, 'selectTipo'));
$c_cliente->generarCodigo();

$c_cliente->insertar();

$c_direccion->setIdCliente($c_cliente->getIdCliente());
$c_direccion->setIdDestino(filter_input(INPUT_POST, 'selectDestino'));
$c_direccion->setDireccion(filter_input(INPUT_POST, 'inputEntrega'));
$c_direccion->generarCodigo();

$c_direccion->insertar();

echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
