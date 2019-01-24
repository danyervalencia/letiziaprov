<?php
session_start();
require_once '../resources/functions.php';
require_once '../resources/pdf.php';
require_once '../db/operations_almacenes.php';

$ob = new Operations_Almacenes();
$ob->setAlma_key( $_REQUEST['xxAlma_key'] );
$ob->setFechaini( $_REQUEST['xxFechaini'] );
$ob->setFechafin( $_REQUEST['xxFechafin'] );
$ob->setBsg_id( $_REQUEST['xxBsg_id'] == '' ? '0' : $_REQUEST['xxBsg_id'] );
$ob->setType_report( $_REQUEST['xxType_report'] );
$arr = $ob->reporte_stock();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf = new PDF("L", "mm", "A4");
$pdf->SetFillColor(192, 192, 192);
$pdf->SetTextColor(0, 0, 0);
//$pdf->setFile_header("siace_pdf_ingresos_report_head.php");
$pdf->setFile_header('pdf_operations_almacenes_report_stock_consolidado_head.php');
//$pdf->setPrinter_footer("siace_ingesos_printer");

$pdf->ini_x = 14;   $pdf->eje_x = $pdf->ini_x;
$pdf->ini_y = 16;   $pdf->eje_y = $pdf->ini_y;
$pdf->h_row = 4;    $pdf->max = 190;
$nro = 1;

$pdf->SetFont("helvetica", "", 6);
foreach ( $arr as $row ) {
    if ( $pdf->eje_y == $pdf->ini_y ) { $pdf->fnNuevaPagina(2500); }
    $pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
    
    $pdf->Cell(8, 4, fnZerosLeft($nro,4), "LR", 0, 'C');
    $pdf->Cell(20, 4, $row["bsalma_code"] == "" ? $row["bs_codigo"] : $row["bsalma_code"], "LR", 0, 'L');
    $pdf->Cell(120, 4, $row["bs_nombre"], "LR", 0, 'L');
    $pdf->Cell(12, 4, $row["unimed_abrev"], "LR", 0, 'L');
    $pdf->Cell(15, 4, substr($row["marc_nombre"], 0, 6), "LR", 0, 'L');
    $pdf->Cell(15, 4, substr($row["mod_nombre"], 0, 6), "LR", 0, 'L');
    $pdf->Cell(18, 4, $row["nand_codigo"], "LR", 0, 'C');
    $pdf->Cell(16, 4, fnNume01($row["cantid_ing_ant"]*1 - $row["cantid_sal_ant"]*1,3), "LR", 0, 'R');
    $pdf->Cell(16, 4, fnNume01($row["cantid_ing"],3)." ", "LR", 0, 'R');
    $pdf->Cell(16, 4, fnNume01($row["cantid_sal"],3)." ", "LR", 0, 'R');
    $pdf->Cell(16, 4, fnNume01($row["cantid_ing_ant"]*1 + $row["cantid_ing"]*1 - ($row["cantid_sal_ant"]*1+$row["cantid_sal"]*1),3)." ", "LR", 0, 'R');
    
    $lnPretot += ($row['ingdet_pretotpretot']*1);
    $pdf->eje_y += $pdf->h_row;
    $nro += 1;
}

$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(271,  4, "", "T", 0, 'L');
$pdf->Output();
?>