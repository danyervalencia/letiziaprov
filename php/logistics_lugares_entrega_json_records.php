<?php
require_once 'db/logistics_lugares_entrega.php';

$ob = new Logistics_Lugares_Entrega();
$ob->setLugentr_id( $_POST['xxLugentr_id'] == '' ? '0' : $_POST['xxLugentr_id'] );
$ob->setLugentr_nombre( $_POST['xxLugentr_nombre'] );
$ob->setLugentr_abrev( $_POST['xxLugentr_abrev'] );
$ob->setAlma_id( $_POST['xxAlma_id'] == '' ? 'NULL' : "'".$_POST['xxAlma_id']."'" );
$ob->setLugentr_estado( $_POST['xxLugentr_estado'] == '' ? 'NULL' : "'".$_POST['xxLugentr_estado']."'" );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST["xxOrder_by"] );

if ( $_POST['xxPaginate'] == '1' ) {
     $ob->setRecord_limit('');
     $ar = $ob->registros();
     foreach ( $ar as $row ) { $_total = $row["treg"]; }

     $ob->setRecord_limit( $_POST['limit'] );
     $ob->setRecord_start( $_POST['start'] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'cbo' ) {
    if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('lugentr_id'=>'', 'lugentr_nombre'=>''); }
    foreach ( $ar as $row ) {
        $_dat[] = array('lugentr_id'=>$row['lugentr_id'], 'lugentr_nombre'=>$row['lugentr_nombre']);
    }
}

echo json_encode( array('success'=>true, 'total'=>$_total, 'subtotal'=>count($_dat), 'data'=>$_dat, ) );
?>