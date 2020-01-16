<?php
require '../../models/ClienteDireccion.php';

$c_direccion = new ClienteDireccion();

$c_direccion->setIdCliente(filter_input(INPUT_POST, 'id_cliente'));
$a_resultado = $c_direccion->verFilasJson();

echo $a_resultado;
