<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Lima');
session_start();

require '../models/HojaRuta.php';
require '../models/HojaRutaEnvio.php';
require '../models/Proveedor.php';
require '../models/Vehiculo.php';
require '../models/Chofer.php';
require '../models/Destino.php';
require '../models/EnvioDetalle.php';
require '../tools/cl_varios.php';

require('../tools/fpdf/PDF_MC_Table.php');
define('FPDF_FONTPATH', '../tools/fpdf/font/');

$id_hoja = filter_input(INPUT_GET, 'id');

$hoja = new HojaRuta();
$hoja->setIdHojaRuta($id_hoja);
$hoja->obtenerDatos();

$vehiculo = new Vehiculo();
$vehiculo->setIdVehiculo($hoja->getIdVehiculo());
$vehiculo->obtenerDatos();

$chofer = new Chofer();
$chofer->setIdChofer($hoja->getIdChofer());
$chofer->obtenerDatos();

$transporte = new Proveedor();
$transporte->setIdProveedor($vehiculo->getIdProveedor());
$transporte->obtenerDatos();

$origen = new Destino();
$origen->setId($hoja->getIdOrigen());
$origen->obtenerDatos();

$destino = new Destino();
$destino->setId($hoja->getIdDestino());
$destino->obtenerDatos();

$varios = new cl_varios();

$rutaEnvio = new HojaRutaEnvio();
$rutaEnvio->setIdHojaRuta($id_hoja);
$a_envios = $rutaEnvio->ver_filas();

$envioDetalle = new EnvioDetalle();

$pdf = new PDF_MC_Table('P', 'mm', "A4");
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(true, 10);
$pdf->AddPage();

$altura_linea = 3.5;
$r = 50;
$g = 50;
$b = 50;

$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(00, 00, 0);
$pdf->Cell(190, 7, "MANIFIESTO DE CARGA", 0, 1, 'C');

$pdf->Image('../public/assets/images/logo_sebeal.png', 10, 20, 20, 20);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Rect(140, 18, 60, 20);
$pdf->SetTextColor(00, 00, 0);
$pdf->SetY(20);
$pdf->SetX(140);
$pdf->Cell(60, 5, "RUC: " . "20600916115", 0, 1, 'C');
$pdf->SetX(140);
$pdf->Cell(60, 5, date("Y") . "-" . $varios->zerofill($id_hoja, 4), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(140);
$pdf->SetTextColor(00, 00, 0);
$pdf->Cell(60, 5, "Fecha Salida: " . $varios->fecha_mysql_web($hoja->getFecha()), 0, 1, 'C');

$pdf->SetY(20);
$pdf->SetX(40);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(110, 4, "SEBEAL S.A.C.", 0, 1, 'L');
$pdf->SetX(40);
$pdf->SetFont('Arial', '', 9);
$pdf->MultiCell(75, 4, "NRO. 346 COTABAMBA (CERCADO LIMA) LIMA - LIMA - LIMA ", 0, "L");
$pdf->SetX(40);
$pdf->Cell(75, 4, "Telefono: " . "946197750", 0, 1, 'L');

$pdf->Ln();

$pdf->SetY(40);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->Cell(190, 6, "DATOS DE TRANSPORTE CONTRATADO", 0, 1, 'C', 1);
$pdf->Ln(1);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(30, 4, "TRANSPORTISTA: ", 0, 0, 'L');
$pdf->Cell(145, 4, $transporte->getRazonSocial() . " | " . $transporte->getDocumento(), 0, 1, 'L');

$pdf->Cell(30, 4, "VEHICULO: ", 0, 0, 'L');
$pdf->Cell(145, 4, "Placa: " . $vehiculo->getPlaca() . " - Marca: " . $vehiculo->getMarca() . " - Mod: " . $vehiculo->getModelo() . " - Capac.: " . $vehiculo->getCapacidad(), 0, 1, 'L');

$pdf->Cell(30, 4, "CHOFER: ", 0, 0, 'L');
$pdf->Cell(145, 4, $chofer->getBrevete() . " | " . $chofer->getDatos() . " | " . $chofer->getCategoria(), 0, 1, 'L');

$pdf->Cell(30, 4, "RUTA: ", 0, 0, 'L');
$pdf->Cell(145, 4, $origen->getNombre() . " A " . $destino->getNombre(), 0, 1, 'L');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->Cell(190, 6, "DETALLE DEL MANIFESTO", 0, 1, 'C', 1);
$pdf->Ln(1);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(0, 0, 0);  // Establece el color del texto (en este caso es blanco)
$pdf->Cell(20, $altura_linea, "Documento", 1, 0, "C");
$pdf->Cell(40, $altura_linea, "Destinatario", 1, 0, "C");
$pdf->Cell(50, $altura_linea, "Direccion", 1, 0, "C");
$pdf->Cell(40, $altura_linea, "Descripcion.", 1, 0, "C");
$pdf->Cell(20, $altura_linea, "Cant..", 1, 0, "C");
$pdf->Cell(20, $altura_linea, "Peso", 1, 1, "C");

$pdf->SetFont('Arial', '', 8);
foreach ($a_envios as $filas) {
    $cantidad = 0;
    $peso = 0;
    $descripcion = "";
    $envioDetalle->setIdEnvio($filas['idenvio']);
    foreach ($envioDetalle->verFilas() as $fila) {
        $cantidad += $fila['cantidad'];
        $peso += $fila['peso'];
        $descripcion .= utf8_decode($fila['unidad'] . " DE " . $fila['descripcion'] . " - ");
    }

    $columna0 = $filas['abreviatura'] . " - " . $filas['serie'] . " - " . $filas['numero'];
    $columna1 = $filas['razon_social'] . " - GR # " . $filas['referencia'];
    $columna2 = $filas['direccion'];
    $columna3 = $descripcion;
    $columna4 = $cantidad;
    $columna5 = $peso;

    $pdf->SetWidths(array(20,40,50,40,20,20));
    $pdf->SetAligns(array('C','L', 'L', 'L', 'C', 'C'));
    $fila_array = array(
        $columna0,
        $columna1,
        $columna2,
        $columna3,
        $columna4,
        $columna5
    );
    $pdf->Row($fila_array);
}
$pdf->Output();