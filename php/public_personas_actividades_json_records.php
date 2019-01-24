<?php
session_start();
require_once 'db/public_personas_actividades.php';

$ob = new Public_Personas_Actividades();
$ob->setPersactiv_id( $_POST['xxPersactiv_id'] == '' ? '0' : $_POST['xxPersactiv_id'] );
$ob->setPersactiv_key( $_POST['xxPersactiv_key'] );
$ob->setPers_id( $_POST['xxPers_id'] == '' ? '0' : $_POST['xxPers_id'] );
$ob->setActiv_id( $_POST['xxActiv_id'] == '' ? '0' : $_POST['xxActiv_id'] );
$ob->setPers_key( $_POST['xxPers_key'] );
$ob->setActiv_key( $_POST['xxActiv_key'] );
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
    foreach ( $ar as $row ) {
        $_dat[] = array('persactiv_key' => $row['persactiv_key'], 'activ_codename' => $row['activ_codename']);
    }
} else if ( $_POST['xxType_record'] == 'form' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('persactiv_key' => $row['persactiv_key'], 'persactiv_estado' => $row['persactiv_estado'],
                        'pers_key' => $row['pers_key'], 'activ_key' => $row['activ_key'],);
    }
} else if ( $_POST['xxType_record'] == 'grid_public_personasbrowse' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('persactiv_key' => $row['persactiv_key'], 'persactiv_estado' => $row['persactiv_estado'],
                        'bst_nombre' => $row['bst_nombre'], 'activ_nombre' => $row['activ_nombre']);
    }
}


echo json_encode( array('success'=>1, 'total'=>$_total, 'subtotal' => count($_dat), 'data'=>$_dat) );
?>