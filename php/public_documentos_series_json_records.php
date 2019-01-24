<?php
//session_start();
require_once 'db/public_documentos_series.php';

$ob = new Public_Documentos_Series();
$ob->setDocser_id( $_POST['xxDocser_id'] == '' ? '0' : $_POST['xxDocser_id'] );
$ob->setDoc_id( $_POST['xxDoc_id'] == '' ? '0' : $_POST['xxDoc_id'] );
$ob->setYear_id( $_POST['xxYear_id'] == '' ? '0' : $_POST['xxYear_id'] );
$ob->setMes_id( $_POST['xxMes_id'] == '' ? '0' : $_POST['xxMes_id'] );
$ob->setDocser_serie( $_POST['xxDocser_serie'] == '' ? '0' : $_POST['xxDocser_serie'] );
$ob->setDocser_estado( $_POST['xxDocser_estado'] == '' ? 'NULL' : $_POST['xxDocser_estado'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
    if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('docser_id' => '0', 'docser_serie' => '0', 'docser_format' => ''); }   
    foreach ( $ar as $row ) {
        $_dat[] = array('docser_id' => $row['docser_id'], 'docser_serie' => $row['docser_serie'], 'docser_format' => $row['docser_format']);
    }
} else if ( $_POST['xxType_record'] == 'combo_abrev' ) {
    if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('doc_id' => '0', 'doc_abrev' => ''); }
    foreach ( $ar as $row ) {
        $_dat[] = array('doc_id' => $row['doc_id'], 'doc_abrev' => $row['doc_abrev']);
    }
} else if ( $_POST['xxType_record'] == 'search_nro' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('docser_nro' => $row['docser_nro'], 'docser_nro_length' => $row['docser_nro_length']);
    }
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat) );
?>