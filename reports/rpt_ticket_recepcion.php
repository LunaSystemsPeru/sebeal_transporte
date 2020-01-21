<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Lima');
session_start();

require('../tools/fpdf/fpdf.php');
define('FPDF_FONTPATH', '../tools/fpdf/font/');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetMargins(10,8,10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();