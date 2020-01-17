<?php
require '../../models/Proveedor.php';
$proveedor=new Proveedor();
$searchTerm = filter_input(INPUT_GET, 'term');
$resultados = $proveedor->buscarProveedorJson($searchTerm);
$array_resultado = array();
foreach ($resultados as $value) {
    $fila = array();
    $fila['value'] = $value['documento'] . " | " . $value['razon_social'];
    $fila['id'] = $value['id_proveedor'];
    $fila['ruc'] = $value['documento'];
    $fila['razon_social'] = $value['razon_social'];
    $fila['direccion'] = $value['direccion'];
    $fila['tipo'] = $value['tipo'];
    array_push($array_resultado, $fila);
}
echo json_encode($array_resultado);