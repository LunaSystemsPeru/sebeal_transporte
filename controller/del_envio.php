<?php
require '../models/EnvioDetalle.php';
require '../models/Envio.php';

$detalle = new EnvioDetalle();
$envio = new Envio();

$detalle->setIdEnvio(filter_input(INPUT_GET, 'id'));
$detalle->eliminar();

$envio->setIdEnvio($detalle->getIdEnvio());
$envio->eliminar();

header("Location: ../contents/ver_envios.php");