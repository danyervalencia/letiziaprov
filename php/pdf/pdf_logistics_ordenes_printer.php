<?php
ob_start(); session_start(); $result['success'] = false;
require_once '../session_validate.php';
if ( $result['success'] == false ) { echo json_encode($result);  exit; }
//require_once '../public_usuarios_accesos_menus_opciones_validate_option.php';
//if ( $result['success'] == false ) { echo 'Usuario no tiene permiso para imprimir Orden';  exit; }

require_once '../resources/functions.php';
require_once '../resources/pdf.php';
require_once '../db/logistics_ordenes.php';
require_once '../db/logistics_ordenes_det.php';
require_once '../db/logistics_ordenes_tareas_fftred.php';
require_once '../db/logistics_ordenes_procedencias.php';
require_once '../db/public_personas_accesos.php';

$ob = new Logistics_Ordenes();
$ob->setOrden_key($_REQUEST['xxOrden_key'] == '' ? '__' : $_REQUEST['xxOrden_key']);
$ob->setType_record('printer');
$ob->setOrder_by($_REQUEST['xxOrder_by']);
$_ah = $ob->registros();

$ob = new Logistics_Ordenes_Det();
$ob->setOrden_key($_REQUEST['xxOrden_key'] == '' ? '__' : $_REQUEST['xxOrden_key']);
$ob->setType_record('printer');
$ob->setOrder_by($_REQUEST['xxOrder_by']);
$_ad = $ob->registros();

$ob = new Logistics_Ordenes_Tareas_Fftred();
$ob->setOrden_key($_REQUEST['xxOrden_key'] == '' ? '__' : $_REQUEST['xxOrden_key']);
$ob->setType_record('printer');
$_atf = $ob->registros();

$ob = new Public_Personas_Accesos();
$ob->setPers_id( $_ah[0]["pers_id"] );
$ob->setType_record("printer_orden");
$_apa = $ob->registros(); $_ordennotif_fecha = "";
if ( $_apa[0]["persacce_id"]*1 > 0 ) {
	if ( fnDTOS($_ah[0]["orden_fecha"])*1 >= fnDTOS($_apa[0]["persacce_fecha"])*1 ) {
		$_ordennotif_fecha = fnDateAddDays($_ah[0]["orden_fecha"], 1, "SQL");
	}
}

if ( $_ah[0]['tablex']*1 > 0 ) {
	$ob = new Logistics_Ordenes_Procedencias();
	$ob->setOrden_key($_REQUEST['xxOrden_key'] == '' ? '__' : $_REQUEST['xxOrden_key']);
	$ob->setType_record('printer');
	$_ap = $ob->registros();
	if ( $_ah[0]['tablex'] == '5020' ) {
		foreach ( $_ap as $row ) {
			/*if ( $row['tablex'] == '5010' ) {
				require_once '../db/logistics_cotizaciones.php';
				$ob = new Logistics_Cotizaciones(); $ob->setCoti_key($row['tablex_key']); $ob->setType_record('printer');
				$_ac = $ob->registros();
				$_plazo_entrega = $_ac[0]['coti_plazo'] . ($_ac[0]['coti_plazo']*1 > 1 ? ' Días Calendario' : ' Día Calendario');
				$_lugar_entrega = $_ac[0]['lugentr_nombre'];
			} */
			if ( $row['tablex'] == '5020' ) {
				require_once '../db/logistics_buena_pro.php';
				$ob = new Logistics_Buena_Pro(); $ob->setBp_key($row['tablex_key']); $ob->setType_record('printer');
				$_abp = $ob->registros();
				$_certif_nro = $_abp[0]['certif_nro'];
			} 
		}
	}
}

if ( $_REQUEST['xxFormat'] == 'E' ) {
	require_once '../classes/PHPExcel.php';
	$xls = new PHPExcel();
	$xls->getDefaultStyle()->getFont()->setSize(8);
	$xls->getActiveSheet()->getDefaultRowDimension()->setRowHeight(14);
	$_formatNume2 = '#,#0.00;[Red]-#,#0.00';
}

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
$pdf = new PDF('P', 'mm', 'A4');
$pdf->SetFillColor(192, 192, 192);
$pdf->SetTextColor(0, 0, 0);
$pdf->setFile_header('pdf_logistics_ordenes_printer_head.php');
$pdf->setPrinter_footer('logistics_ordenes_printer');
$pdf->h_row = 4.5;  $pdf->max = 235;  $_nro = 0;

