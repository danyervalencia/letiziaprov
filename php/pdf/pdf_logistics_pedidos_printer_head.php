<?php
$this->SetFillColor(192, 192, 192);
$this->write2DBarcode ( $_SESSION['scUsursess_key'].' - '.$_SESSION['scUsuracce_key'], 'QRCODE,Q', 147, 8, 13, 13 );
$this->write1DBarcode ( $GLOBALS['_ah'][0]['doc_id'].fnZerosLeft($GLOBALS['_ah'][0]['ped_id'],9), 'EAN13', 165, 8, 36, 10.5);
$this->SetXY(165, 18);
$this->Cell(90, 4, $GLOBALS['_ah'][0]['ped_key'], 0, 0, 'L');

//$this->write2DBarcode ( $GLOBALS['acab'][0]['ing_documento'], 'QRCODE,Q', 232, 5, 13, 13 );
//$this->write1DBarcode ( $GLOBALS['acab'][0]['doc_id'].fnZerosLeft($GLOBALS['acab'][0]['ing_id'],9), 'EAN13', 250, 5, 36, 10.5);
//$this->SetFont('helvetica', ', 5.8);
//$this->SetXY(250, 14.5);
//$this->Cell(90, 4, $GLOBALS['acab'][0]['ing_key'], 0, 0, 'L');

$_h = 5;
$this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont('helvetica', 'B', 8);
$this->Cell(0, $_h, 'REQUERIMIENTO DE '.($GLOBALS['_ah'][0]['tipped_id'] == '5006' ? 'BIENES' : 'SERVICIOS'), 0, 0, 'C');
//$this->eje_y += 5;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
//$this->SetFont('helvetica', 'B', 7);
//$this->Cell(0, 4, "[ ".$GLOBALS['_ah'][0]['ped_nrodoc']." ]   ".fnDateDDMMAAAA($GLOBALS['_ah'][0]['ped_fechadoc']), 0, 0, 'C');
$this->eje_y += 7;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );

$_h = 3;
$this->SetFont('helvetica', 'B', 6);
$this->Cell(15, $_h, ' U. Orgánica', '', 0, 'L');
$this->Cell(3,  $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(135, $_h, $GLOBALS['_ah'][0]['area_nombre'], '', 0, 'L');
$this->SetFont('helvetica', 'B', 6);
$this->Cell(14, $_h, 'Req. Nro', '', 0, 'L');
$this->Cell(2,  $hh, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(15, $_h, $GLOBALS['_ah'][0]['ped_nro'], '', 0, 'R');
$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );

$this->SetFont('helvetica', 'B', 6);
$this->Cell(15,  $_h, ' Meta SIAF', '', 0, 'L');
$this->Cell(3,   $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(135, $_h, $GLOBALS['_ah'][0]['meta_code'].'  '.$GLOBALS['_ah'][0]['meta_nombre'], '', 0, 'L');
$this->SetFont('helvetica', 'B', 6);
$this->Cell(14, $_h, 'Req. Fecha', '', 0, 'L');
$this->Cell(2,  $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(15, $_h, fnDateDDMMAAAA($GLOBALS['_ah'][0]['ped_fecha']), '', 0, 'R');
$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );

$this->SetFont('helvetica', 'B', 6);
$this->Cell(15, $_h, ' Tarea', '', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(135, $_h, $GLOBALS['_ah'][0]['tarea_codigo'].'  '.$GLOBALS['_ah'][0]['tarea_nombre'], '', 0, 'L');
$this->SetFont('helvetica', 'B', 6);
$this->Cell(14, $_h, 'Importe', '', 0, 'L');
$this->Cell(2,  $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(15, $_h, fnNume01($GLOBALS['_ah'][0]['ped_monto'],2), '', 0, 'R');
$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );

$this->SetFont('helvetica', 'B', 6);
$this->Cell(15, $_h, ' Componente', '', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(135, $_h, '', '', 0, 'L');
$this->SetFont('helvetica', 'B', 6);
$this->Cell(14, $_h, 'Ampliación', '', 0, 'L');
$this->Cell(2,  $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(15, $_h, '**********', '', 0, 'R');
$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );

$this->SetFont('helvetica', 'B', 6);
$this->Cell(15, $_h, ' Fue. Financ.', '', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(135, $_h, $GLOBALS['_ah'][0]['fuefin_code'].' '.$GLOBALS['_ah'][0]['fuefin_nombre'], '', 0, 'L');
$this->SetFont('helvetica', 'B', 6);
$this->Cell(14, $_h, 'Rebaja', '', 0, 'L');
$this->Cell(2,  $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(15, $_h, '**********', '', 0, 'R');
$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );

$this->SetFont('helvetica', 'B', 6);
$this->Cell(15, $_h, ' Tipo Recur.', '', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(135, $_h, $GLOBALS['_ah'][0]['tiprecur_code'].' '.$GLOBALS['_ah'][0]['tiprecur_nombre'], '', 0, 'L');
$this->SetFont('helvetica', 'B', 6);
$this->Cell(14, $_h, '', '', 0, 'L');
$this->Cell(2, $_h, '', '', 0, 'L');
$this->SetFont('helvetica', '', 6);
$this->Cell(15, $_h, '', '', 0, 'R');
$this->eje_y += 4;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );

$_h = 5;
$this->SetFont('helvetica', 'B', 6);
$this->Cell(6,  $_h, 'Item', 1, 0, 'C', 1);
$this->Cell(21, $_h, 'Código', 1, 0, 'C', 1);
$this->Cell(108, $_h, 'Descripción', 1, 0, 'C', 1);
$this->Cell(18,  $_h, 'Unidad', 1, 0, 'C', 1);
$this->Cell(17, $_h, 'Cantid', 1, 0, 'C', 1);
$this->Cell(17, $_h, 'Clasificador', 1, 0, 'C', 1);

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
?>