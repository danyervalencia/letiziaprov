<?php
ob_start(); session_start(); ini_set('memory_limit', '512M');
require_once '../resources/functions.php';
require_once '../resources/pdf.php';
require_once '../db/logistics_pedidos.php';
require_once '../db/logistics_pedidos_det.php';
require_once '../db/logistics_pedidos_ettr.php';

$ob = new Logistics_Pedidos();
$ob->setPed_key($_REQUEST['xxPed_key'] == '' ? '__' : $_REQUEST['xxPed_key']);
$ob->setType_record('printer');
//$ob->setType_query( $_REQUEST['xxType_query'] );
$ob->setOrder_by($_REQUEST['xxOrder_by']);
$_ah = $ob->registros();

$ob = new Logistics_Pedidos_Ettr();
$ob->setPed_key($_REQUEST['xxPed_key'] == '' ? '__' : $_REQUEST['xxPed_key']);
$ob->setType_record('printer');
//$ob->setType_query( $_REQUEST['xxType_query'] );
$ob->setOrder_by($_REQUEST['xxOrder_by']);
$_aet = $ob->registros();

$ob = new Logistics_Pedidos_Det();
$ob->setPed_key($_REQUEST['xxPed_key'] == '' ? '__' : $_REQUEST['xxPed_key']);
$ob->setType_record('printer');
//$ob->setType_query( $_REQUEST['xxType_query'] );
$ob->setOrder_by($_REQUEST['xxOrder_by']);
$_ad = $ob->registros();

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
$pdf = new PDF('P', 'mm', 'A4');
$pdf->SetFillColor(192, 192, 192); $pdf->SetTextColor(0, 0, 0);
$pdf->h_row = 4;  $pdf->max = 255;  $_nro = 0;

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
$pdf->fnNuevaPagina(2500);
$pdf->write1DBarcode( $_ah[0]['doc_id'].fnZerosLeft($_ah[0]['ped_id'],9), 'EAN13', 148, 8, 36, 11);
$pdf->write2DBarcode( $_SESSION['scUsursess_key'].' - '.$_SESSION['scUsuracce_key'], 'QRCODE,L', 188, 3, 16, 16, '', '' , true);

$pdf->setXY(168,24);
$pdf->SetFont("helvetica", 'B', 8);
$pdf->Cell(11, 5, 'DIA', '1', 0, 'C', 1);
$pdf->Cell(11, 5, 'MES', '1', 0, 'C', 1);
$pdf->Cell(14, 5, 'AÑO', '1', 0, 'C', 1);
$pdf->setXY(168,29);
$pdf->SetFont("helvetica", '', 8);
$pdf->Cell(11, 5, substr($_ah[0]['ped_fecha'],8,2), '1', 0, 'C');
$pdf->Cell(11, 5, substr($_ah[0]['ped_fecha'],5,2), '1', 0, 'C');
$pdf->Cell(14, 5, substr($_ah[0]['ped_fecha'],0,4), '1', 0, 'C');

$pdf->SetFont('helvetica', 'B', 10);  $pdf->fnEstablecerEjes($pdf->eje_y, $pdf->eje_x);
if ( $_ah[0]['tipped_id'] == '5006' ) {
	$pdf->Cell(190, 4, 'ESPECIFICACIONES  TECNICAS', 0, 0, 'C');
} else {
	$pdf->Cell(190, 4, 'TERMINOS  DE  REFERENCIA', 0, 0, 'C');
}
$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes($pdf->eje_y, $pdf->eje_x);  $pdf->SetFont('helvetica', 'B', 9);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->Cell(190, 4, $_ah[0]['ped_documento'], 0, 0, 'C');

$_h = 4;
$pdf->eje_y += $pdf->h_row+6;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, $_h, ' U. Orgánica', '', 0, 'L');
$pdf->Cell(3,  $_h, ':', '', 0, 'L');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(140, $_h, $_ah[0]['area_nombre'], '', 0, 'L');

