<?php
$this->SetFillColor(192, 192, 192);
$this->write1DBarcode($GLOBALS["_ah"][0]["doc_id"].fnZerosLeft($GLOBALS["_ah"][0]["ped_id"],9), "EAN13", 235, 8, 36, 11);
$this->write2DBarcode($_SESSION["scUsursess_key"], "QRCODE,Q", 275, 3, 16, 16, "", "", true );

$this->fnEstablecerEjes( $this->eje_y, $this->eje_x );  $hh = 6;
$this->SetFont("helvetica", "B", 10);
$this->Cell(277, $hh, "CUADRO COMPARATIVO REQUERIMIENTO  ".$GLOBALS["_ah"][0]["year_id"] ."/ ". $GLOBALS["_ah"][0]["ped_documento"], 0, 0, "C");

$this->eje_y += (8);  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );  $_h = 3;
$this->SetFont("helvetica", "B", 6);
$this->Cell(15, $_h, " U. Orgánica", "", 0, "L");
$this->Cell(3,  $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 6);
$this->Cell(128, $_h, $GLOBALS["_ah"][0]["area_nombre"], "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 6);
$this->Cell(15,  $_h, " Sec. Func.", "", 0, "L");
$this->Cell(3,   $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 6);
$this->Cell(128, $_h, $GLOBALS["_ah"][0]["secfunc_code"]."  ".substr($GLOBALS["_ah"][0]["secfunc_nombre"],0,90), "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 6);
$this->Cell(15, $_h, " Tarea Func", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 6);
$this->Cell(128, $_h, $GLOBALS["_ah"][0]["tarea_codigo"]."  ".$GLOBALS["_ah"][0]["tarea_nombre"], "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 6);
$this->Cell(15, $_h, " Componente", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 6);
$this->Cell(128, $_h, "", "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 6);
$this->Cell(15, $_h, " Rubro", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 6);
$this->Cell(128, $_h, $GLOBALS["_ah"][0]["fuefin_code"]." ".$GLOBALS["_ah"][0]["fuefin_nombre"], "", 0, "L");

$this->eje_y += $_h;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 6);
$this->Cell(15, $_h, " Tipo Recur.", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 6);
$this->Cell(128, $_h, $GLOBALS["_ah"][0]["tiprecur_code"]." ".$GLOBALS["_ah"][0]["tiprecur_nombre"], "", 0, "L");

$this->eje_y += 4;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 6);
$this->Cell(15, $_h, " Cotizador", "", 0, "L");
$this->Cell(3, $_h, ":", "", 0, "L");
$this->SetFont("helvetica", "", 6);
$this->Cell(128, $_h, "", "", 0, "L");
/*$this->SetFont("helvetica", "B", 6);
$this->Cell(14, $_h, "", "", 0, "L");
$this->Cell(2, $_h, "", "", 0, "L");
$this->SetFont("helvetica", "", 6);
$this->Cell(15, $_h, "", "", 0, "R"); */

$this->eje_y += 4;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );
$this->SetFont("helvetica", "B", 6);
$this->Cell(5, 5, "", "1", 0, "C", 1);
$this->Cell(17, 5, "Código", "1", 0, "C", 1);
$this->Cell(80, 5, "Descripción", "1", 0, "C", 1);
$this->Cell(9, 5, "Unid", "1", 0, "C", 1);
$this->Cell(12, 5, "Cant.", "1", 0, "C", 1);
$this->Cell(11, 5, "P.U.", "1", 0, "C", 1);
$this->Cell(13, 5, "Total", "1", 0, "C", 1);
$this->Cell(15, 5, "Marca", "1", 0, "C", 1);

$this->eje_y += 1; $x = 160;  $y = 27;  $this->SetY($y); $this->SetX($x);
$this->Cell(16, 4, "Proveedor", "", 0, "L");
$this->SetY($y+4); $this->SetX($x);
$this->Cell(16, 4, "Nro. doc.", "", 0, "L");
$this->SetY($y+8); $this->SetX($x);  
$this->Cell(16, 4, "Puntaje %", "", 0, "L");
$this->SetY($y+12); $this->SetX($x);
$this->Cell(16, 4, "Validez / PE", "", 0, "L");
$this->SetY($y+16); $this->SetX($x);
$this->Cell(16, 4, "Tipo Pago", "", 0, "L");
$this->SetY($y+20); $this->SetX($x);
$this->Cell(16, 4, "Lugar Entrega", "", 0, "L");

$x = 176;  $y = 27;
foreach ( $GLOBALS["_ap"] as $row ) {
    $this->SetY($y); $this->SetX($x);
    $this->SetFont("helvetica", "B", 6);
    $this->Cell(24, 4, $row["pers_ruc"], "1", 0, "C", 1);
    $this->SetY($y+4); $this->SetX($x);
    $this->Cell(24, 4, $row["coti_documento"], "1", 0, "C");
    $this->SetY($y+8); $this->SetX($x);
    $relleno = ( $row["coti_bp_estado"] != "0" ? "1" : "");
    $this->SetFont("helvetica", "", 6);
    $this->Cell(24, 4, fnNume01($row["puntaje"],3)." ", "1", 0, "R", $relleno);
    $this->SetY($y+12); $this->SetX($x);
    $this->Cell(24, 4, " ".$row["coti_vigencia"]." dc  //  ". $row["coti_plazo"]. " dh ", "1", 0, "L");
    $this->SetY($y+16); $this->SetX($x);
    $this->Cell(24, 4, " ".$row["tippag_nombre"], "1", 0, "L");
    $this->SetY($y+20); $this->SetX($x);
    $this->Cell(24, 4, " ".$row["lugentr_nombre"], "1", 0, "L");
    $this->SetY($y+24); $this->SetX($x);
    $this->SetFont("helvetica", "B", 6);
    $this->Cell(12, 5, "P.U.", "1", 0, "C", 1);
    $this->Cell(12, 5, "Total", "1", 0, "C", 1);

    $x += 24;  $y = 27;
}

$x = 15;  $y = 198;  $this->SetY($y); $this->SetX($x);  $this->SetFont("helvetica", "", 6);
$this->Cell(150, 4, "Nota:  La presente información tiene caracter de Declaración Jurada", "", 0, "L");
if ($this->PageNo()*1 > 1 ){$this->eje_y += 5;  $this->fnEstablecerEjes( $this->eje_y, $this->eje_x );  $_h = 5;}