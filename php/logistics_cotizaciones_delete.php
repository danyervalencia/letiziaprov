<?php
session_start();
$result["success"] = false;
if ( $_POST["xx0010"] !== "YES" ){$result["msg"] = "Usuario intruso no hay permiso de conexión"; echo json_encode($result); exit;}

require_once "session_validate.php";
if ( $result["success"] == false ){echo json_encode($result); exit;}

require_once "db/logistics_cotizaciones.php";
$ob = new Logistics_Cotizaciones();
$ob->setCoti_key( $_POST["xxCoti_key"] );
$ob->setCoti_observ( str_replace(",", "\,", $_POST["xxCoti_observ"]) );
//$ob->setNet_ip( fnGetRealIP() );
$ob->setPersacce_psw2( $_POST["xxPersacce_psw2"] );
$ob->setPerssess_key( $_PERSSESS_KEY );
$ob->setMenu_id( $_POST["xxMenu_id"] );
$ob->eliminar();

if ( substr($ob->getCoti_key(), 0, 10) == "YTLLLL-OVC" ) {
    $result["success"] = true;
    $result["msg"] = "Proceso se ha realizado en forma satisfactoria";
    $result["key"] = substr($ob->getCoti_key(), 10, 32);
}

echo json_encode($result);