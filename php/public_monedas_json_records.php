<?php
session_start();
require_once 'db/public_monedas.php';

$ob = new Public_Monedas();
$ob->setMone_id( $_POST['xxMone_id'] == '' ? '0' : $_POST['xxMone_id'] );
$ob->setMone_nombre( $_POST['xxMone_nombre'] );
$ob->setMone_abrev( $_POST['xxMone_abrev'] );
$ob->setTipmon_id( $_POST['xxTipmon_id'] == '' ? '0' : $_POST['xxTipmon_id'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('mone_id' => '0', 'mone_nombre' => ''); }
	foreach ( $ar as $row ) {
	    $_dat[] = array('mone_id' => $row['mone_id'], 'mone_nombre' => $row['mone_nombre']);
	}
} else if ( $_POST['xxType_record'] == 'combo_abrev' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('mone_id' => '0', 'mone_abrev' => ''); }
	foreach ( $ar as $row ) {
	    $_dat[] = array('mone_id' => $row['mone_id'], 'mone_abrev' => $row['mone_abrev']);
	}
} else {
}

echo json_encode( array('success' => true,  'total' => $_total, 'data' => $_dat) );
?>