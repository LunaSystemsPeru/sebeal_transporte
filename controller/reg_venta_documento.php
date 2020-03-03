<?php

session_start();

require "../models/VentaSunat.php";
require "../models/VentasDetalle.php";

$venta = new VentaSunat();
$detalleVenta = new VentasDetalle();
$listaItems=$_POST['item_ventas'];
$montoTotal=0;

$venta->generarCodigo();
$venta->setIdDocumento(filter_input(INPUT_POST, 'select_documento'));
$venta->setFecha(filter_input(INPUT_POST, 'fecha'));
$venta->setNumero(filter_input(INPUT_POST, 'numero'));
$venta->setSerie(filter_input(INPUT_POST, 'serie'));
$venta->setMonto(filter_input(INPUT_POST, 'total'));
$venta->setIdClientes(filter_input(INPUT_POST, 'id_cliente'));
$venta->setIdEnvio('null');
$venta->setEstado(0);

if($venta->insertar()){
    $detalleVenta->setIdVenta($venta->getIdVenta());
    if (isset($_POST['item_ventas'])){
        foreach ($listaItems as $item){
            $detalleVenta->generarCodigo();

            $datos=explode("{}",$item);

            $detalleVenta->setCantidad($datos[0]);
            $detalleVenta->setPrecio($datos[1]);
            $detalleVenta->setDescripcion($datos[2]);
            $detalleVenta->insertar();
        }
    }

    if (isset($_FILES['file_input'])){
        $fileName = $_FILES["file_input"]["name"]; // The file name
        $fileTmpLoc = $_FILES["file_input"]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES["file_input"]["type"]; // The type of file it is
        $fileSize = $_FILES["file_input"]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES["file_input"]["error"]; // 0 for false... and 1 for true
        if ($fileName!= null){
            if (!$fileTmpLoc) { // if file not chosen
                echo "ERROR: Please browse for a file before clicking the upload button.";
                exit();
            }
            $info = new SplFileInfo($fileName);
            $extencion= $info->getExtension();
            $nombretemporal=$venta->getIdVenta().".".$extencion;
            if(!move_uploaded_file($fileTmpLoc, "../facturasSunat/" . $nombretemporal ) ){
                echo "move_uploaded_file function failed";
            }
        }
    }
    header('Location: ../contents/ver_ventas.php');
}







