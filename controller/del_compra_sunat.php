<?php
require "../models/CompraSunat.php";

$compra=new CompraSunat();

$compra->setIdCompras(filter_input(INPUT_GET, 'id'));


$compra->eliminar();

header('Location: ../contents/ver_compras.php');