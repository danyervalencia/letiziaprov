<?php
//ob_start(); ini_set("memory_limit", "512M");
require_once "../session_validate.php";
if ( $result["success"] == false ) { echo json_encode($result);  exit; }

require_once "../resources/functions.php";
require_once "../resources/pdf.php";
require_once "../db/logistics_cotizaciones.php";
require_once "../db/logistics_cotizaciones_det.php";

$ob = new Logistics_Cotizaciones();
$ob->setCoti_key($_REQUEST["xxCoti_key"] == "" ? "__" : $_REQUEST["xxCoti_key"]);
$ob->setPers_key($_PERS_KEY);
$ob->setType_record("printer");
$ob->setOrder_by($_REQUEST["xxOrder_by"]);
$_ah = $ob->registros();

$ob = new Logistics_Cotizaciones_Det();
$ob->setCoti_key($_REQUEST["xxCoti_key"] == "" ? "__" : $_REQUEST["xxCoti_key"]);
$ob->setType_record("printer");
$ob->setOrder_by("");
$_ad = $ob->registros();

if ( $_REQUEST["xxFormat"] == "E" ) {
    require_once "../classes/PHPExcel.php";
    $xls = new PHPExcel();
    $xls->getDefaultStyle()->getFont()->setSize(8);
    $xls->getActiveSheet()->getDefaultRowDimension()->setRowHeight(14);
    $_formatNume2 = "#,#0.00;[Red]-#,#0.00";
}

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
$pdf = new PDF("P", "mm", "A4");
$pdf->SetFillColor(192, 192, 192);
$pdf->SetTextColor(0, 0, 0);
$pdf->setFile_header("pdf_logistics_cotizaciones_printer_head.php");
$pdf->ini_x = 14;   $pdf->eje_x = $pdf->ini_x;
$pdf->ini_y = 20;   $pdf->eje_y = $pdf->ini_y;
$pdf->h_row = 5;    $pdf->max = 260;  $_nro = 0;

$pdf->fnNuevaPagina(2500);
$pdf->SetFont("helvetica", "", 6);
foreach ( $_ad as $row ) {
    $pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x ); $_nro++;
	//$pdf->Cell(6, $pdf->h_row, $_nro, "LTR", 0, "R");
	$pdf->Cell(21, $pdf->h_row, $row["bs_codigo"], 1, 0, "L");
	$pdf->Cell(85, $pdf->h_row, $row["bs_nombre"], 1, 0, "L");
	$pdf->Cell(16, $pdf->h_row, substr($row["unimed_nombre"], 0, 10), 1, 0, "L");
	$pdf->Cell(19, $pdf->h_row, substr($row["cotidet_detalle"],0,15), 1, 0, "R");
	$pdf->Cell(14, $pdf->h_row, fnNume01($row["cotidet_cantid"],3), 1, 0, "R");
	$pdf->Cell(18, $pdf->h_row, fnNume01($row["cotidet_preuni"],6), 1, 0, "R");
	$pdf->Cell(17, $pdf->h_row, fnNume01($row["cotidet_pretot"],2), 1, 0, "R");

	//$_nro_lineas = $pdf->getNumLines($row["apr_observ"], 90);
	$pdf->eje_y += $pdf->h_row;
}

$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(40, 6, "Recepción de cotizaciones hasta el: ", 0, 0, "L");
if ( $_ah[0]["req_web_dias"]*1 <= 0 ) {
    $pdf->Cell(53, 6, ".....................................................................................................................", 0, 0, "L");
} else {
    $fecha = strtotime( $ar[0]["fecha_vigencia"] );
    $lc = fnLetraFecha( date("w", $fecha ), date("d", $fecha), date("n", $fecha)-1, date("Y", $fecha) );
    $pdf->Cell(46, 6, substr($lc,5), 0, 0, "L");
}
$pdf->Cell(80, 6, "Total Importe de Cotización ", 0, 0, "R");
$pdf->Cell(17, 5, fnNume01($_ah[0]["coti_monto"], 2), 1, 0, "R", 1);

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(28, 4, "  + Condiciones de Venta", 0, 0, "L");
$pdf->Cell(3, 4, ":", 0, 0, "L");
$pdf->SetFont("helvetica", "", 6);
$pdf->Cell(30, 4, "esta cotización incluye el I.G.V. (18%)", 0, 0, "L");

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(28, 3, "  + Validez de la Cotización", 0, 0, "L");
$pdf->Cell(3, 3, ":", 0, 0, "L");
$pdf->SetFont("helvetica", "", 6);
$pdf->Cell(18, 3, $_ah[0]["coti_vigencia"]."  Días Calendario", 0, 0, "L");

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(28, 3, "  + Plazo de Entrega", 0, 0, "L");
$pdf->Cell(3, 3, ":", 0, 0, "L");
$pdf->SetFont("helvetica", "", 6);
$pdf->Cell(18, 3, $_ah[0]["coti_plazo"]."  Días Hábiles", 0, 0, "L");

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(28, 3, "  + Tiempo de Garantía", 0, 0, "L");
$pdf->Cell(3, 3, ":", 0, 0, "L");
$pdf->SetFont("helvetica", "", 6);
$pdf->Cell(18, 3, $_ah[0]["coti_garantia"]*1>0?$_ah[0]["coti_garantia"]."  Mes".($_ah[0]["coti_garantia"]==1?"":"es"):"NO REGISTRA", 0, 0, "L");

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(28, 3, "  + Forma de Pago", 0, 0, "L");
$pdf->Cell(3, 3, ":", 0, 0, "L");
$pdf->SetFont("helvetica", "", 6);
$pdf->Cell(18, 3, $_ah[0]["tippag_nombre"], 0, 0, "L");

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(28, 3, "  + Lugar de Entrega", 0, 0, "L");
$pdf->Cell(3, 3, ":", 0, 0, "L");
$pdf->SetFont("helvetica", "", 6);
$pdf->Cell(18, 3, $_ah[0]["lugentr_nombre"], 0, 0, "L");

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(28, 3, "  + Otros", 0, 0, "L");
$pdf->Cell(3, 3, ":", 0, 0, "L");
$pdf->Cell(18, 3, fnRepeat("_",133), 0, 0, "L");


/*$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(18, 3, "  + Esta cotización contempla lo estipulado en " . ($_ah[0]["tipped_id"] == "5006" ? "las ESPECIFICACIONES TECNICAS" : "los TERMINOS DE REFERENCIA") . " del requerimiento.", 0, 0, "L");

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(18, 3, "  + Esta cotización debe estar contenida en SOBRE CERRADO indicando el número de requerimiento y Razón Social del proveedor, la cual será entregada en la oficina de LOGISTICA ", 0, 0, "L");

$pdf->eje_y += $pdf->h_row;
$pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 6);
$pdf->Cell(18, 3, "     en horario de oficina (08:00 a.m. - 03:00 p.m.) hasta la fecha de VIGENCIA, la misma no debe tener enmendaduras ni borrones,  caso contrario no sera tomada en cuenta.", 0, 0, "L");*/

ob_end_clean(); $pdf->output("cotizacion.pdf","I");