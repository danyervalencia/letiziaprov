<?php
session_start();
require_once 'db/public_unidades_medida.php';

$ob = new Public_Unidades_Medida();
$ob->setUnimed_id( $_POST['xxUnimed_id'] == '' ? '0' : $_POST['xxUnimed_id'] );
$ob->setUnimed_nombre( $_POST['xxUnimed_nombre'] );
$ob->setUnimed_abrev( $_POST['xxUnimed_abrev'] );
$ob->setUnimed_equiv( $_POST['xxUnimed_equiv'] == '' ? '0' : $_POST['xxUnimed_equiv'] );
$ob->setUnimed_bien( $_POST['xxUnimed_bien'] == '' ? 'NULL' : "'".$_POST['xxUnimed_bien']."'" );
$ob->setUnimed_serv( $_POST['xxUnimed_serv'] == '' ? 'NULL' : "'".$_POST['xxUnimed_serv']."'" );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('unimed_id' => '0', 'unimed_nombre' => ''); }
	foreach ( $ar as $row ) {
    	$_dat[] = array('unimed_id' => $row['unimed_id'], 'unimed_nombre' => $row['unimed_nombre']);
    }
} else if ( $_POST['xxType_record'] == 'combo_abrev' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('unimed_id' => '0', 'unimed_abrev' => ''); }
	foreach ( $ar as $row ) {
    	$_dat[] = array('unimed_id' => $row['unimed_id'], 'unimed_abrev' => $row['unimed_abrev']);
    }
} else {
	foreach ( $ar as $row ) {
    	$_dat[] = array('unimed_id'   => $row['unimed_id'],   'unimed_nombre' => $row['unimed_nombre'], 'unimed_abrev' => $row['unimed_abrev'], 'unimed_equiv' => $row['unimed_equiv'],
        	            'unimed_bien' => $row['unimed_bien'], 'unimed_serv'   => $row['unimed_serv']);
    }
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat) );
?>