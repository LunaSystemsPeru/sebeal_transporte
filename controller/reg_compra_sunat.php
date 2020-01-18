<?php
session_start();

require "../models/CompraSunat.php";
require "../models/CompraPago.php";
require "../models/BancoMovimiento.php";
require "../models/Proveedor.php";

$compra=new CompraSunat();
$c_pago = new CompraPago();
$c_movimiento = new BancoMovimiento();
$c_proveedor= new Proveedor();

$compra->generarCodigo();
$compra->setIdDocumento(filter_input(INPUT_POST, 'select_documento'));
$compra->setIdProveedor(filter_input(INPUT_POST, 'id_proveedor'));
$compra->setFecha(filter_input(INPUT_POST, 'fecha'));
$compra->setTotal(filter_input(INPUT_POST, 'total'));
$compra->setNumero(filter_input(INPUT_POST, 'numero'));
$compra->setSerie(filter_input(INPUT_POST, 'serie'));
$compra->setIdClasificacion(filter_input(INPUT_POST, 'select_clasificacion'));

$compra->insertar();

$c_proveedor->setIdProveedor($compra->getIdProveedor());
$c_proveedor->obtenerDatos();

$c_movimiento->setDescripcion("PAGO A " . $c_proveedor->getRazonSocial() ." x  FACT: " . $compra->getSerie() + "-" + $compra->getNumero() );
$c_movimiento->setSale($compra->getTotal());
$c_movimiento->setIdClasificacion($compra->getIdClasificacion());
$c_movimiento->setFecha($compra->getFecha());
$c_movimiento->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
$c_movimiento->setIngresa(0);
$c_movimiento->setIdUsuario($_SESSION['id_usuario']);
$c_movimiento->generarCodigo();

$c_movimiento->insertar();

$c_pago->setIdMovimiento($c_movimiento->getIdMovimiento());
$c_pago->setIdCompra($compra->getIdCompras());
$c_pago->insertar();

header('Location: ../contents/ver_compras.php');



