<?php
$this->SetFillColor(192, 192, 192);
$this->write2DBarcode($_SESSION["scPerssess_key"], "QRCODE,Q", 151, 8, 13, 13);
$this->write1DBarcode($GLOBALS["_ah"][0]["doc_id"].fnZerosLeft($GLOBALS["_ah"][0]["coti_id"],9), "EAN13", 168, 8, 35, 10.5);
$this->SetFont("helvetica", "", 5.8);
$this->SetXY(168, 18.5);
$this->Cell(90, 4, $GLOBALS["_ah"][0]["coti_key"], 0, 0, "L");
//$this->Cell(90, 4, $GLOBALS["acab"][0]["ing_key"], 0, 0, "L");

$_h = 5;
$this->fnEstablecerEjes($this->eje_y, $this->eje_x);
$this->SetFont("helvetica", "B", 10);
$this->Cell(190, $_h, "SOLICITUD DE COTIZACION", 0, 0, "C");
$this->eje_y += 5;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 12);
$this->Cell(190, $_h, $GLOBALS["_ah"][0]["tipcoti_abrev"]." - ".fnZerosLeft($GLOBALS["_ah"][0]["coti_nro"],6), 0, 0, "C");

$this->setXY(168,22);
$this->SetFont("helvetica", "B", 8);
$this->Cell(11, 5, "DIA", "1", 0, "C", 1);
$this->Cell(11, 5, "MES", "1", 0, "C", 1);
$this->Cell(14, 5, "AÑO", "1", 0, "C", 1);
$this->setXY(168,27);
$this->SetFont("helvetica", "", 8);
$this->Cell(11, 5, substr($GLOBALS["_ah"][0]["coti_fecha"],8,2), "1", 0, "C");
$this->Cell(11, 5, substr($GLOBALS["_ah"][0]["coti_fecha"],5,2), "1", 0, "C");
$this->Cell(14, 5, substr($GLOBALS["_ah"][0]["coti_fecha"],0,4), "1", 0, "C");

$this->eje_y += 8;  $this->fnEstablecerEjes($this->eje_y, $this->eje_x); $_h = 5;
$this->SetFont("helvetica", "B", 8);
$this->Cell(18, $_h, " Rz. Social", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(138, $_h, $GLOBALS["_ah"][0]["pers_nombre"], "", 0, "L");

$_h = 4.5;
$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 8);
$this->Cell(18, $_h, " R.U.C.", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(115, $_h, $GLOBALS["_ah"][0]["pers_ruc"], "", 0, "L");
$this->SetFont("helvetica", "B", 8);
$this->Cell(13, $_h, "E-mail", "", 0, "L");
$this->Cell(2,  $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(17, $_h, $GLOBALS["_ah"][0]["pers_mail"], "", 0, "R");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 8);
$this->Cell(18, $_h, " Dirección", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(115, $_h, $GLOBALS["_ah"][0]["pers_domicilio"], "", 0, "L");
$this->SetFont("helvetica", "B", 8);
$this->Cell(13, $_h, "Teléfono", "", 0, "L");
$this->Cell(2, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(38, $_h, "", "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 8);
$this->Cell(18, $_h, " Requerim.", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(115, $_h, $GLOBALS["_ah"][0]["ped_documento"], "", 0, "L");
$this->SetFont("helvetica", "B", 8);
$this->Cell(13, $_h, "Fecha", "", 0, "L");
$this->Cell(2, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(38, $_h, fnDateDDMMAAAA($GLOBALS["_ah"][0]["ped_fecha"]), "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 8);
$this->Cell(18, $_h, " U. Orgánica", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(116, $_h, $GLOBALS["_ah"][0]["area_nombre"], "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 8);
$this->Cell(18, $_h, " Sec. Func.", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(172, $_h, $GLOBALS["_ah"][0]["secfunc_code"]."  ".$GLOBALS["_ah"][0]["secfunc_nombre"], "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 8);
$this->Cell(18, $_h, " Tarea Func.", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 8);
$this->Cell(172, $_h, $GLOBALS["_ah"][0]["tarea_codigo"]."  ".$GLOBALS["_ah"][0]["tarea_nombre"], "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
//$this->Cell(7, $_h, "Item", 1, 0, "C", 1);
$this->SetFont("helvetica", "B", 7);
$this->Cell(21, $_h, "Código", 1, 0, "C", 1);
$this->Cell(85, $_h, "Descripción", 1, 0, "C", 1);
$this->Cell(16, $_h, "U.M.", 1, 0, "C", 1);
$this->Cell(19, $_h, "Marca", 1, 0, "C", 1);
$this->Cell(14, $_h, "Cant.", 1, 0, "C", 1);
$this->Cell(18, $_h, "P.U.", 1, 0, "C", 1);
$this->Cell(17, $_h, "Total", 1, 0, "C", 1);

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );