<?php
session_start();

if ( $_SESSION["sysreq"]  != "OK" ) {
    echo "<label class='lbl0304'>Usuario &nbsp; NO &nbsp; tiene registra session de acceso, vuelva a registrarse</label>";
    exit;
}

$_ANO_EJE  = $_SESSION["scAno_eje"];
$_PERS_ID  = $_SESSION["scPers_id"];
$_PERS_KEY = $_SESSION["scPers_key"];
$_PERS_RUC = $_SESSION["scPers_ruc"];
if ( $_PERS_KEY == "" || strlen($_PERS_KEY) != 32 || $_PERS_RUC == "" ) {
    $_ANO_EJE  = "";
    $_PERS_ID  = "";
    $_PERS_KEY = "";
    $_PERS_RUC = "";
    echo "<label class='lbl0304'>Usuario &nbsp; NO &nbsp; registra sessi&oacute;n de acceso, vuelva a registrarse</label>";
    exit;
}
?>