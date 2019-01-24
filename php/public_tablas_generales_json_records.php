<?php
session_start();
require_once 'db/public_tablas_generales.php';

$ob = new Public_Tablas_Generales();
$ob->setTabgen_id( $_POST['xxTabgen_id'] == '' ? '0' : $_POST['xxTabgen_id'] );
$ob->setTabgen_parent( $_POST['xxTabgen_parent'] == '' ? '0' : $_POST['xxTabgen_parent'] );
$ob->setTabgen_nombre( $_POST['xxTabgen_nombre'] );
$ob->setTabgen_abrev( $_POST['xxTabgen_abrev'] );
$ob->setTabgen_estado( $_POST['xxTabgen_estado'] == '' ? 'NULL' : "'".$_POST['xxTabgen_estado']."'" );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('tabgen_id' => '0', 'tabgen_nombre' => ''); }
	foreach ( $ar as $row ) {	
    	$_dat[] = array('tabgen_id' => $row['tabgen_id'], 'tabgen_nombre' => $row['tabgen_nombre']);
	}
} else if ( $_POST['xxType_record'] == 'combo_abrev' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('tabgen_id' => '0', 'tabgen_abrev' => ''); }
	foreach ( $ar as $row ) {	
    	$_dat[] = array('tabgen_id' => $row['tabgen_id'], 'tabgen_abrev' => $row['tabgen_abrev']);
	}
} else if ( $_POST['xxType_record'] == 'combo_code' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('tabgen_id' => '0', 'tabgen_code' => ''); }
	foreach ( $ar as $row ) {	
    	$_dat[] = array('tabgen_id' => $row['tabgen_id'], 'tabgen_code' => $row['tabgen_code']);
	}
} else if ( $_POST['xxType_record'] == 'combo_codename' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('tabgen_id' => '0', 'tabgen_code' => '', 'tabgen_codename' => ''); }
	foreach ( $ar as $row ) {	
    	$_dat[] = array('tabgen_id' => $row['tabgen_id'], 'tabgen_code' => $row['tabgen_code'], 'tabgen_codename' => $row['tabgen_codename']);
	}
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat) );
?>