$pdf->eje_y += $_h;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20,  $_h, ' Sec. Func.', '', 0, 'L');
$pdf->Cell(3,   $_h, ':', '', 0, 'L');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(140, $_h, $_ah[0]['secfunc_code'].'  '.substr($_ah[0]['secfunc_nombre'],0,120), '', 0, 'L');

$pdf->eje_y += $_h;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, $_h, ' Tarea Func.', '', 0, 'L');
$pdf->Cell(3, $_h, ':', '', 0, 'L');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(140, $_h, $_ah[0]['tarea_codigo'].'  '.substr($_ah[0]['tarea_nombre'],0,115), '', 0, 'L');

$pdf->eje_y += $_h;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, $_h, ' Rubro', '', 0, 'L');
$pdf->Cell(3, $_h, ':', '', 0, 'L');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(140, $_h, $_ah[0]['fuefin_code'].' '.$_ah[0]['fuefin_nombre'], '', 0, 'L');

$pdf->eje_y += $_h;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(20, $_h, ' Tipo Recur.', '', 0, 'L');
$pdf->Cell(3, $_h, ':', '', 0, 'L');
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(140, $_h, $_ah[0]['tiprecur_code'].' '.$_ah[0]['tiprecur_nombre'], '', 0, 'L');

$pdf->eje_y += $_h;  $pdf->fnEstablecerEjes($pdf->eje_y, $pdf->eje_x);
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Cell(190, $pdf->h_row, fnRepeat('=', 129), 0, 0, 'C');

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Cell(100, $pdf->h_row, '1. DENOMINACION ' . ($_ah[0]['tipped_id'] == '5006' ? ' DE LA ADQUISICION' : 'DEL SERVICIO O CONSULTORIA'), 0, 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 7);
$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
$pdf->Multicell(186, 0, $_aet[0]['pedettr_nombre']."\n", 0, 'J');

$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Cell(100, $pdf->h_row, '2. FINALIDAD PUBLICA', 0, 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 7);
$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
$pdf->Multicell(186, 0, $_aet[0]['pedettr_finalidad']."\n", 0, 'J');

$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', 'B', 7);
$pdf->Cell(100, $pdf->h_row,  '3. OBJETIVO ' . ($_ah[0]['tipped_id'] == '5006' ? ' DE LA ADQUISICION' : 'DEL SERVICIO O CONSULTORIA'), 0, 0, 'L');

