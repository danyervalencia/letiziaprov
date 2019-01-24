<?php
session_start();
require_once 'db/public_tipos_pago.php';

$ob = new Public_Tipos_Pago();
$ob->setTippag_id( $_POST['xxTippag_id'] == '' ? '0' : $_POST['xxTippag_id'] );
$ob->setTippag_nombre( $_POST['xxTippag_nombre'] );
$ob->setTippag_abrev( $_POST['xxTippag_abrev'] );
$ob->setTippag_escompra( $_POST['xxTippag_escompra'] );
$ob->setTippag_esventa( $_POST['xxTippag_esventa'] );
$ob->setTippag_escobro( $_POST['xxTippag_escobro'] );
$ob->setTippag_espago( $_POST['xxTippag_espago'] );
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
if ( $_POST['xxType_record'] == 'cbo' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('tippag_id' => '0',  'tippag_nombre' => ''); }
	foreach ( $ar as $row ) {
	    $_dat[] = array('tippag_id' => $row['tippag_id'],  'tippag_nombre' => $row['tippag_nombre']);
	}
} else {
	foreach ( $ar as $row ) {
	    $_dat[] = array('tippag_id'     => $row['tippag_id'],      'tippag_flga'  => $row['tippag_flga'],
	    	            'tippag_nombre' => $row['tippag_nombre'],  'tippag_abrev' => $row['tippag_abrev'],  'tippag_estado' => $row['tippag_estado'] );
	}
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat) );
?>