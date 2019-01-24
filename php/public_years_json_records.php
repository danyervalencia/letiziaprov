<?php
session_start();
//if ( $_SESSION["sysreq"]  != 'OK' ) { exit; }

require_once 'db/public_years.php';

$ob = new Public_Years();
$ob->setYear_id( $_POST['xxYear_id'] == '' ? '0' : $_POST['xxYear_id'] );
$ob->setYear_nombre( $_POST['xxYear_nombre'] );
$ob->setYear_nro( $_POST['xxYear_nro'] );
$ob->setYear_estado( $_POST['xxYear_estado'] );
$ob->setYear_ini( $_POST['xxYear_ini'] == '' ? '0' : $_POST['xxYear_ini'] );
$ob->setYear_fin( $_POST['xxYear_fin'] == '' ? '0' : $_POST['xxYear_fin'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('year_id' => '0', 'year_nro' => ''); }
    foreach ( $ar as $row ) {
        $_dat[] = array('year_id' => $row['year_id'], 'year_nro' => $row['year_nro']);
    }
} else {
    foreach ( $ar as $row ) {
        $_dat[] = array('year_id'     => $row['year_id'],  'year_nombre' => $row['year_nombre'],  'year_nro' => $row['year_nro'],
    	                'year_estado' => $row['year_estado']);
    }
}

echo json_encode( array('success'=>1, 'total'=>$_total, 'subtotal' => count($_dat), 'data'=>$_dat) );
?>