<?php
session_start();
//if ( $_SESSION["sysreq"]  != 'OK' ) { exit; }
require_once 'db/public_paises.php';

$ob = new Public_Paises();
$ob->setPais_id( $_POST['xxPais_id'] == '' ? '0' : $_POST['xxPais_id'] );
$ob->setPais_nombre( $_POST['xxPais_nombre'] );
$ob->setPais_code( $_POST['xxPais_code'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

$_dat = array();
$ar = $ob->registros();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ($_POST['xxAdd_blank'] == 'YES') { $_dat[] = array('pais_id' => '0',  'pais_nombre' => ''); }
	foreach ( $ar as $row ) {
	    $_dat[] = array('pais_id' => $row['pais_id'],  'pais_nombre' => $row['pais_nombre']);
	}
} else if ( $_POST['xxType_record'] == 'combo_abrev02' ) {
	foreach ( $ar as $row ) {
	    $_dat[] = array('pais_id' => $row['pais_id'],  'pais_abrev02' => $row['pais_abrev02']);
	}
} else {
	foreach ( $ar as $row ) {
	    $_dat[] = array('pais_id'      => $row['pais_id'],       'pais_nombre' => $row['pais_nombre'],  'pais_abrev02' => $row['pais_abrev02'],
	    	            'pais_abrev03' => $row['pais_abrev03'],  'pais_code'   => $row['pais_code']);
	}
}

echo json_encode( array('success' => '1', 'total' => $_total, 'data' => $_dat) );
?>