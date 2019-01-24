<?php
session_start();

require_once 'db/public_documentos.php';

$ob = new Public_Documentos();
$ob->setDoc_id( $_POST['xxDoc_id'] == '' ? '0' : $_POST['xxDoc_id'] );
$ob->setDoc_nombre( $_POST['xxDoc_nombre'] );
$ob->setDoc_reg_serie( $_POST['xxDoc_reg_serie'] == '' ? '0' : $_POST['xxDoc_reg_serie'] );
$ob->setDoc_escontable( $_POST['xxDoc_escontable'] == '' ? '0' : $_POST['xxDoc_escontable'] );
$ob->setDoc_escompra( $_POST['xxDoc_escompra'] == '' ? '0' : $_POST['xxDoc_escompra']  );
$ob->setDoc_esgasto( $_POST['xxDoc_esgasto'] == '' ? '0' : $_POST['xxDoc_esgasto'] );
$ob->setDoc_esventa( $_POST['xxDoc_esventa'] == '' ? '0' : $_POST['xxDoc_esventa'] );
$ob->setDoc_escobro( $_POST['xxDoc_escobro'] == '' ? '0' : $_POST['xxDoc_escobro'] );
$ob->setDoc_espago( $_POST['xxDoc_espago'] == '' ? '0' : $_POST['xxDoc_espago'] );
$ob->setDoc_estercero( $_POST['xxDoc_estercero'] == '' ? '0' : $_POST['xxDoc_estercero'] );
$ob->setDoc_esdocumentary( $_POST['xxDoc_esdocumentary'] == '' ? '0' : $_POST['xxDoc_esdocumentary'] );
$ob->setDoc_esexportar( $_POST['xxDoc_esexportar'] == '' ? '0' : $_POST['xxDoc_esexportar'] );
$ob->setType_record( $_POST['xxType_record']);
$ob->setType_query( $_POST['xxType_query']);
$ob->setOrder_by( $_POST['xxOrder_by'] );
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
    if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('doc_id' => '0', 'doc_nombre' => ''); }
    foreach ( $ar as $row ) {
        $_dat[] = array('doc_id' => $row['doc_id'], 'doc_nombre' => $row['doc_nombre']);
    }
} else if ( $_POST['xxType_record'] == 'combo_abrev' ) {
    if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('doc_id' => '0', 'doc_abrev' => ''); }
    foreach ( $ar as $row ) {
        $_dat[] = array('doc_id' => $row['doc_id'], 'doc_abrev' => $row['doc_abrev']);
    }
}

echo json_encode(array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat));
?>