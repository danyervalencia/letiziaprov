<?php
require_once "db/logistics_pedidos_det.php";
$ob = new Logistics_Pedidos_Det();
$ob->setPeddet_item( $_POST["xxPeddet_item"] == "" ? "0" : $_POST["xxPeddet_item"] );
$ob->setEspedet_id( $_POST["xxEspedet_id"] == "" ? "0" : $_POST["xxEspedet_id"] );
$ob->setPed_key( $_POST["xxPed_key"] );
$ob->setYear_id( $_POST["xxYear_id"] == "" ? "0" : $_POST["xxYear_id"] );
$ob->setDoc_id( $_POST["xxDoc_id"] == "" ? "0" : $_POST["xxDoc_id"] );
$ob->setTipped_id( $_POST["xxTipped_id"] == "" ? "0" : $_POST["xxTipped_id"] );
$ob->setArea_key( $_POST["xxArea_key"] );
$ob->setTarea_key( $_POST["xxTarea_key"] );
$ob->setMeta_id( $_POST["xxMeta_id"] == "" ? "0" : $_POST["xxMeta_id"] );
$ob->setFuefin_id( $_POST["xxFuefin_id"] == "" ? "0" : $_POST["xxFuefin_id"] );
$ob->setTiprecur_id( $_POST["xxTiprecur_id"] == "" ? "0" : $_POST["xxTiprecur_id"] );
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
if ( $_POST["xxType_record"] == "form" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("peddet_item"=>$row["peddet_item"], "peddet_cantid"=>$row["peddet_cantid"], "peddet_preuni"=>$row["peddet_preuni"], "peddet_pretot"=>$row["peddet_pretot"], "peddet_detalle"=>$row["peddet_detalle"], "espedet_id"=>$row["espedet_id"], "peddet_key"=>$row["peddet_key"],
						"bs_key"=>$row["bs_key"], "bs_nombre"=>$row["bs_nombre"], "bs_codigo"=>$row["bs_codigo"], "unimed_abrev"=>$row["unimed_abrev"],
						"espedet_codigo"=>$row["espedet_codigo"]);
	}
} else if ( $_POST["xxType_record"] == "gridLPBL" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("peddet_cantid"=>$row["peddet_cantid"], "peddet_preuni"=>$row["peddet_preuni"], "peddet_pretot"=>$row["peddet_pretot"],  "peddet_id"=>$row["peddet_id"],
						"bs_nombre"=>$row["bs_nombre"], "bs_codigo"=>$row["bs_codigo"], "unimed_nombre"=>$row["unimed_nombre"], "espedet_codigo"=>$row["espedet_codigo"]);
	}
} else if ( $_POST["xxType_record"] == "printer" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("peddet_cantid"=>$row["peddet_cantid"], "peddet_preuni"=>$row["peddet_preuni"], "peddet_pretot"=>$row["peddet_pretot"],
						"peddet_inafecto"=>$row["peddet_inafecto"], "ref_id"=>$row["ref_id"],
						"bs_nombre"=>$row["bs_nombre"], "unimed_abrev"=>$row["unimed_abrev"], "bs_codigo"=>$row["bs_codigo"],);
	}
}

echo json_encode(array("success"=>1, "total"=>$_total, "data"=>$_dat));