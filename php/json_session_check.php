<?php
session_start();
require_once "resources/functions.php";
$result["success"] = false; $result["date"] = fnDateLetters(date("w"), date("d"), date("n")-1, date("Y"));
if($_POST["xx0005"] !== "OK"){echo json_encode($result); exit;}

$_perssess_key = $_SESSION["scPerssess_key"];
$_persacce_key = $_SESSION["scPersacce_key"];
$_pers_key = $_SESSION["scPers_key"];
$_unieje_key = $_SESSION["scUnieje_key"];
if($_SESSION["scLetiziapro"] != "OK" || $_perssess_key == "" || $_pers_key == "" || $_unieje_key == ""){echo json_encode($result); exit;}
else{
	require_once "db/public_personas_session.php";
	$ob = new Public_Personas_Session();
	$ob->setPerssess_key( $_perssess_key );
	$ob->setType_record("session_check");
	$ar = $ob->registros();

	if ( $ar[0]["pers_key"] == $_pers_key ) {
		$_dat[] = array("perssess_key"=>$_perssess_key, "persacce_key"=>$ar[0]["persacce_key"], "pers_key"=>$ar[0]["pers_key"], "unieje_key"=>$ar[0]["unieje_key"],
						"pers_nombre"=>$ar[0]["pers_nombre"], "pers_ruc"=>$ar[0]["pers_ruc"], "unieje_nombre"=>$ar[0]["unieje_nombre"], "unieje_logo"=>$ar[0]["unieje_logo"],
						"date_server"=>fnDateLetters(date("w"), date("d"), date("n")-1, date("Y")));
	} else {
		echo json_encode($result); exit;
	}
}

echo json_encode( array("success"=>true, "data"=>$_dat) );