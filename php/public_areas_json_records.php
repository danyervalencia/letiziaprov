<?php
require_once 'db/public_areas.php';

$ob = new Public_Areas();
$ob->setArea_id( $_POST['xxArea_id'] == '' ? '0' : $_POST['xxArea_id'] );
$ob->setArea_key( $_POST['xxArea_key'] );
$ob->setArea_parent( $_POST['xxArea_parent'] == '' ? 'NULL' : $_POST['xxArea_parent'] );
$ob->setArea_nombre( $_POST['xxArea_nombre'] );
$ob->setArea_abrev( $_POST['xArea_abrev'] );
$ob->setTiparea_id( $_POST['xxTiparea_id'] == '' ? 'NULL' : $_POST['xxTiparea_id'] );
$ob->setArea_estado( $_POST['xxArea_estado'] == '' ? 'NULL' : $_POST['xxArea_estado'] );
$ob->setUnieje_key( $_POST['xxUnieje_key'] );
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
if ( $_POST['xxType_record'] == 'combo') {
	if ( substr($_POST['xxAdd_blank'],0,3) == 'YES' && substr($_POST['xxAdd_blank'],3) == '' ) { $_dat[] = array('area_key'=>'',  'area_nombre'=>''); }
	foreach ( $ar as $row ) {
    	$_dat[] = array('area_key'=>$row['area_key'],  'area_nombre'=>$row['area_nombre']);
    }
} else if ( $_POST['xxType_record'] == 'combo_abrev' ) {
	if ( substr($_POST['xxAdd_blank'],0,3) === 'YES' && substr($_POST['xxAdd_blank'],3) == '' ) { $_dat[] = array('area_key'=>'',  'area_abrev'=>''); }
	foreach ( $ar as $row ) {
    	$_dat[] = array('area_key'=>$row['area_key'],  'area_abrev'=>$row['area_abrev']);
    }
}

echo json_encode( array('success'=>true, 'total'=>$_total, 'subtotal'=>count($_dat), 'data'=>$_dat) );