<?php
session_start();

require '../../models/Cliente.php';
$c_cliente = new Cliente();

$searchTerm = filter_input(INPUT_GET, 'term');

$resultados = $c_cliente->buscarClientesJson($searchTerm);

$array_resultado = array();
foreach ($resultados as $value) {
    $fila = array();
    $fila['value'] = $value['documento'] . " | " . $value['razon_social'];
    $fila['id'] = $value['id_clientes'];
    $fila['ruc'] = $value['documento'];
    $fila['razon_social'] = $value['razon_social'];
    $fila['tipo'] = $value['tipo_cliente'];
    array_push($array_resultado, $fila);
}
echo json_encode($array_resultado);
