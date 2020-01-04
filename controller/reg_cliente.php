<?php
require  "../models/Cliente.php";
$cliente=new Cliente();

$cliente->setRazonSocial();
$cliente->setDocumento();
$cliente->setTelefono();
$cliente->setCostoCaja();
$cliente->setCostoKilo();
$cliente->setDireccionFactura();
$cliente->setTipoCliente();
$cliente->setUltimoEnvio();
