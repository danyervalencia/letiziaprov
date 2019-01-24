<?php
session_start();
require_once 'db/public_departamentos.php';

$ob = new Public_Departamentos();
$ob->setDpto_id( $_POST['xxDpto_id'] == '' ? '0' : $_POST['xxDpto_id'] );
$ob->setPais_id( $_POST['xxPais_id'] == '' ? '0' : $_POST['xxPais_id'] );
$ob->setDpto_nombre( $_POST['xxDpto_nombre'] );
$ob->setDpto_abrev( $_POST['xxDpto_abrev'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );
$ar = $ob->registros();

$_dat = array();

if ( $_POST['xxType_record'] == 'combo' ) {
    if ( substr($_POST['xxAdd_blank'],0,3) == 'YES' ) { $_dat[] = array('dpto_id' => '0',  'dpto_nombre' => ''); }
	foreach ( $ar as $row ) {		
	    $_dat[] = array('dpto_id' => $row['dpto_id'],  'dpto_nombre' => $row['dpto_nombre']);
	}
} else {
	foreach ( $ar as $row ) {
	    $_dat[] = array('dpto_id' => $row['dpto_id'],  'pais_id' => $row['pais_id'],  'dpto_nombre' => $row['dpto_nombre'],  'dpto_abrev' => $row['dpto_abrev']);
	}
}

echo json_encode( array('success' => true,  'total' => $_total, 'data' => $_dat) );
?>