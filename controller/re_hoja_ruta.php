<?php
session_start();
require '../models/HojaRuta.php';
require '../tools/cl_varios.php';
require '../models/HojaRutaEnvio.php';
require '../models/Vehiculo.php';

$hojaRuta=new HojaRuta();
$c_varios=new cl_varios();
$hojaRutaEnvio=new HojaRutaEnvio();
$vehiculo=new Vehiculo();

$hojaRuta->generarCodigo();

$idProveedor= filter_input(INPUT_POST, 'hidden_id_proveedor');

$hojaRuta->setFecha($c_varios->fecha_web_mysql(filter_input(INPUT_POST, 'input_fecha')));
$hojaRuta->setIdOrigen($_SESSION['id_origen']);
$hojaRuta->setIdDestino(filter_input(INPUT_POST, 'select_ciudad'));
$hojaRuta->setIdChofer(filter_input(INPUT_POST, 'select_chofer'));
$hojaRuta->setIdVehiculo(filter_input(INPUT_POST, 'select_n_placa'));
$hojaRuta->setIdUsuario($_SESSION['id_usuario']);
$hojaRuta->setIdContrato(1);

$vehiculo->setIdVehiculo($hojaRuta->getIdVehiculo());
$vehiculo->obtenerDatos();


$hojaRuta->setCapacidadContratada($vehiculo->getCapacidad());
$hojaRutaEnvio->setIdHojaRuta($hojaRuta->getIdHojaRuta());

//$hojaRuta->setCapacidadContratada(filter_input(INPUT_POST, ''));

if ($hojaRuta->inserta()){

    $numero=$_POST["checkbox"];
    $count = count($numero);
    /*echo $count;*/
    for ($i = 0; $i < $count; $i++) {
        $hojaRutaEnvio->setIdenvio($numero[$i]);
        $hojaRutaEnvio->insertar();
    }
    echo '{ "resul":true}';
}

