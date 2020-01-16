<?php
require  '../models/Prestamo.php';
$prestamo=new Prestamo();

$prestamo->setIdPrestamo(filter_input(INPUT_POST, 'inputIdPrestamo'));
$prestamo->eliminar();
echo '{ "resul":true}';