$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont('helvetica', '', 7);
$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
$pdf->Multicell(186, 0, $_aet[0]['pedettr_objetivo']."\n", 0, 'J');

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );  $pdf->SetFont('helvetica', 'B', 7);
if ( $_ah[0]['tipped_id'] == '5006' ) {
	$pdf->Cell(100, $pdf->h_row, '4. DESCRIPCION  DEL  BIEN', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->Cell(4, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Cell(8, $pdf->h_row, 'Item', 1, 0, 'C', 1);
	$pdf->Cell(23, $pdf->h_row, 'Código', 1, 0, 'C', 1);
	$pdf->Cell(115, $pdf->h_row, 'Descripción', 1, 0, 'C', 1);
	$pdf->Cell(20, $pdf->h_row, 'Unidad', 1, 0, 'C', 1);
	$pdf->Cell(20, $pdf->h_row, 'Cantidad', 1, 0, 'C', 1);

	$pdf->SetFont('helvetica', '', 7);  $ln = 0;
	foreach ( $_ad as $row ) {
		$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );  $ln++;
		$pdf->Cell(4, $pdf->h_row, '', 0, 0, 'R');
		$pdf->Cell(8, $pdf->h_row, $ln, 0, 0, 'R');
		$pdf->Cell(23, $pdf->h_row, $row['bs_codigo'], 0, 0, 'C');
		$pdf->Cell(115, $pdf->h_row, $row['bs_nombre'], 0, 0, 'L');
		$pdf->Cell(20, $pdf->h_row, $row['unimed_nombre'], 0, 0, 'L');
		$pdf->Cell(20, $pdf->h_row, fnNume01($row['peddet_cantid'],3), 0, 0, 'R');
		
		if ( trim($row['peddet_detalle']) == '' ) {
		} else {
			$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
			$pdf->SetFont('helvetica', '', 7);
			$pdf->Cell(35, 0, '', 0, 0, 'L');
			$pdf->Multicell(115, 0, $row['peddet_detalle']."\n", 0, 'J');
			$pdf->eje_y = $pdf->getY()*1 - $pdf->h_row*1;
		}
	}

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$_cadena = ($_aet[0]['lugentr_nombre'] == '' ? '' : '( '.$_aet[0]['lugentr_nombre'] .' )');
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Cell(100, $pdf->h_row, '4.1 Lugar de Entrega  '.$_cadena, 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(7, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(183, $pdf->h_row+1, $_aet[0]['pedettr_lugar']."\n", 0, 'J');

	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Cell(100, $pdf->h_row, '4.2 Condiciones de Operación', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(7, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(183, $pdf->h_row, $_aet[0]['pedettr_condiciones']."\n", 0, 'J');

    $pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );  //$pdf->fnNuevaPagina( $line_height+1 );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	//$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Cell(100, $pdf->h_row, '5. REQUISITOS Y PERFIL DEL PROVEEDOR', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, 0, $_aet[0]['pedettr_persona']."\n", 0, 'L');
	
	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	//$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$cadena = $_aet[0]['pedettr_plazo_nro'] .' '. ( $_aet[0]['pedettr_plazo_nro']*1 > 1 ? '' : '' ) . $_aet[0]['tipplaz_nombre'];
	$pdf->Cell(100, $pdf->h_row, '6. PLAZO DE ENTREGA  [ '.$cadena.' ]', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row+1, $_aet[0]['pedettr_plazo']."\n", 0, 'L', 0, 1);
	
	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );  //$pdf->fnNuevaPagina( $line_height+1 );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$cadena = ($_aet[0]['pedettr_garantia_nro']*1 > 0 ? '[ '.$_aet[0]['pedettr_garantia_nro'] .' '. ( $_aet[0]['pedettr_garantia_nro']*1 > 1 ? 'Meses' : 'Mes' ) .' ]' : '');
	$pdf->Cell(100, $pdf->h_row, '7. GARANTIA COMERCIAL DEL BIEN   '.$cadena, 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row+1, $_aet[0]['pedettr_garantia']."\n", 0, 'J');

	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '8. FORMA DE PAGO', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row+1, $_aet[0]['pedettr_forma_pago']."\n", 0, 'J');
	
	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );  //$pdf->fnNuevaPagina( $line_height+1 );  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '9. SUPERVISION Y CONFORMIDAD DE RECEPCION DEL BIEN', 0, 0, 'L');

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row+1, $_aet[0]['pedettr_supervisa']."\n", 0, 'J');
	
	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '10. PENALIDADES', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row+1, $_aet[0]['pedettr_penalidad']."\n", 0, 'J');
	
	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '11. OTROS', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row+1, $_aet[0]['pedettr_otros']."\n", 0, 'J');
	$pdf->eje_y = $pdf->getY()+1;
} else {
	$pdf->Cell(100, $pdf->h_row, '4. DESCRIPCION  DEL  SERVICIO', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->Cell(4, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Cell(8, $pdf->h_row, 'Item', 1, 0, 'C', 1);
	$pdf->Cell(23, $pdf->h_row, 'Código', 1, 0, 'C', 1);
	$pdf->Cell(115, $pdf->h_row, 'Descripción', 1, 0, 'C', 1);
	$pdf->Cell(20, $pdf->h_row, 'Unidad', 1, 0, 'C', 1);
	$pdf->Cell(20, $pdf->h_row, 'Cantidad', 1, 0, 'C', 1);

	$pdf->SetFont('helvetica', '', 7);  $ln = 0;
	foreach ( $_ad as $row ) {
		$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );  $ln++;
		$pdf->Cell(4, $pdf->h_row, '', 0, 0, 'R');
		$pdf->Cell(8, $pdf->h_row, $ln, 0, 0, 'R');
		$pdf->Cell(23, $pdf->h_row, $row['bs_codigo'], 0, 0, 'C');
		$pdf->Cell(115, $pdf->h_row, $row['bs_nombre'], 0, 0, 'L');
		$pdf->Cell(20, $pdf->h_row, $row['unimed_nombre'], 0, 0, 'L');
		$pdf->Cell(20, $pdf->h_row, fnNume01($row['peddet_cantid'],3), 0, 0, 'R');

		if ( trim($row['peddet_detalle']) == '' ) {
		} else {
			$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
			$pdf->Cell(35, 0, '', 0, 0, 'L');
			$pdf->Multicell(115, 0, $row['peddet_detalle']."\n", 0, 'J');
			$pdf->eje_y = $pdf->getY()*1 - $pdf->h_row*1;
		}
	}

    $pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Cell(100, $pdf->h_row, '4.1 Lugar de Ejecución', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(7, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(183, $pdf->h_row, $_aet[0]['pedettr_lugar']."\n", 0, 'J');
	
	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Cell(100, $pdf->h_row, '4.2 Actividades y Plan de Trabajo', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(7, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(183, 0, $_aet[0]['pedettr_actividades']."\n", 0, 'J');

    $pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Cell(100, $pdf->h_row, '4.3 Productos y/o Servicios a obtener (Entregables)', 0, 0, 'L');

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(7, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(183, $pdf->h_row, $_aet[0]['pedettr_entregable']."\n", 0, 'J');

    $pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '5. REQUISITOS y/o PERFIL DEL PROVEEDOR / CONTRATISTA', 0, 0, 'L');
	
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row, $_aet[0]['pedettr_persona']."\n", 0, 'J');

	$pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$_cadena = $_aet[0]['pedettr_plazo_nro'] .' '. ( $_aet[0]['pedettr_plazo_nro']*1 > 1 ? '' : '' )  . $_aet[0]['tipplaz_nombre'];
	$pdf->Cell(100, $pdf->h_row, '6. PLAZO DE EJECUCION  [ '.$_cadena.' ]', 0, 0, 'L');

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row, $_aet[0]['pedettr_plazo']."\n", 0, 'J');

    $pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '7. GARANTIA DEL SERVICIO', 0, 0, 'L');

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row, $_aet[0]['pedettr_garantia']."\n", 0, 'J');
	$pdf->eje_y = $pdf->getY()+1;

    $pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '8. FORMA DE PAGO', 0, 0, 'L');

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row, $_aet[0]['pedettr_forma_pago']."\n", 0, 'L');

    $pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '9. SUPERVISION Y CONFORMIDAD DE LA PRESTACION DEL SERVICIO', 0, 0, 'L');

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row, $_aet[0]['pedettr_supervisa']."\n", 0, 'J');

    $pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '10. PENALIDADES', 0, 0, 'L');

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row, $_aet[0]['pedettr_penalidad']."\n", 0, 'J');

    $pdf->eje_y = $pdf->getY()+1;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', 'B', 7);
	$pdf->Cell(100, $pdf->h_row, '11. OTROS', 0, 0, 'L');

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont('helvetica', '', 7);
	$pdf->Cell(3, $pdf->h_row, '', 0, 0, 'L');
	$pdf->Multicell(187, $pdf->h_row, $_aet[0]['pedettr_otros']."\n", 0, 'J');
}

ob_end_clean(); $pdf->output('especificaciones','I');