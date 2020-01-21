<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Lima');
session_start();

require '../models/Envio.php';
require '../models/EnvioDetalle.php';
require '../models/Cliente.php';
require '../models/Destino.php';

require('../tools/fpdf/fpdf.php');
define('FPDF_FONTPATH', '../tools/fpdf/font/');

$envio = new Envio();

$envio->setIdEnvio(filter_input(INPUT_GET, 'id_envio'));
$envio->obtenerDatos();

$remitente = new Cliente();
$remitente->setIdCliente($envio->getIdRemitente());
$remitente->obtenerDatos();

$destinatario = new Cliente();
$destinatario->setIdCliente($envio->getIdDestinatario());
$destinatario->obtenerDatos();

$detalle = new EnvioDetalle();
$detalle->setIdEnvio($envio->getIdEnvio());

$origen = new Destino();
$origen->setId($envio->getIdAorigen());
$origen->obtenerDatos();

$destino = new Destino();
$destino->setId($envio->getIdAdestino());
$destino->obtenerDatos();

$pdf = new FPDF('P', 'mm', array(80, 300));
$pdf->SetMargins(8,8,8);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$altura_linea = 3.5;

$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(00, 00, 0);
$pdf->Cell(64, $altura_linea, "SEBEAL S.A.C.", 0, 1, 'L');
$pdf->Cell(64, $altura_linea, "RUC #: 20600916115", 0, 1, 'L');
$pdf->MultiCell(64, $altura_linea, "NRO. 346 COTABAMBA (CERCADO LIMA) LIMA - LIMA - LIMA ", 0, "J", 0);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(64, $altura_linea, "NOTA RECEPCION # " . $envio->getIdEnvio(), 0, 1, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(64, $altura_linea, "FECHA RECEPCION: " . $envio->getFechaRecepcion(), 0, 1, 'L');
$pdf->Ln();

$pdf->MultiCell(64, $altura_linea, "REMITENTE: " . $remitente->getRazonSocial(), 0, "J", 0);
$pdf->Cell(64, $altura_linea, "DOC REMITENTE: GR | " . $envio->getReferencia(), 0, 1, 'L');
$pdf->MultiCell(64, $altura_linea, "DESTINATARIO: " . $destinatario->getRazonSocial(), 0, "J", 0);
$pdf->Ln();

$pdf->Cell(10, $altura_linea, "CANT", 0, 0, 'L');
$pdf->Cell(10, $altura_linea, "U.M.", 0, 0, 'L');
$pdf->Cell(34, $altura_linea, "DESCRIPCION", 0, 1, 'L');

$total_cantidad = 0;
foreach ($detalle->verFilas() as $fila) {
    $total_cantidad += $fila['cantidad'];
    $pdf->MultiCell(64, $altura_linea, $fila['cantidad'] . " - " . $fila['unidad'] . " - " . utf8_decode($fila['descripcion']), 0, "L", 0);
}

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(64, $altura_linea, "TOTAL CANTIDAD: " . $total_cantidad, 0, 1, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(64, $altura_linea, "Usuario: adelacruze", 0, 1, 'L');
$pdf->Cell(64, $altura_linea, "RUTA: " . $origen->getNombre() . " A " . $destino->getNombre(), 0, 1, 'L');

$pdf->Ln();
$pdf->Cell(64, $altura_linea, "_", 0, 1, 'L');
$pdf->Output();