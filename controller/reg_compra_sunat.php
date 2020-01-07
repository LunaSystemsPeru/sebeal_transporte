<?php

require "../models/CompraSunat.php";

$compra=new CompraSunat();

$compra->generarCodigo();
$compra->setIdDocumento(filter_input(INPUT_POST, 'select_documento'));
$compra->setIdProveedor(filter_input(INPUT_POST, 'id_proveedor'));
$compra->setFecha(filter_input(INPUT_POST, 'fecha'));
$compra->setTotal(filter_input(INPUT_POST, 'total'));
$compra->setNumero(filter_input(INPUT_POST, 'numero'));
$compra->setSerie(filter_input(INPUT_POST, 'serie'));

$compra->insertar();

header('Location: ../contents/ver_compras.php');



