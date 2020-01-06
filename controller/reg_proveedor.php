<?php

require  "../models/Proveedor.php";

$proveedor=new Proveedor();
$proveedor->generarCodigo();
$proveedor->setDocumento(filter_input(INPUT_POST, 'documento'));
$proveedor->setDireccion(filter_input(INPUT_POST, 'direccion'));
$proveedor->setNombreComercial(filter_input(INPUT_POST, 'nombre_comercial'));
$proveedor->setRazonSocial(filter_input(INPUT_POST, 'razon_social'));
$proveedor->setTipo(filter_input(INPUT_POST, 'tipo'));
$proveedor->insertar();
header('Location: ../contents/ver_proveedores.php');
