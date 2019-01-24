<?php
ob_start(); ini_set("memory_limit","512M"); $result["success"] = false;
require_once "../session_validate.php";
if ( $result["success"] == false ){ echo json_encode($result); exit; }

require_once "../resources/functions.php";
require_once "../resources/pdf.php";
require_once "../db/logistics_pedidos.php";
require_once "../db/logistics_cotizaciones.php";
require_once "../db/logistics_buena_pro.php";

$ob = new Logistics_Pedidos();
$ob->setPed_key( $_REQUEST["xxPed_key"] );
$ob->setType_record("printer_comparative");
$_ah = $ob->registros();

if ( $_ah[0]["pedweb_fechafin"] == "" ){ $result["msg"] = "Proveedor intruso: requerimiento no registra publicación Web"; echo json_encode($result); exit; }
if ( fnDTOS($_ah[0]["pedweb_fechafin"]) >= fnDTOS(date("Y-m-d")) ){ $result["msg"] = "Proveedor intruso: ud. a modificado la fecha de su equipo,  usuario sra bloqueda en forma permanente"; echo json_encode($result); exit; }
//$result["msg"] = date("Y-m-d")."___".$_ah[0]["pedweb_fechafin"]; echo json_encode($result); exit;
//if ( $_ah[0]["pedweb_fechafin"] > ){ $result["msg"] = "Proveedor intruso: requerimiento no registra publicación Web"; echo json_encode($result); exit; }
$ob = new logistics_Cotizaciones();
$ob->setPed_key( $_REQUEST["xxPed_key"] );
$ob->setType_record("printer_comparative");
$_acp = $ob->registros_comparativo();
$_ap = $ob->registros_personas();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( $_REQUEST["xxFormat"] == "33" ){
	require_once "../classes/PHPExcel.php";
	$_xls = new PHPExcel();
	$_xls->getProperties()->setCreator("Letizia")->setTitle("Cuadro Comparativo");
	$_xls->getDefaultStyle()->getFont()->setSize(8)->setName("Arial Narrow");;
	$_formatNume2 = "#,#0.00;[Red]-#,#0.00"; $_formatNume3 = "#,#0.000;[Red]-#,#0.000"; $_formatNume4 = "#,#0.0000;[Red]-#,#0.0000";

	$_sheet1 = $_xls->getActiveSheet();
	$_sheet1->setTitle("Cuadro Comparativo");
	$_sheet1->getDefaultRowDimension()->setRowHeight(14);
	$_sheet1->getColumnDimension("A")->setWidth(5);
	$_sheet1->getColumnDimension("B")->setWidth(10);
	$_sheet1->getColumnDimension("C")->setWidth(9);
	$_sheet1->getColumnDimension("D")->setWidth(50);
	$_sheet1->getColumnDimension("E")->setWidth(7);
	$_sheet1->getColumnDimension("F")->setWidth(13);
	$_sheet1->getColumnDimension("G")->setWidth(14);
	$_sheet1->getColumnDimension("H")->setWidth(14);

	$_sheet1->setCellValue("A1", "CUADRO COMPARATIVO DE REQUERIMIENTO   ".$_ah[0]["ped_documento"]);
	$_sheet1->getStyle("A1")->getFont()->setBold(true)->setSize(10);

	$_fila = 3;
	$_sheet1->setCellValueByColumnAndRow(0, $_fila, "U. Orgánica");
	$_sheet1->setCellValueByColumnAndRow(2, $_fila, $_ah[0]["area_nombre"]);
	$_sheet1->setCellValueByColumnAndRow(7, $_fila, "Proveedor");

	$_fila += 1;
	$_sheet1->setCellValueByColumnAndRow(0, $_fila, "Sec. Func.");
	$_sheet1->setCellValueByColumnAndRow(2, $_fila, $_ah[0]["secfunc_code"]."  ".$_ah[0]["secfunc_nombre"]);
	$_sheet1->setCellValueByColumnAndRow(7, $_fila, "Cotización");

	$_fila += 1;
	$_sheet1->setCellValueByColumnAndRow(0, $_fila, "Tarea Func");
	$_sheet1->setCellValueByColumnAndRow(2, $_fila, $_ah[0]["tarea_codigo"]."  ".$_ah[0]["tarea_nombre"]);
	$_sheet1->setCellValueByColumnAndRow(7, $_fila, "Puntaje %");

	$_fila += 1;
	$_sheet1->setCellValueByColumnAndRow(0, $_fila, "Rubro");
	$_sheet1->setCellValueByColumnAndRow(2, $_fila, $_ah[0]["fuefin_code"]."  ".$_ah[0]["fuefin_nombre"]);
	$_sheet1->setCellValueByColumnAndRow(7, $_fila, "Validez / PE");

	$_fila += 1;
	$_sheet1->setCellValueByColumnAndRow(0, $_fila, "Tipo Recurso");
	$_sheet1->setCellValueByColumnAndRow(2, $_fila, $_ah[0]["tiprecur_code"]."  ".$_ah[0]["tiprecur_nombre"]);
	$_sheet1->setCellValueByColumnAndRow(7, $_fila, "Lugar Entrega");

	$_fila += 1;
	$_sheet1->setCellValueByColumnAndRow(0, $_fila, "Cotizador");
	$_sheet1->setCellValueByColumnAndRow(2, $_fila, $_ah[0]["indiv_apenom"]);
	$_sheet1->setCellValueByColumnAndRow(7, $_fila, "Tipo Pago");

	$_sheet1->getStyle("A3:A".$_fila)->getFont()->setBold(true);
	$_sheet1->getStyle("H3:H".$_fila)->getFont()->setBold(true);
	$_sheet1->getStyle("H3:H8")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	$_sheet1->getStyle("H3:H8")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("FFE8E5E5");

    $_col = 4;
	foreach ( $_ap as $row ) { $_col += 4;
		$_c1 = fnGetColumnExcel($_col); $_c2 = fnGetColumnExcel($_col+1); $_c3 = fnGetColumnExcel($_col+2); $_c4 = fnGetColumnExcel($_col+3); $_last_col = $_c4;
		$_sheet1->getColumnDimension($_c1)->setWidth(15);
		$_sheet1->getColumnDimension($_c2)->setWidth(14);
		$_sheet1->getColumnDimension($_c3)->setWidth(15);
		$_sheet1->getColumnDimension($_c4)->setWidth(15);

		$_sheet1->setCellValueExplicit($_c1."3", $row["pers_ruc"], PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c2."3", $row["pers_nombre"], PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c1."4", $row["coti_documento"], PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueByColumnAndRow($_col, 5, $row["puntaje_monto"]*1);
		$_sheet1->setCellValueExplicit($_c1."6", $row["coti_vigencia"]." Días Calendario", PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c3."6", $row["coti_garantia"]*1>0?$row["coti_garantia"]." Mes".($row["coti_garantia"]*1==1?"":"es"):"*********", PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c1."7", $row["lugentr_nombre"], PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c1."8", $row["tippag_nombre"], PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c1."9", "P.U.", PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c2."9", "SubTotal", PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c3."9", "Marca", PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit($_c4."9", "Modelo", PHPExcel_Cell_DataType::TYPE_STRING);

		//$_sheet1->getStyle($_c1."5:".$_c4."5")->getNumberFormat()->setFormatCode($_formatNume3);
		$_sheet1->getStyle($_c1."3:".$_c4."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("FFE8E5E5");
		$_sheet1->getStyle($_c1."3:".$_c1."3")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$_sheet1->getStyle($_c1."3:".$_c4."8")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$_sheet1->mergeCells($_c2."3:".$_c4."3");
		$_sheet1->mergeCells($_c1."4:".$_c4."4");
		$_sheet1->mergeCells($_c1."5:".$_c4."5");
		$_sheet1->mergeCells($_c1."6:".$_c2."6");
		$_sheet1->mergeCells($_c3."6:".$_c4."6");
		$_sheet1->mergeCells($_c1."7:".$_c4."7");
		$_sheet1->mergeCells($_c1."8:".$_c4."8");		
	}

	$_fila += 1;
	$_sheet1->setCellValueByColumnAndRow(0, $_fila, "#");
	$_sheet1->setCellValueByColumnAndRow(1, $_fila, "Código"); $_sheet1->mergeCells("B".$_fila.":C".$_fila);
	$_sheet1->setCellValueByColumnAndRow(3, $_fila, "Descripción");
	$_sheet1->setCellValueByColumnAndRow(4, $_fila, "Unid");
	$_sheet1->setCellValueByColumnAndRow(5, $_fila, "Cant.");
	$_sheet1->setCellValueByColumnAndRow(6, $_fila, "P.U.");
	$_sheet1->setCellValueByColumnAndRow(7, $_fila, "Total");
	$_sheet1->getStyle("A".$_fila.":".$_last_col.$_fila)->getFont()->setBold(true);
	$_sheet1->getStyle("A".$_fila.":".$_last_col.$_fila)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$_sheet1->getStyle("A".$_fila.":".$_last_col.$_fila)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	$_sheet1->getStyle("A".$_fila.":".$_last_col.$_fila)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("FFE8E5E5");

	$_sheet1->getRowDimension("3")->setRowHeight(13); $_sheet1->getRowDimension("4")->setRowHeight(13); $_sheet1->getRowDimension("5")->setRowHeight(13); $_sheet1->getRowDimension("6")->setRowHeight(13);

	$_fila_ini = ($_fila*1 + 1);  $nro = 0;  $_orden_id = "";
	foreach ( $_acp as $row ) { $_fila += 1; $_nro++; $_col = 4;
		$_sheet1->setCellValueExplicit("A".$_fila, $_nro, PHPExcel_Cell_DataType::TYPE_NUMERIC);
		$_sheet1->setCellValueExplicit("B".$_fila, $row["bs_codigo"], PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit("D".$_fila, $row["bs_nombre"], PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueExplicit("E".$_fila, $row["unimed_abrev"], PHPExcel_Cell_DataType::TYPE_STRING);
		$_sheet1->setCellValueByColumnAndRow(5, $_fila, $row["peddet_cantid"]*1 > 0 ? $row["peddet_cantid"]*1 : "");
		$_sheet1->setCellValueByColumnAndRow(6, $_fila, $row["peddet_preuni"]*1 > 0 ? $row["peddet_preuni"]*1 : "");
		$_sheet1->setCellValueByColumnAndRow(7, $_fila, $row["peddet_pretot"]*1 > 0 ? $row["peddet_pretot"]*1 : "");
		//$_sheet1->setCellValueByColumnAndRow(7, $_fila, $row[""]);
	
		for ( $_i=1; $_i<=200; $_i++ ) {
			$_campo = "vv" . fnZerosLeft($_i, 3);
			if ( $row[$_campo] == 1 ){ $_col += 4;
				if ( $_nro == 1 ) { $aPretot[] = 0; $aBuenapro[] = 0; }
				$_preuni = "pu" . fnZerosLeft($_i, 3);
				if ( $row[$_preuni]*1 > 0 ) {
					$_pretot = "tt" . fnZerosLeft($_i, 3);
					$_marca = "mm" . fnZerosLeft($_i, 3);
					$_modelo = "mo" . fnZerosLeft($_i, 3);
					$aPretot[$_i] = $row[$_pretot]*1 + $aPretot[$_i]*1;
					$bold = ( $row[$_preuni] == $xxx ? "B" : ""); //( $aFlga[$_i] == "1" ? "B" : "");
					//if ( $bold == "B" ) { $pdf->SetFont("helvetica", "B", 5); }
					//else                { $pdf->SetFont("helvetica", "", 5); }
					if ( $aBupr[$_i]*1 > 0 ) {
						$relleno = "1";
						$aBuenapro[$_i] = $row[$_pretot]*1 + $aBuenapro[$_i]*1;
						$estado_bp = "1";
					} else {
						$relleno = "";
					}

					$_sheet1->setCellValueByColumnAndRow($_col, $_fila, $row[$_preuni]);
					$_sheet1->setCellValueByColumnAndRow($_col+1, $_fila, $row[$_pretot]);
					$_sheet1->setCellValueByColumnAndRow($_col+2, $_fila, $row[$_marca]);
					$_sheet1->setCellValueByColumnAndRow($_col+3, $_fila, $row[$_modelo]);
					//$pdf->Cell(12, $pdf->h_row, fnNume01($row[$preuni], 4), 1, 0, "R", $relleno);
					//$pdf->Cell(12, $pdf->h_row, fnNume01($row[$pretot], 2), 1, 0, "R", $relleno);
				} else {
					$_sheet1->setCellValueByColumnAndRow($_col, $_fila, "no");
					$_sheet1->setCellValueByColumnAndRow($_col+1, $_fila, "no");
					$_sheet1->setCellValueByColumnAndRow($_col+2, $_fila, "no");
					$_sheet1->setCellValueByColumnAndRow($_col+3, $_fila, "no");
				}
			}else{ break; }
		}


		//$_saldo = $row["ped_monto"]*1 + $row["ped_aumento"]*1 - ($row["ped_rebaja"]*1 + $row["ped_ejecutado"]*1);
		//$_sheet1->setCellValueByColumnAndRow(20, $_fila, $row["ped_flga"]=="98"||$_saldo*1<=0?"":$_saldo);

		if ( $row["ped_flga"] == "98" ) { $_sheet1->getStyle("A".$_fila.":Q".$_fila)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED); }
	}

	$_sheet1->getStyle("F".$_fila_ini.":F".($_fila*1 + 2))->getNumberFormat()->setFormatCode($_formatNume3);
	$_sheet1->getStyle("G".$_fila_ini.":G".($_fila*1 + 2))->getNumberFormat()->setFormatCode($_formatNume4);
	$_sheet1->getStyle("H".$_fila_ini.":H".($_fila*1 + 2))->getNumberFormat()->setFormatCode($_formatNume2);
	//$_sheet1->getStyle("I".$_fila_ini.":I".($_fila*1 + 2))->getNumberFormat()->setFormatCode($_formatNume4);
	//$_sheet1->getStyle("J".$_fila_ini.":J".($_fila*1 + 2))->getNumberFormat()->setFormatCode($_formatNume2);

	$_fila += 1;
	$_sheet1->getStyle("A".$_fila.":U".$_fila)->getFont()->setSize(9);
	$_sheet1->getStyle("A".$_fila.":U".$_fila)->getFont()->setBold(true);
	$_sheet1->setCellValueByColumnAndRow(4, $_fila, "TOTAL CONSOLIDADO");
	$_sheet1->setCellValueByColumnAndRow(7, $_fila, "=SUM(H".$_fila_ini.":H".($_fila*1-1).")");

	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename='cuadro_comparativo_".$_ah[0]["ped_documento"].".xls'");
	header("Cache-Control: max-age=0");     
	$objWriter = PHPExcel_IOFactory::createWriter($_xls,"Excel5");
	$objWriter->save("php://output");
	exit;}

$pdf = new PDF("L", "mm", "A4");
$pdf->SetFillColor(192, 192, 192);
$pdf->SetTextColor(0, 0, 0);
$pdf->setFile_header("pdf_logistics_pedidos_comparative_head.php");
$pdf->h_row = 5;  $pdf->max = 180;  $_nro = 0;  $_monto = 0;

$pdf->fnNuevaPagina(2500);  $pdf->SetFont("helvetica", "", 5);
foreach ( $_acp as $row ) {
	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );  $_nro += 1;
	
	$pdf->Cell(5, $pdf->h_row, $_nro, 1, 0, "R");
	$pdf->Cell(17, $pdf->h_row, $row["bs_codigo"], 1, 0, "L");
	$pdf->Cell(80, $pdf->h_row, substr(utf8_encode($row["bs_nombre"]),0,70), 1, 0, "L");
	$pdf->Cell(9, $pdf->h_row, $row["unimed_abrev"], 1, 0, "L");
	$pdf->Cell(12, $pdf->h_row, fnNume01($row["peddet_cantid"], 3), 1, 0, "R");
	$pdf->Cell(11, $pdf->h_row, fnNume01($row["peddet_preuni"], 2), 1, 0, "R");
	$pdf->Cell(13, $pdf->h_row, fnNume01($row["peddet_pretot"], 2), 1, 0, "R");

	$xxx = "999999999999"; $_marca = ""; $_monto += $row["peddet_pretot"]*1;
	for ( $_i=1; $_i<=200; $_i++ ) {
		$_campo = "vv" . fnZerosLeft($_i, 3);
		if ( $row[$_campo] == "1" ) {
			$aFlga[$_i] = "0";
			$aBupr[$_i] = "0";
			$preuni = "pu" . fnZerosLeft($_i, 3);
			if ( $row[$preuni]*1 > 0 ) {
				if ( $row[$preuni]*1 <= $xxx*1 ) {
					$xxx = $row[$preuni]*1;
					$aFlga[$_i] = "1";
				}
			}
			$buenapro = "bp" . fnZerosLeft($_i, 3); $mm = "mm" . fnZerosLeft($_i, 3);
			if ( $row[$buenapro]*1 > 0 ) { $aBupr[$_i] = $row[$buenapro]; $_marca = $row[$mm];};
		} else {
			break;
		}
	}
	$pdf->Cell(15, $pdf->h_row, substr($_marca,0,10), 1, 0, "L");

	for ( $_i=1; $_i<=200; $_i++ ) {
		$_campo = "vv" . fnZerosLeft($_i, 3);
		if ( $row[$_campo] == "1" ) {
			if ( $_nro == "1" ) { $aPretot[] = 0; $aBuenapro[] = 0; }
			$preuni = "pu" . fnZerosLeft($_i, 3);
			if ( $row[$preuni]*1 > 0 ) {
				$pretot = "tt" . fnZerosLeft($_i, 3);
				$aPretot[$_i] = $row[$pretot]*1 + $aPretot[$_i]*1;
				$bold    = ( $row[$preuni] == $xxx ? "B" : ""); //( $aFlga[$_i] == "1" ? "B" : "");
				if ( $bold == "B" ) { $pdf->SetFont("helvetica", "B", 5); }
				else                { $pdf->SetFont("helvetica", "", 5); }
				if ( $aBupr[$_i]*1 > 0 ) {
					$relleno = "1";
					$aBuenapro[$_i] = $row[$pretot]*1 + $aBuenapro[$_i]*1;
					$estado_bp = "1";
				} else {
					$relleno = "";
				}

				$pdf->Cell(12, $pdf->h_row, fnNume01($row[$preuni], 4), 1, 0, "R", $relleno);
				$pdf->Cell(12, $pdf->h_row, fnNume01($row[$pretot], 2), 1, 0, "R", $relleno);
			} else {
				$pdf->Cell(12, $pdf->h_row, "", 1, 0, "R");
				$pdf->Cell(12, $pdf->h_row, "", 1, 0, "R");
			}
		} else {
			break;
		}
	}
}

$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
$pdf->SetFont("helvetica", "B", 5);
$pdf->Cell(134, 4, "Total Importe de Requerimiento ", 0, 0, "R");
$pdf->Cell(13, 4, fnNume01($_monto,2), 1, 0, "R");
$pdf->Cell(27, 4, "Total Cotización ", "T", 0, "R");    

$pdf->SetFont("helvetica", "", 5);
$nn = count($aPretot) - 1;
for ( $i=1; $i<=$nn; $i++ ) {
	if ($i != "1" ) { $pdf->Cell(12,  4, "", "T", 0, "R"); }
	$pdf->Cell(12,  4, fnNume01($aPretot[$i],2), 1, 0, "R");
}

if ( $estado_bp != "" ) {
	$pdf->eje_y += $pdf->h_row + 2;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont("helvetica", "B", 5);    
	$pdf->Cell(171, 4, "Total Buena Pro", 0, 0, "R");
	$pdf->Cell(3,  4, "", "", 0, "R");

	for ( $i=1; $i<=$nn; $i++ ) {
		if ( fnNume01($aBuenapro[$i],2) == "" ) { 
			$pdf->Cell(24,  4, "", "", 0, "R");
		} else {
			$pdf->Cell(12,  4, fnNume01($aBuenapro[$i],2), 1, 0, "R", 1);
			$pdf->Cell(12,  4, "", "", 0, "R");
		}
	}

	$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->SetFont("helvetica", "", 6);
	$pdf->Cell(171, 4, "+Criterios de evalucación para otorgar la Buena Pro: Propuesta Económica (100%), Vigencia Tecnologica (de ser el caso)", 0, 0, "L");

	$pdf->eje_y += 4;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
	$pdf->Cell(171, 4, "+Teniendo como base los criterios anteriores se otorga la Buena Pro a:", 0, 0, "L");

	$ob = new Logistics_Buena_Pro();
	$ob->setPed_key( $_REQUEST["xxPed_key"] );
	$ob->setType_record("printer_comparative");
	$ob->setType_query("printer_comparative");
	$_abp = $ob->registros();
	foreach ( $_abp as $row ) {
		$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );

		$pdf->Cell(17, 4, $row["coti_documento"],  1, 0, "L");
		$pdf->Cell(15, 4, fnDateDDMMAAAA($row["coti_fecha"]), 1, 0, "C");
		$pdf->Cell(18, 4, fnNume01($row["coti_monto"], 2), 1, 0, "R");
		$pdf->Cell(16, 4, $row["bp_documento"], 1, 0, "L");
		$pdf->Cell(15, 4, fnDateDDMMAAAA($row["bp_fecha"]), 1, 0, "C");
		$pdf->Cell(18, 4, fnNume01($row["bp_monto"], 2), 1, 0, "R", 1);
		$pdf->Cell(18, 4, $row["pers_ruc"], 1, 0, "C");
		$pdf->Cell(93, 4, $row["pers_nombre"], 1, 0, "L");
		if ($row["bp_observ"] != ""){
			$pdf->eje_y += $pdf->h_row;  $pdf->fnNuevaPagina();  $pdf->fnEstablecerEjes( $pdf->eje_y, $pdf->eje_x );
			$pdf->MultiCell(200, 2.5, $row["bp_observ"], "","L", "");
			$pdf->eje_y = $pdf->getY()-$pdf->h_row+1;
		}
	}
}

ob_end_clean(); $pdf->output("cuadro_comparativo.pdf","I");