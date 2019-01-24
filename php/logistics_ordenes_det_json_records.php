<?php
require_once "db/logistics_ordenes_det.php";
$ob = new Logistics_Ordenes_Det();
$ob->setOrdendet_item( $_POST["xxOrdendet_item"] == "" ? "0" : $_POST["xxOrdendet_item"] );
$ob->setOrden_key( $_POST["xxOrden_key"] );
$ob->setYear_id( $_POST["xxYear_id"] == "" || $_POST["xxYear_id"]*1 <= 0 ? "0" : $_POST["xxYear_id"] );
$ob->setDoc_id( $_POST["xxDoc_id"] == "" ? "0" : $_POST["xxDoc_id"] );
$ob->setFechaini( $_POST["xxFechaini"] );
$ob->setFechafin( $_POST["xxFechafin"] );
$ob->setTiporden_id( $_POST["xxTiporden_id"] == "" ? "0" :  $_POST["xxTiporden_id"] );
$ob->setArea_key( $_POST["xxArea_key"] );
$ob->setMeta_id( $_POST["xxMeta_id"] == "" ? "0" :  $_POST["xxMeta_id"] );
$ob->setFuefin_id( $_POST["xxFuefin_id"] == "" ? "0" :  $_POST["xxFuefin_id"] );
$ob->setTiprecur_id( $_POST["xxTiprecur_id"] == "" ? "0" :  $_POST["xxTiprecur_id"] );
$ob->setPers_key( $_POST["xxPers_key"] );
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
if ( $_POST["xxType_record"] == "grdLOB" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("ordendet_item" => $row["ordendet_item"], "ordendet_detalle" => $row["ordendet_detalle"], "ordendet_cantid" => $row["ordendet_cantid"], "ordendet_preuni" => $row["ordendet_preuni"], "ordendet_pretot" => $row["ordendet_pretot"],
						"bs_nombre" => $row["bs_nombre"], "unimed_nombre" => $row["unimed_nombre"], "bs_codigo" => $row["bs_codigo"], "espedet_codigo" => $row["espedet_codigo"] );
	}
} else if ( $_POST["xxType_record"] == "printer" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("peddet_cantid" => $row["peddet_cantid"], "peddet_preuni" => $row["peddet_preuni"], "peddet_pretot" => $row["peddet_pretot"],
						"peddet_inafecto" => $row["peddet_inafecto"], "ref_id" => $row["ref_id"],
						"bs_nombre" => $row["bs_nombre"], "unimed_abrev" => $row["unimed_abrev"], "bs_codigo" => $row["bs_codigo"],);
	}
}

echo json_encode( array("success"=>1, "total"=>$lnTreg, "data"=>$_dat) );
?>