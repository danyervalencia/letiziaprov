<?php
ini_set("session.cookie_lifetime","115200");
ini_set("session.gc_maxlifetime","115200");
session_start(); session_unset(); session_regenerate_id(true); //session_destroy();
$result = array();  $result["success"] = false;

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
if($_POST["xx0005"] !== "YES"){$result["msg"] = "Usuario intruso no hay permiso de conexión"; echo json_encode($result); exit;}
else if($_POST["xxPers_ruc"] == ""){$result["msg"] = "No se ha establecido el RUC del proveedor"; echo json_encode($result); exit;}
else if($_POST["xxUnieje_key"] == ""){$result["msg"] = "No se ha establecido el la Unidad Ejecturoa"; echo json_encode($result); exit;}
else if($_POST["xxPersacce_login"] == ""){$result["msg"] = "No se ha establecido el LOGIN del Proveedor"; echo json_encode($result); exit;}
else if( $_POST["xxPersacce_psw1"] == ""){$result["msg"] = "No se ha establecido la CLAVE del proveedor"; echo json_encode($result); exit;}

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
require_once "classes/Mobile_Detect.php";
$detect = new Mobile_Detect();

if ( $detect->isMobile() ) {
	if ($detect->isTablet()) {  
		$_device = "4"; $_type = $detect->getTabletDevices();  $_browser = $detect->getBrowsers();
	} else {     
	   $_device = "3";  $_type = $detect->getPhoneDevices();  $_browser = $detect->getBrowsers();
	}
} else { 
	require_once "classes/browser_class_inc.php";
	$br = new browser();
	$br->whatBrowser();
	$_device = "1";  $_type = "";  $_browser = $br->browsertype ." - ". $br->version;
}

//echo var_dump($br);
//echo $_SERVER["HTTP_USER_AGENT"];
/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
require_once "resources/functions.php";
require_once "db/public_personas.php";
$ob = new Public_Personas();
$ob->setPers_ruc( $_POST["xxPers_ruc"] );
$ob->setType_record("validate_access");
$ob->setOrder_by("pers_key");
$_pp = $ob->registros();
if(count($_pp) !== 1 ){$result["msg"] = "Proveedor no registrado en el sistema, segun número de RUC"; echo json_encode($result); exit;}

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
require_once "db/public_personas_accesos.php";
$ob = new Public_Personas_Accesos();
$ob->setPers_key( $_pp[0]["pers_key"] );
$ob->setUnieje_key( $_POST["xxUnieje_key"] );
$ob->setPersacce_estado("'1'");
$ob->setType_record("validate_access");
$ob->setOrder_by("persacce_key");
$_ppa = $ob->registros();
if(count($_ppa) !== 1){$result["msg"]="Proveedor NO autorizado en el sistema"; echo json_encode($result); exit;} 
else if($_ppa[0]["persacce_login"] !== $_POST["xxPersacce_login"]){$result["msg"] = "Login de proveedor es Inválido, vuelva intentarlo "; echo json_encode($result); exit;} 
else if( $_ppa[0]["persacce_psw1"] !== $_POST["xxPersacce_psw1"]){$result["msg"] = "Clave editada es Inválida, vuelva intentarlo "; echo json_encode($result); exit;}

/*$_fecha = date(Y.'-'.m.'-'.d);
if ( !fnDatesRange($_fecha, $_ppa[0]['persacce_fechaini'], $_ppa[0]['persacce_fechafin']) ) {
	$result['msg'] = 'Acceso no permitido para proveedor segun la fecha registrada en el Sistema';
	echo json_encode($result);  exit;
} */

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
require_once "db/public_personas_session.php";
$ob = new Public_Personas_Session();
$ob->setType_edit("1");
$ob->setPhp_session_id( session_id() );
$ob->setPerssess_ip( fnGetRealIP() );
$ob->setPerssess_device( $_device );
$ob->setPerssess_type( $_type );
$ob->setPerssess_so( $browser->platform );
$ob->setPerssess_browser( $_browser );
$ob->setPersacce_id( $_ppa[0]["persacce_id"] );
$ob->setPers_id( $_ppa[0]["pers_id"] );
$ob->setUnieje_id( $_ppa[0]["unieje_id"] );
$ob->setPersacce_login( $_POST["xxPersacce_login"] );
$ob->setPersacce_psw1( $_POST["xxPersacce_psw1"] );
$ob->actualiza();

$_success = false;
$perssess_key = $ob->getPerssess_key();
if ( substr($perssess_key,0,10) !== "YTLLLL-OVC" ) {
	$_msg = "Error del sistema al crear Session de Usuario, consulte con el Adminsitrador";
} else {
	$_success = true;  $_msg = "Acceso de usuario autorizado";
	$_SESSION["scLetiziapro"] = "OK";
	$_SESSION["scPerssess_key"] = substr($perssess_key, 10, 32);
	$_SESSION["scPersacce_key"] = $_ppa[0]["persacce_key"];
	$_SESSION["scPers_key"] = $_ppa[0]["pers_key"];
	$_SESSION["scUnieje_key"] = $_ppa[0]["unieje_key"];
	$_dat[] = array("perssess_key"=>substr($perssess_key,10,32), "persacce_key"=>$_ppa[0]["persacce_key"], "pers_key"=>$_ppa[0]["pers_key"], "unieje_key"=>$_ppa[0]["unieje_key"], 
					"pers_ruc"=>$_ppa[0]["pers_ruc"], "pers_nombre"=>$_ppa[0]["pers_nombre"], "unieje_nombre"=>$_ppa[0]["unieje_nombre"], "unieje_logo"=>$_ppa[0]["unieje_logo"],
					"date_server"=>fnDateLetters(date("w"), date("d"), date("n")-1, date("Y")));
}

echo json_encode( array("success"=>$_success, "msg"=>$_msg, "data"=>$_dat) );