<?php
session_start();
if( $_REQUEST["vs"] == "" ){
	$_PERSSESS_KEY = $_REQUEST["zzPerssess_key"];
	$_PERSACCE_KEY = $_REQUEST["zzPersacce_key"];
	$_PERS_KEY = $_REQUEST["zzPers_key"];
	$_UNIEJE_KEY = $_REQUEST["zzUnieje_key"];
}else{
	if (get_magic_quotes_gpc() == 1){$_vs=json_decode(stripslashes($_REQUEST["vs"]),true);}
	else{$_vs=json_decode($_REQUEST["vs"],true);}
	$_PERSSESS_KEY = $_vs["ps"];
	$_PERSACCE_KEY = $_vs["pa"];
	$_PERS_KEY = $_vs["p"];
	$_UNIEJE_KEY = $_vs["ue"];	
}

// nv: No Verifica, asi tenemos entonces ( $_REQUEST["nvUsuracce_key"] tiene cualquier valor, no verificara la sesion usurace_key)
if($_SESSION["scLetiziapro"]!=="OK"){$result["msg"] = "Proveedor &nbsp; NO &nbsp; tiene registra session de acceso, vuelva a registrarse";}
else if($_REQUEST["nvPerssess_key"]=="" && $_PERSSESS_KEY!==$_SESSION["scPerssess_key"]){$result["msg"] = "Proveedor intruso [PPPSSS-KEY]";}
else if($_REQUEST["nvPersacce_key"]=="" && $_PERSACCE_KEY!==$_SESSION["scPersacce_key"]){$result["msg"] = "Proveedor intruso [PPPAAA-KEY]";}
else if($_REQUEST["nvPers_key"]=="" && $_PERS_KEY!==$_SESSION["scPers_key"]){$result["msg"] = "Proveedor intruso [PPPPPP-KEY]";}
else if($_REQUEST["nvUnieje_key"]=="" && $_UNIEJE_KEY!==$_SESSION["scUnieje_key"]){$result["msg"] = "Proveedor intruso [UUUEEE-KEY]";} 
else{
	if($_PERSSESS_KEY=="" || $_PERSACCE_KEY=="" || $_PERS_KEY=="" || $_UNIEJE_KEY==""){$result["msg"] = "Session de Trabajo acaba de caducar, vuelva a ingresar al sistema.";}
	else{$result["success"] = true;}
}