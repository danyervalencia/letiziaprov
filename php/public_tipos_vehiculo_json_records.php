<?php
session_start();
//require_once CON . DIRECTORY_SEPARATOR . "session_validate_interno.php";
require_once 'db/public_tipos_vehiculo.php';

$ob = new Public_Tipos_Vehiculo();
$ob->setTipveh_id( $_POST['xxTipveh_id'] == '' ? '0' : $_POST['xxTipveh_id'] );
$ob->setTipveh_nombre( $_POST['xxTipveh_nombre'] );
$ob->setTipveh_abrev( $_POST['xxTipveh_abrev'] );
$ob->setTipveh_estado( $_POST['xxTipveh_estado'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

if ( $_POST['xxPaginate'] == '1' ) {
    $ob->setRecord_limit('');
    $ar = $ob->registros();
    foreach ( $ar as $row ) { $_total = $row['treg']; }

    $ob->setRecord_limit( $_POST['limit'] );  
    $ob->setRecord_start( $_POST['start'] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('tipveh_id' => '0',  'tipveh_nombre' => ''); }
	foreach ( $ar as $row ) {
	    $_dat[] = array('tipveh_id' => $row['tipveh_id'],  'tipveh_nombre' => $row['tipveh_nombre']);
	}
} else {
	foreach ( $ar as $row ) {
	    $_dat[] = array('tipveh_id'     => $row['tipveh_id'],      'tipveh_flga'  => $row['tipveh_flga'],
	    	            'tipveh_nombre' => $row['tipveh_nombre'],  'tipveh_abrev' => $row['tipveh_abrev'],  'tipveh_estado' => $row['tipveh_estado'] );
	}
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat) );
?>