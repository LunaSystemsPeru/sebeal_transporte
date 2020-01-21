<?php
require '../../models/Chofer.php';
require '../../models/Vehiculo.php';

$chofer=new Chofer();
$vehiculo=new Vehiculo();

$idProveedor= filter_input(INPUT_GET, 'id_proveedor');
$chofer->setIdProveedor($idProveedor);
$vehiculo->setIdProveedor($idProveedor);
$listaChofer=$chofer->verFilas_proveedor();
$listaVeiculo=$vehiculo->verFilas_proveedor();

$listaCho=[];
$listaVe=[];

foreach ($listaChofer as $item) {
    $listaCho[]=$item;
}
foreach ($listaVeiculo as $item) {
    $listaVe[]=$item;
}
$arr=array('chofer'=>$listaCho,'veiculo'=>$listaVe);
echo json_encode($arr);



