<?php
require_once "session_validate.php";
if ( $result["success"] == false ) { echo json_encode($result);  exit; }

require_once "db/logistics_cotizaciones.php";
$ob = new Logistics_Cotizaciones();
$ob->setCoti_id( $_POST["xxCoti_id"] == "" ? "0" : $_POST["xxCoti_id"] );
$ob->setCoti_key( $_POST["xxCoti_key"] );
$ob->setYear_id( $_POST["xxYear_id"] == "" ? "0" : $_POST["xxYear_id"] );
$ob->setTipcoti_id( $_POST["xxTipcoti_id"] == "" ? "0" :  $_POST["xxTipcoti_id"] );
$ob->setCoti_nro( $_POST["xxCoti_nro"] == "" ? "0" :  $_POST["xxCoti_nro"] );
$ob->setFechaini( $_POST["xxFechaini"] );
$ob->setFechafin( $_POST["xxFechafin"] );
$ob->setUnieje_key( $_UNIEJE_KEY );
$ob->setPed_key( $_POST["xxPed_key"] );
$ob->setArea_key( $_POST["xxArea_key"] );
$ob->setMeta_id( $_POST["xxMeta_id"] == "" ? "0" :  $_POST["xxMeta_id"] );
$ob->setPers_key( $_PERS_KEY );
$ob->setMenu_id( $_POST["xxMenu_id"] == "" ? "0" :  $_POST["xxMenu_id"] );
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

	 $ob->setRecord_limit( $_REQUEST["limit"] );  
	 $ob->setRecord_start( $_REQUEST["start"] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST["xxType_record"] == "form" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("tipcoti_id"=>$row["tipcoti_id"], "coti_nro"=>$row["coti_nro"], "coti_fecha"=>$row["coti_fecha"], "coti_monto"=>$row["coti_monto"],
						"coti_vigencia"=>$row["coti_vigencia"], "coti_plazo"=>$row["coti_plazo"], "coti_garantia"=>$row["coti_garantia"], "tippag_id"=>$row["tippag_id"], "lugentr_id"=>$row["lugentr_id"], "coti_observ"=>$row["coti_observ"], "coti_key"=>$row["coti_key"],
						"pers_key"=>$row["pers_key"], "pers_ruc"=>$row["pers_ruc"],  "pers_nombre"=>$row["pers_nombre"],  
						"ped_fecha"=>$row["ped_fecha"], "ped_documento"=>$row["ped_documento"], "area_nombre"=>$row["area_nombre"], "meta_codename"=>$row["meta_codename"], "tarea_codename"=>$row["tarea_codename"]);
	}
} else if ( $_POST["xxType_record"] == "grd" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("coti_flga"=>$row["coti_flga"], "coti_fecha"=>$row["coti_fecha"], "coti_monto"=>$row["coti_monto"], "coti_plazo"=>$row["coti_plazo"], "coti_vigencia"=>$row["coti_vigencia"], "coti_documento"=>$row["coti_documento"], "coti_key"=>$row["coti_key"], "tipcoti_code"=>$row["tipcoti_code"],
						"doc_abrev"=>$row["doc_abrev"], "lugentr_nombre"=>$row["lugentr_nombre"], "bp_fecha"=>$row["bp_fecha"], "bp_monto"=>$row["bp_monto"],
						"ped_key"=>$row["ped_key"], "ped_documento"=>$row["ped_documento"], "tipped_abrev"=>$row["tipped_abrev"], "area_abrev"=>$row["area_abrev"], "tarea_codigo"=>$row["tarea_codigo"], "fftr_codigo"=>$row["fftr_codigo"], "pedweb_fechafin"=>$row["pedweb_fechafin"]);
	}
} else if ( $_POST["xxType_record"] == "save_ok" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("coti_key"=>$row["coti_key"], "coti_documento"=>$row["coti_documento"], "doc_nombre"=>$row["doc_nombre"]);
	}
} else if ( $_POST["xxType_record"] == "win" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("coti_documento"=>$row["coti_documento"], "coti_fecha"=>$row["coti_fecha"], "coti_monto"=>$row["coti_monto"], "coti_key"=>$row["coti_key"], 
						"area_nombre"=>$row["area_nombre"], "secfunc_codename"=>$row["secfunc_codename"], "tarea_codename"=>$row["tarea_codename"], "fuefin_codename"=>$row["fuefin_codename"], "tiprecur_codename"=>$row["tiprecur_codename"]);
	}
}

echo json_encode(array("success"=>true, "total"=>$_total, "subtotal"=>count($_dat), "data"=>$_dat));