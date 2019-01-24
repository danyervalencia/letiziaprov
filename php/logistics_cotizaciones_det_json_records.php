<?php
require_once "db/logistics_cotizaciones_det.php";
$ob = new Logistics_Cotizaciones_Det();
$ob->setCotidet_item( $_POST["xxCotidet_item"] == "" ? "0" : $_POST["xxCotidet_item"] );
$ob->setCoti_key( $_POST["xxCoti_key"] );
$ob->setBs_key( $_POST["xxBs_key"] );
$ob->setBst_id( $_POST["xxBst_id"] == "" ? "0" : $_POST["xxBst_id"] );
$ob->setBsg_id( $_POST["xxBsg_id"] == "" ? "0" : $_POST["xxBsg_id"] );
$ob->setBsc_id( $_POST["xxBsc_id"] == "" ? "0" : $_POST["xxBsc_id"] );
$ob->setBsf_id( $_POST["xxBsf_id"] == "" ? "0" : $_POST["xxBsf_id"] );
$ob->setType_record( $_POST["xxType_record"] );
$ob->setType_query( $_POST["xxType_query"] );
if( $_POST["sort"] == "" ){ $ob->setOrder_by( $_POST["xxOrder_by"] );
}else{ $_sort = json_decode(stripslashes($_REQUEST["sort"]),true);
	$ob->setOrder_by( $_sort[0]["property"]." ".$_sort[0]["direction"] );
}

if ( $_POST["xxPag"] == "1" ) {
	 $ob->setRecord_limit("");
	 $ar = $ob->registros();
	 foreach ( $ar as $row ) { $_total = $row["treg"]; }

	 $ob->setRecord_limit( $_POST["limit"] );  
	 $ob->setRecord_start( $_POST["start"] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST["xxType_record"] == "grd" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("cotidet_item"=>$row["cotidet_item"], "cotidet_cantid"=>$row["cotidet_cantid"], "cotidet_preuni"=>$row["cotidet_preuni"], "cotidet_pretot"=>$row["cotidet_pretot"], "cotidet_marca"=>$row["cotidet_marca"], "cotidet_modelo"=>$row["cotidet_modelo"],
						"bs_nombre"=>$row["bs_nombre"], "bs_codigo"=>$row["bs_codigo"], "unimed_nombre"=>$row["unimed_nombre"], "espedet_codigo"=>$row["espedet_codigo"]);
	}
} else if ( $_POST["xxType_record"] == "form" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("cotidet_id"=>$row["cotidet_id"], "cotidet_item"=>$row["cotidet_item"], "cotidet_cantid"=>$row["cotidet_cantid"], "cotidet_preuni"=>$row["cotidet_preuni"], "cotidet_pretot"=>$row["cotidet_pretot"],
						"bs_key"=>$row["bs_key"], "bs_nombre"=>$row["bs_nombre"], "bs_codigo"=>$row["bs_codigo"], "unimed_nombre"=>$row["unimed_nombre"]);
	}
} else if ( $_POST["xxType_record"] == "winLCE" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("cotidet_item"=>$row["cotidet_item"], "cotidet_cantid"=>$row["cotidet_cantid"], "cotidet_preuni"=>$row["cotidet_preuni"], "cotidet_pretot"=>$row["cotidet_pretot"], "cotidet_marca"=>$row["cotidet_marca"], "cotidet_modelo"=>$row["cotidet_modelo"],
						"peddet_key"=>$row["peddet_key"], "bs_key"=>$row["bs_key"], "bs_nombre"=>$row["bs_nombre"], "bs_codigo"=>$row["bs_codigo"], "unimed_nombre"=>$row["unimed_nombre"]);
	}
}

echo json_encode(array("success"=>1, "total"=>$lnTreg, "data"=>$_dat));