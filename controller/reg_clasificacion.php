<?php
require '../models/Clasificacion.php';

$c_clasificacion = new Clasificacion();

$c_clasificacion->setNombre(filter_input(INPUT_POST, 'input_nombre'));

$c_clasificacion->generarCodigo();

$c_clasificacion->insertar();

header("Location: ../contents/ver_clasificacion_movimiento.php");