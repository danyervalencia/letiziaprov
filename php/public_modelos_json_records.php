<?php
//session_start();
require_once 'db/public_modelos.php';

$ob = new Public_Modelos();
$ob->setMod_id( $_POST['xxMod_id'] == '' ? '0' : $_POST['xxMod_id'] );
$ob->setMod_key( $_POST['xxMod_key'] );
$ob->setBsc_id( $_POST['xxBsc_id'] == '' ? '0' : $_POST['xxBsc_id'] );
$ob->setMarc_id( $_POST['xxMarc_id'] == '' ? '0' : $_POST['xxMarc_id'] );
$ob->setMod_nombre( $_POST['xxMod_nombre'] );
$ob->setMod_abrev( $_POST['xxMod_abrev'] );
$ob->setMod_estado( $_POST['xxMod_estado'] == '' ? 'NULL' : "'".$_POST['xxMod_estado']."'" );
//$ob->setBsc_key( $_POST['xxBsc_key'] );
$ob->setMarc_key( $_POST['xxMarc_key'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

if ( $_POST['xxPaginate'] == '1' ) {
     $ob->setRecord_limit('');
     $ar = $ob->registros();
     foreach ( $ar as $row ) { $_total = $row['treg']; }

     $ob->setRecord_limit( $_REQUEST['limit'] );  
     $ob->setRecord_start( $_REQUEST['start'] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
    if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('mod_key' => '', 'mod_nombre' => ''); }
    foreach ( $ar as $row ) {
        $_dat[] = array('mod_key' => $row['mod_key'], 'mod_nombre' => $row['mod_nombre']);
    }
/*} else if ( $_POST['xxType_record'] == 'combo_marcas' ) {
    if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('mod_key' => '', 'mod_nombre' => ''); }
    foreach ( $ar as $row ) {
        $_dat[] = array('mod_key' => $row['mod_key'], 'mod_nombre' => $row['mod_nombre']);
    }*/
} else {
	foreach ( $ar as $row ) {
	    $_dat[] = array('mod_key'    => $row['mod_key'],     'bsc_id'    => $row['bsc_id'],  
	    	            'mod_nombre' => $row['mod_nombre'],  'mod_abrev' => $row['mod_abrev'],  'mod_observ' => $row['mod_observ'],
	    	            'mod_estado' => $row['mod_estado'],
	    	            'marc_key' => $row['marc_key'],  'marc_nombre' => $row['marc_nombre'],  'marc_abrev' => $row['marc_abrev']);
	}
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat) );
?>