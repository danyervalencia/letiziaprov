<?php
session_start();

if ( $_SESSION["sysreq"]  != "OK" ) {
    echo "<label class='lbl0304'>Usuario &nbsp; NO &nbsp; tiene registra session de acceso, vuelva a registrarse</label>";
    exit;
}

$_ANO_EJE  = "";
$_SEC_EJEC = "";
$_PERS_ID  = "";
$_PERS_KEY = "";
$_PERS_RUC = "";
$_USURACCE_ID  = "";
$_USURACCE_KEY = "";
if ( $_SESSION["scPers_ruc"] != "" ) {
    $_ANO_EJE  = $_SESSION["scAno_eje"];
    $_SEC_EJEC = $_SESSION["scSec_ejec"];
    $_PERS_ID  = $_SESSION["scPers_id"];
    $_PERS_KEY = $_SESSION["scPers_key"];
    $_PERS_RUC = $_SESSION["scPers_ruc"];
} else if ( $_SESSION["scUsuracce_key"] != "" ) {
    $_ANO_EJE      = $_SESSION["scAno_eje"];
    $_SEC_EJEC     = $_SESSION["scSec_ejec"];
    $_USURACCE_ID  = $_SESSION["scUsuracce_id"];
    $_USURACCE_KEY = $_SESSION["scUsuracce_key"];
} else {
    echo "<label class='lbl0304'>Usuario &nbsp; NO &nbsp; registra sessi&oacute;n de acceso y/o la sesion ha caducado, vuelva a registrarse</label>";
    exit;
}
?>