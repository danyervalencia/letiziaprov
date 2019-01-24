<?php
$this->SetFillColor(192, 192, 192);
$this->write2DBarcode($_SESSION['scUsursess_key'], 'QRCODE,Q', 151, 8, 13, 13);
$this->write1DBarcode($GLOBALS['_ah'][0]['doc_id'].fnZerosLeft($GLOBALS['_ah'][0]['ped_id'],9), 'EAN13', 168, 8, 35, 10.5);
$this->SetFont('helvetica', '', 5.8);
$this->SetXY(168, 18.5);
$this->Cell(90, 4, $GLOBALS['_ah'][0]['ped_key'], 0, 0, 'L');
//$this->Cell(90, 4, $GLOBALS['acab'][0]['ing_key'], 0, 0, 'L');

$_h = 5;
$this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont('helvetica', 'B', 9);
$this->Cell(0, $_h, 'SOLICITUD DE COTIZACION DE ' . ($GLOBALS['_ah'][0]['tipped_id'] == '5006' ? 'BIENES' : 'SERVICIOS'), 0, 0, 'C');
//$this->eje_y += 5;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
//$this->SetFont('helvetica', 'B', 7);
//$this->Cell(0, 4, "[ ".$GLOBALS['_ah'][0]['ped_nro']." ]   ".fnDateDDMMAAAA($GLOBALS['_ah'][0]['ped_fecha']), 0, 0, 'C');

$this->eje_y += 7;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x ); $_h = 5;
$this->SetFont('helvetica', 'B', 7);
$this->Cell(17, $_h, ' R.U.C.','', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->Cell(112, $_h, fnRepeat('.',40), '', 0, 'L');
$this->Cell(5, $_h, '', '', 0, 'L');
$this->Cell(13, $_h, 'Teléfono', '', 0, 'L');
$this->Cell(25, $_h, fnRepeat('.',57), '', 0, 'L');

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->Cell(17, $_h, ' Razón Social', '', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->Cell(112, $_h, fnRepeat('.',150), '', 0, 'L');
$this->Cell(5, $_h, '', '', 0, 'L');
$this->Cell(13, $_h, 'E-mail', '', 0, 'L');
$this->Cell(25, $_h, fnRepeat('.',57), '', 0, 'L');

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont('helvetica', 'B', 7);
$this->Cell(17, $_h, ' U. Orgánica', '', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 7);
$this->Cell(112, $_h, $GLOBALS['_ah'][0]['area_nombre'], '', 0, 'L');
$this->Cell(5, $_h, '', '', 0, 'L');
$this->SetFont('helvetica', 'B', 7);
$this->Cell(13, $_h, 'Req. Nro.', '', 0, 'L');
$this->SetFont('helvetica', '', 7);
$this->Cell(25, $_h, fnZerosLeft($GLOBALS['_ah'][0]['ped_nro'], 6) .'  -  '.fnDateDDMMAAAA($GLOBALS['_ah'][0]['ped_fecha']), '', 0, 'L');

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont('helvetica', 'B', 7);
$this->Cell(17, $_h, ' Meta SIAF', '', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 7);
$this->Cell(135, $_h, $GLOBALS['_ah'][0]['meta_code'].'  '.$GLOBALS['_ah'][0]['meta_nombre'], '', 0, 'L');

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont('helvetica', 'B', 7);
$this->Cell(17, $_h, ' Tarea', '', 0, 'L');
$this->Cell(3, $_h, ':', '', 0, 'L');
$this->SetFont('helvetica', '', 7);
$this->Cell(135, $_h, $GLOBALS['_ah'][0]['tarea_codigo'].'  '.$GLOBALS['_ah'][0]['tarea_nombre'], '', 0, 'L');



$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont('helvetica', 'B', 6);
$this->Cell(136, $_h, 'REQUERIMIENTO', 1, 0, 'C', 1);
$this->Cell(54, $_h, 'COTIZACION', 1, 0, 'C', 1);

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
//$this->Cell(7, $_h, 'Item', 1, 0, 'C', 1);
$this->Cell(21, $_h, 'Código', 1, 0, 'C', 1);
$this->Cell(14, $_h, 'Cant.', 1, 0, 'C', 1);
$this->Cell(16, $_h, 'U.M.', 1, 0, 'C', 1);
$this->Cell(85, $_h, 'Descripción', 1, 0, 'C', 1);
$this->Cell(19, $_h, 'Marca', 1, 0, 'C', 1);
$this->Cell(17, $_h, 'P.U.', 1, 0, 'C', 1);
$this->Cell(18, $_h, 'Total', 1, 0, 'C', 1);

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
?>