$pdf->fnNuevaPagina(2500);  $pdf->SetFont('helvetica', '', 6);
foreach ( $_ad as $row ) {
	$pdf->eje_y += ($pdf->h_row + ( $_nro == '0' ? 1 : 0)); $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x ); $_nro++;
	$_b = ( $row['ordendet_detalle'] == '' && $row['cotidet_marca'] == '' ? '1' : 'LTR' );
	$pdf->Cell(6, $pdf->h_row, $_nro, $_b, 0, 'R');
	$pdf->Cell(21, $pdf->h_row, $row['bs_codigo'], $_b, 0, 'L');
	$pdf->Cell(97, $pdf->h_row, $row['bs_nombre'], $_b, 0, 'L');
	$pdf->Cell(15, $pdf->h_row, $row['unimed_nombre'], $_b, 0, 'L');
	$pdf->Cell(16, $pdf->h_row, ($row["tipbsf_id"] == "1057" ? "(P)" : "").fnNume01($row['ordendet_cantid'],3).' ', $_b, 0, 'R');
	$pdf->Cell(18, $pdf->h_row, fnNume01($row['ordendet_preuni'],6).' ', $_b, 0, 'R');
	$pdf->Cell(17, $pdf->h_row, fnNume01($row['ordendet_pretot'],2).' ', $_b, 0, 'R');
	if ( $row['cotidet_marca'] != '' ){
		$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
		$_b = ( $row['ordendet_detalle'] == '' ? 'LBR' : 'TR' );
		$pdf->Cell(6, $pdf->h_row, "", $_b, 0, 'R');
		$pdf->Cell(21, $pdf->h_row, "", $_b, 0, 'L');
		$pdf->Cell(97, $pdf->h_row, utf8_encode("Marca:  ".$row['cotidet_marca'].($row['cotidet_modelo']==""?"":"     Modelo:  ".$row['cotidet_modelo'])), $_b, 0, 'L');
		$pdf->Cell(15, $pdf->h_row, "", $_b, 0, 'L');
		$pdf->Cell(16, $pdf->h_row, '', $_b, 0, 'R');
		$pdf->Cell(18, $pdf->h_row, '', $_b, 0, 'R');
		$pdf->Cell(17, $pdf->h_row, '', $_b, 0, 'R');		
	}
	//$pdf->Cell(17, $pdf->h_row, $row['espedet_codigo'], $_b, 0, 'L');

	if ( $row['ordendet_detalle'] !== '' ) {
		$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
		$_nro_lineas = $pdf->getNumLines($row['ordendet_detalle'], 109);
		$_b = ($_nro_lineas*1 > 1 ? 'LR' : 'LRB');
		$pdf->Cell(6,  $pdf->h_row, '', $_b, 0, 'R');
		$pdf->Cell(21, $pdf->h_row, '', $_b, 0, 'C');
		$pdf->SetX(153);
		$pdf->Cell(16, $pdf->h_row, '', $_b, 0, 'C');
		$pdf->Cell(18, $pdf->h_row, '', $_b, 0, 'C');
		$pdf->Cell(17, $pdf->h_row, '', $_b, 0, 'C');
		$pdf->SetX(41);
		$pdf->MultiCell(97, $pdf->h_row, $row['ordendet_detalle']."\n", 'LRB', 'J', 0, 1, '', '', false); //, 0, 1, '', '', false, 1, false, true, 0, 'T', false);
		for ( $_j = 1; $_j <= ($_nro_lineas*1-1); $_j++ ) {
			$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
			$_b = ($_j == ($_nro_lineas*1-1) ? 'LRB' : 'LR');
			$pdf->Cell(6,  $pdf->h_row, '', $_b, 0, 'R');
			$pdf->Cell(21, $pdf->h_row, '', $_b, 0, 'C');
			$pdf->SetX(153);
			$pdf->Cell(16, $pdf->h_row, '', $_b, 0, 'C');
			$pdf->Cell(18, $pdf->h_row, '', $_b, 0, 'C');
			$pdf->Cell(17, $pdf->h_row, '', $_b, 0, 'C');
		}
	}
}

