<?php
//session_start();
require_once 'db/logistics_pedidos_tareas_fftred.php';
$ob = new Logistics_Pedidos_Tareas_Fftred();
$ob->setPedtareafte_id( $_POST['xxPedtareafte_id'] == '' ? '0' : $_POST['xxPedtareafte_id'] );
$ob->setPed_id( $_POST['xxPed_id'] == '' ? '0' : $_POST['xxPed_id'] );
$ob->setPedtareafte_item( $_POST['xxPedtareafte_item'] == '' ? '0' : $_POST['xxPedtareafte_item'] );
$ob->setTareafte_id( $_POST['xxTareafte_id'] == '' ? '0' : $_POST['xxTareafte_id'] );
$ob->setEspedet_id( $_POST['xxEspedet_id'] == '' ? '0' : $_POST['xxEspedet_id'] );
$ob->setPedtareafte_estado( $_POST['xxPedtareafte_estado'] == '' ? 'NULL' : "'".$_POST['xxPedtareafte_estado']."'" );
$ob->setPed_key( $_POST['xxPed_key'] );
$ob->setTareafte_key( $_POST['xxTareafte_key'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

if ( $_POST['xxPaginate'] == '1' ) {
     $ob->setRecord_limit('');
     $ar = $ob->registros();
     foreach ( $ar as $row ) { $_total = $row['treg']; }

     $ob->setRecord_limit( $_POST['limit'] );  
     $ob->setRecord_start( $_POST['start'] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'form' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pedtareafte_id' => $row['pedtareafte_id'], 'pedtareafte_item' => $row['pedtareafte_item'], 'tareafte_id' => $row['tareafte_id'],  'espedet_id' => $row['espedet_id'], 
                        'pedtareafte_monto' => $row['pedtareafte_monto'], 'pedtareafte_monto_ampl' => $row['pedtareafte_monto_ampl'], 'pedtareafte_monto_rebj' => $row['pedtareafte_monto_rebj'], 'pedtareafte_monto_orden' => $row['pedtareafte_monto_orden'], 
                        'espedet_codigo' => $row['espedet_codigo'], 'espedet_nombre' => $row['espedet_nombre']);
    }
} else if ( $_POST['xxType_record'] == 'printer' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pedtareafte_cantid' => $row['pedtareafte_cantid'], 'pedtareafte_preuni' => $row['pedtareafte_preuni'], 'pedtareafte_pretot' => $row['pedtareafte_pretot'],
                        'pedtareafte_inafecto' => $row['pedtareafte_inafecto'], 'ref_id' => $row['ref_id'],
                        'bs_nombre' => $row['bs_nombre'], 'unimed_abrev' => $row['unimed_abrev'], 'bs_codigo' => $row['bs_codigo'],);
    }
} else {
}

echo json_encode( array('success'=>1, 'total'=>$lnTreg, 'data'=>$_dat) );
?>