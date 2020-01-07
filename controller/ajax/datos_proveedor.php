<?php

require "../../models/Proveedor.php";
$proveedor=new Proveedor();

$proveedor->setDocumento(filter_input(INPUT_POST, 'documento'));
$proveedor->obtenerDatos_documento();

echo '{
        "id_proveedor" : ' . $proveedor->getIdProveedor() . ',
        "razon_social" : "' . $proveedor->getRazonSocial() . '",
        "direccion": "' . $proveedor->getDireccion() . '"
    }';