$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Cell(155, $pdf->h_row, '', 'T', 0, 'R');
$pdf->Cell(18, $pdf->h_row, 'Subtotal', 'TR', 0, 'L');
$pdf->Cell(17, $pdf->h_row, fnNume01($_ah[0]['orden_monto'],2).' ', 1, 0, 'R', 1);
$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->Cell(155, $pdf->h_row, '', '', 0, 'R');
$pdf->Cell(18, $pdf->h_row, $_ah[0]['orden_percep']*1 > 0 ? 'Percepción' : '', 'R', 0, 'L');
$pdf->Cell(17, $pdf->h_row, $_ah[0]['orden_percep']*1 > 0 ? fnNume01($_ah[0]['orden_percep'],2).' ' : '', 1, 0, 'R', 1);

$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(139, $pdf->h_row, ' Referencias Presupuestales', 'B', 0, 'L');
$pdf->Cell(16, $pdf->h_row, '', '', 0, 'R');
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Cell(18, $pdf->h_row, 'Total Orden', 'R', 0, 'L');
$pdf->Cell(17, $pdf->h_row, fnNume01($_ah[0]['orden_monto']*1 + $_ah[0]['orden_percep']*1,2).' ', 1, 0, 'R', 1);


$pdf->SetFont('helvetica', '', 8);
if ( $_ah[0]['tarea_nombre'] == '' )  {

} else {
	$pdf->eje_y += 5;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->Cell(10, $pdf->h_row, ' '.$_ah[0]['secfunc_code'], '', 0, 'L');
	$pdf->Cell(15, $pdf->h_row, $_ah[0]['proysnip_code'] == '' ? $_ah[0]['actproy_code'] : $_ah[0]['proysnip_code'], '', 0, 'L');
	$pdf->Cell(150, $pdf->h_row, $_ah[0]['secfunc_nombre'], '', 0, 'L');
}

foreach ( $_atf as $row ) {
	$pdf->eje_y += $pdf->h_row + ( $_nro == '0' ? 2 : 0);  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x ); $_nro++;
	$pdf->Cell(16, $pdf->h_row, ' '.$row['tarea_codigo'], '', 0, 'L');
	$pdf->Cell(22, $pdf->h_row, $row['espedet_codigo'], '', 0, 'L');
	$pdf->Cell(100, $pdf->h_row, $row['espedet_nombre'], '', 0, 'L');
	$_monto = $row['ordentareafte_monto']* 1 + $row['ordentareafte_percep']*1;
	if ( $row['ordentareafte_percep']*1 > 0 ) {
		$pdf->Cell(17, $pdf->h_row, fnNume01($row['ordentareafte_monto'],2).' ', '', 0, 'R');
		$pdf->Cell(18, $pdf->h_row, fnNume01($row['ordentareafte_percep'],2).' ', '', 0, 'R');
	} else {
		$pdf->Cell(17, $pdf->h_row, '', '', 0, 'R');
		$pdf->Cell(18, $pdf->h_row, '', '', 0, 'R');		
	}
	$pdf->Cell(17, $pdf->h_row, fnNume01($_monto,2).' ', '', 0, 'R');
}

$pdf->eje_y += $pdf->h_row+2;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 8); $_nro = 1;
$pdf->Cell(139, $pdf->h_row, ' Documentos Referenciales', 'B', 0, 'L');
$pdf->SetFont('helvetica', '', 7);
foreach ( $_ap as $row ) {
	if ( $_nro == 1  || ($_nro*1-1)%3 == 0 ) {
		$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina( $pdf->h_row );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	}
	$pdf->Cell(6, 4, $_nro, 1, 0, 'R', 1);
	$pdf->Cell(21, 4, $row["tablex_documento"], 1, 0, 'L');
	$pdf->Cell(16, 4, "", 1, 0, "C");
	$pdf->Cell(19, 4, fnNume01($row["tablex_monto"],2), 1, 0, 'R');
	$pdf->Cell(2, 4, '', '', 0, 'R');
	$_nro++;
}

if ( $_ah[0]['orden_observ'] !== '' ) {
	$pdf->eje_y += $pdf->h_row+3;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 8);
	$pdf->Cell(190, $pdf->h_row, ' Glosa del Documento', 'B', 0, 'L');
	$pdf->eje_y += $pdf->h_row+2;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 8);
	$pdf->MultiCell(188, 0, $_ah[0]['orden_observ']."\n", '', 'J', 0, 1, '', '', true, 0, false, true, 0, 'C'); 
}
//
//$pdf->MultiCell(150, $pdf->h_row, $_ah[0]['orden_observ']."\n", 'LRB', 'J', 0, 1, '', '', false); 
ob_end_clean(); $pdf->output('orden.pdf','I');