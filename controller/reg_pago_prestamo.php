<?php
require  '../models/BancoMovimiento.php';
require  '../models/Prestamo.php';
require  '../models/PrestamoPago.php';
require  '../models/Proveedor.php';

$bancoMovimiento=new BancoMovimiento();
$prestamo=new Prestamo();
$prestamoPago=new PrestamoPago();
$proveedor=new Proveedor();

$idPrestamo=filter_input(INPUT_POST, 'id_prestamo');

$prestamo->setIdPrestamo($idPrestamo);
$prestamo->obtener_datos();

$proveedor->setIdProveedor($prestamo->getIdProveedor());
$proveedor->obtenerDatos();


$bancoMovimiento->generarCodigo();
$bancoMovimiento->setIdClasificacion(4);
$bancoMovimiento->setFecha(filter_input(INPUT_POST, 'fecha'));
$bancoMovimiento->setSale(filter_input(INPUT_POST, 'monto'));
$bancoMovimiento->setIngresa(0);
$bancoMovimiento->setIdBanco(filter_input(INPUT_POST, 'id_banco'));
$bancoMovimiento->setDescripcion("Pago de prestamo de " . $proveedor->getRazonSocial() );
$bancoMovimiento->setIdUsuario($_SESSION['id_usuario']);

$prestamoPago->setIdPrestamo($prestamo->getIdPrestamo());
$prestamoPago->setIdMovimiento($bancoMovimiento->getIdMovimiento());
$prestamoPago->siguienteCuota();

if ($bancoMovimiento->insertar()){
    if ($prestamoPago->insertar()){
        header("Location: ../contents/ver_detalle_prestamo.php?prestamo=" . $idPrestamo);
    }
}



