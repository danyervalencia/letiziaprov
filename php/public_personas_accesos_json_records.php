<?php
require_once "db/public_personas_accesos.php";

$ob = new Public_Personas_Accesos();
$ob->setPersacce_key( $_POST["xxPersacce_key"] );
$ob->setPersacce_estado( $_POST["xxPersacce_estado"] == "" ? "NULL" : "'".$_POST["xxPersacce_estado"]."'" );
$ob->setPers_ruc( $_POST["xxPers_ruc"] );
$ob->setUnieje_key( $_POST["xxUnieje_key"] );
$ob->setType_record( $_POST["xxType_record"] );
$ob->setType_query( $_POST["xxType_query"] );
$ob->setOrder_by( $_POST["xxOrder_by"] );

if ( $_POST["xxPaginate"] == "1" ) {
	 $ob->setRecord_limit("");
	 $ar = $ob->registros();
	 foreach ( $ar as $row ) { $_total = $row["treg"]; }

	 $ob->setRecord_limit( $_REQUEST["limit"] );  
	 $ob->setRecord_start( $_REQUEST["start"] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST["xxType_record"] == "access_login" ) {
	foreach ( $ar as $row ) {
		$_dat[] = array("unieje_key"=>$row["unieje_key"], "unieje_abrev"=>$row["unieje_abrev"]);
	}
}

echo json_encode( array("success"=>1, "total"=>$lnTreg, "data"=>$_dat) );
?>