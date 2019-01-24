<?php
if($_POST["xxMenu_id"] !== ""){
	require_once "session_validate.php";
	if($result["success"] == false){echo json_encode($result); exit;}
}

require_once "db/logistics_pedidos.php";
$ob = new Logistics_Pedidos();
$ob->setPed_key( $_POST["xxPed_key"] );
$ob->setYear_id( $_POST["xxYear_id"] == "" ? "0" : $_POST["xxYear_id"] );
$ob->setDoc_id( $_POST["xxDoc_id"] == "" ? "0" : $_POST["xxDoc_id"] );
$ob->setTipped_id( $_POST["xxTipped_id"] == "" ? "0" :  $_POST["xxTipped_id"] );
$ob->setPed_nro( $_POST["xxPed_nro"] == "" ? "0" :  $_POST["xxPed_nro"] );
$ob->setFechaini( $_POST["xxFechaini"] );
$ob->setFechafin( $_POST["xxFechafin"] );
$ob->setUnieje_key( $_POST["xxUnieje_key"] );
$ob->setArea_key( $_POST["xxArea_key"] );
$ob->setTarea_key( $_POST["xxTarea_key"] );
$ob->setMeta_id( $_POST["xxMeta_id"] == "" ? "0" :  $_POST["xxMeta_id"] );
$ob->setFuefin_id( $_POST["xxFuefin_id"] == "" ? "0" :  $_POST["xxFuefin_id"] );
$ob->setTiprecur_id( $_POST["xxTiprecur_id"] == "" ? "0" :  $_POST["xxTiprecur_id"] );
$ob->setPerssess_key( $_PERSSESS_KEY );
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
if ( $_POST["xxType_record"] == "down_file" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("ped_key"=>$row["ped_documento"], "pedettr_key"=>$row["pedettr_key"], "pedettr_file2"=>$row["pedettr_file2"]);
	}
} else if ( $_POST["xxType_record"] == "grd" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("ped_documento"=>$row["ped_documento"], "ped_fecha"=>$row["ped_fecha"], "ped_key"=>$row["ped_key"], 
						"tipped_abrev"=>$row["tipped_abrev"], "area_abrev"=>$row["area_abrev"], "tarea_codigo"=>$row["tarea_codigo"], "pedettr_file"=>$row["pedettr_file"], "pedweb_fechafin"=>$row["pedweb_fechafin"], "coti_key"=>$row["coti_key"]);
	}
} else if ( $_POST["xxType_record"] == "titleETTR" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("ped_title"=>$row["ped_title"]);
	}
} else if ( $_POST["xxType_record"] == "win" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("ped_documento"=>$row["ped_documento"], "ped_fecha"=>$row["ped_fecha"], "ped_monto"=>$row["ped_monto"], "ped_key"=>$row["ped_key"], 
						"area_nombre"=>$row["area_nombre"], "secfunc_codename"=>$row["secfunc_codename"], "tarea_codename"=>$row["tarea_codename"], "fuefin_codename"=>$row["fuefin_codename"], "tiprecur_codename"=>$row["tiprecur_codename"]);
	}
} else if ( $_POST["xxType_record"] == "winLCE" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("ped_documento"=>$row["ped_documento"], "tipped_id"=>$row["tipped_id"], "ped_fecha"=>$row["ped_fecha"], "ped_monto"=>$row["ped_monto"], "ped_key"=>$row["ped_key"], "pedweb_fechafin"=>$row["pedweb_fechafin"],
						"area_nombre"=>$row["area_nombre"], "secfunc_codename"=>$row["secfunc_codename"], "tarea_codename"=>$row["tarea_codename"], "fftr_codename"=>$row["fftr_codename"], "lugentr_id"=>$row["lugentr_id"]);
	}
}

echo json_encode(array("success"=>true, "total"=>$_total, "subtotal"=>count($_dat), "data"=>$_dat));