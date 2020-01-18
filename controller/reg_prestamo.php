<?php
require  '../models/BancoMovimiento.php';
require  '../models/Proveedor.php';
require  '../models/Prestamo.php';

$bancoMovimiento=new BancoMovimiento();
$proveedor=new Proveedor();
$prestamo=new Prestamo();

$proveedor->setIdProveedor(filter_input(INPUT_POST, 'id_proveedor'));
$proveedor->obtenerDatos();

$prestamo->generarCodigo();
$prestamo->setIdProveedor($proveedor->getIdProveedor());
$prestamo->setFecha(filter_input(INPUT_POST, 'inputFecha'));
$prestamo->setEstado(1);
$prestamo->setFechaPago(filter_input(INPUT_POST, 'inputFechaPago'));
$prestamo->setMonto(filter_input(INPUT_POST, 'inputMonto'));
$prestamo->setMontoCuota(filter_input(INPUT_POST, 'inputMontoCuotas'));
$prestamo->setTotalPagado(0);
$prestamo->setTotCuotas(filter_input(INPUT_POST, 'inputCuotas'));



$bancoMovimiento->generarCodigo();
$bancoMovimiento->setIdClasificacion(4);
$bancoMovimiento->setFecha($prestamo->getFecha());
$bancoMovimiento->setSale(0);
$bancoMovimiento->setIngresa($prestamo->getMonto());
$bancoMovimiento->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
$bancoMovimiento->setDescripcion("Prestamo de " . $proveedor->getRazonSocial() );
$bancoMovimiento->setIdUsuario($_SESSION['id_usuario']);

$prestamo->setIdMovimiento($bancoMovimiento->getIdMovimiento());

if ($bancoMovimiento->insertar()){
    if ($prestamo->insertar()){
        header("Location: ../contents/ver_mis_prestamos.php");
    }
}