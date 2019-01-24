<?php
//session_start();
require_once 'db/public_tipos_documentos_identidad.php';

$ob = new Public_Tipos_Documentos_Identidad();
$ob->setTipdocident_id( $_POST['xxTipdocident_id'] == '' ? '0' : $_POST['xxTipdocident_id'] );
$ob->setTipdocident_nombre( $_POST['xxTipdocident_nombre'] );
$ob->setTipdocident_abrev( $_POST['xxTipdocident_abrev'] );
$ob->setTipdocident_estado_individuos( $_POST['xxTipdocident_estado_individuos'] );
$ob->setTipdocident_estado_personas( $_POST['xxTipdocident_estado_personas'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
    if ( substr($_POST['xxAdd_blank'],0,3) == 'YES' ) { $_dat[] = array('tipdocident_id' => 0,  'tipdocident_nombre' => ''); }   
	foreach ( $ar as $row ) {
	    $_dat[] = array('tipdocident_id' => $row['tipdocident_id'], 'tipdocident_nombre'  => $row['tipdocident_nombre']);
	}
} else if ( $_POST['xxType_record'] == 'combo_abrev' ) {
    if ( substr($_POST['xxAdd_blank'],0,3) == 'YES' ) { $_dat[] = array('tipdocident_id' => 0,  'tipdocident_abrev' => ''); }   
	foreach ( $ar as $row ) {
	    $_dat[] = array('tipdocident_id' => $row['tipdocident_id'], 'tipdocident_abrev'  => $row['tipdocident_abrev']);
	}
} else if ( $_POST['xxType_record'] == 'combo_abrev_pais' ) {
    if ( substr($_POST['xxAdd_blank'],0,3) == 'YES' ) { $_dat[] = array('tipdocident_id' => 0,  'tipdocident_abrev' => '', 'pais_id' => '0'); }
	foreach ( $ar as $row ) {
	    $_dat[] = array('tipdocident_id' => $row['tipdocident_id'], 'tipdocident_abrev'  => $row['tipdocident_abrev'], 'pais_id' => $row['pais_id']);
	}
} else {
	foreach ( $ar as $row ) {
	    $_dat[] = array('tipdocident_id'   => $row['tipdocident_id'],    'tipdocident_nombre' => $row['tipdocident_nombre'],  'tipdocident_abrev'  => $row['tipdocident_abrev'],
	    	            'tipdocident_code' => $row['tipdocident_code'],  'pais_id'            => $row['pais_id'],             'tipdocident_length' => $row['tipdocident_length'],
	    	            'tipdocident_type' => $row['tipdocident_type'],
	    	            'tipdocident_estado_individuos' => $row['tipdocient_estado_individuos'],  'tipdocident_estado_personas' => $row['tipdocient_estado_personas']);
	}
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat) );
?>