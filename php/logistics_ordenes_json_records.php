<?php
require_once "session_validate.php";
if ( $result["success"] == false ) { echo json_encode($result); exit; }

require_once "db/logistics_ordenes.php";
$ob = new Logistics_Ordenes();
$ob->setOrden_key( $_POST["xxOrden_key"] );
$ob->setYear_id( $_POST["xxYear_id"] == "" ? "0" : $_POST["xxYear_id"] );
$ob->setDoc_id( $_POST["xxDoc_id"] == "" ? "0" : $_POST["xxDoc_id"] );
$ob->setOrden_nro( $_POST["xxOrden_nro"] == "" ? "0" : $_POST["xxOrden_nro"] );
$ob->setFechaini( $_POST["xxFechaini"] );
$ob->setFechafin( $_POST["xxFechafin"] );
$ob->setArea_key( $_POST["xxArea_key"] );
$ob->setMeta_id( $_POST["xxMeta_id"] == "" ? "0" : $_POST["xxMeta_id"] );
$ob->setFuefin_id( $_POST["xxFuefin_id"]*1 <= 0 ? "0" : $_POST["xxFuefin_id"] );
$ob->setTiprecur_id( $_POST["xxTiprecur_id"]*1 <= 0 ? "0" : $_POST["xxTiprecur_id"] );
$ob->setLugentr_id( $_POST["xxLugentr_id"]*1 <= 0 ? "0" : $_POST["xxLugentr_id"] );
$ob->setExpe_nro( $_POST["xxExpe_nro"] == "" ? "0" : $_POST["xxExpe_nro"] );
$ob->setPers_key( $_PERS_KEY == "" ? "__" : $_PERS_KEY );
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
if ( $_POST["xxType_record"] == "form_expediente" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("orden_fecha"=>$row["orden_fecha"], "orden_fechanotif"=>$row["orden_fechanotif"], "orden_monto"=>$row["orden_monto"], "orden_percep"=>$row["orden_percep"], "expe_nro"=>$row["expe_nro"], "orden_key"=>$row["orden_key"], "orden_documento"=>$row["orden_documento"],
						"area_nombre"=>$row["area_nombre"], "secfunc_codename"=>$row["secfunc_codename"], "tarea_codename"=>$row["tarea_codename"], "fuefin_codename"=>$row["fuefin_codename"], "pers_codename"=>$row["pers_codename"], "glosa"=>$row["glosa"]);
	}
} else if ( $_POST["xxType_record"] == "grd" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("orden_flga"=>$row["orden_flga"], "orden_fecha"=>$row["orden_fecha"], "orden_fechanotif"=>$row["orden_fechanotif"], "orden_monto"=>$row["orden_monto"], "orden_percep"=>$row["orden_percep"], "expe_nro"=>$row["expe_nro"], "orden_key"=>$row["orden_key"], "orden_documento"=>$row["orden_documento"],
					    "tiporden_code"=>$row["tiporden_code"], "area_abrev"=>$row["area_abrev"], "tarea_codigo"=>$row["tarea_codigo"], "fftr_codigo"=>$row["fftr_codigo"],
					    "lugentr_nombre"=>$row["lugentr_nombre"]);
	}
} else if ( $_POST["xxType_record"] == "win" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("orden_fecha"=>$row["orden_fecha"], "orden_monto"=>$row["orden_monto"], "orden_percep"=>$row["orden_percep"], "orden_documento"=>$row["orden_documento"],
						"area_nombre"=>$row["area_nombre"], "secfunc_codename"=>$row["secfunc_codename"], "tarea_codename"=>$row["tarea_codename"], "fuefin_codename"=>$row["fuefin_codename"], "tiprecur_codename"=>$row["tiprecur_codename"],
						"pers_codename"=>$row["pers_codename"], "orden_siaf"=>$row["orden_siaf"]);
	}
} else if ( $_POST["xxType_record"] == "win_siaf" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("tablex_fecha"=>$row["tablex_fecha"], "tablex_monto"=>$row["tablex_monto"], "tablex_percep"=>$row["tablex_percep"], "tablex_documento"=>$row["tablex_documento"],
						"area_nombre"=>$row["area_nombre"], "secfunc_codename"=>$row["secfunc_codename"], "tarea_codename"=>$row["tarea_codename"], "fuefin_codename"=>$row["fuefin_codename"],
						"pers_codename"=>$row["pers_codename"]);
	}
}

echo json_encode( array("success"=>true, "total"=>$_total, "subtotal"=>count($_dat), "data"=>$_dat) );
?>