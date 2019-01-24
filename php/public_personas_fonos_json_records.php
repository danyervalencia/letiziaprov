<?php
session_start();
require_once 'db/public_personas_fonos.php';

$ob = new Public_Personas_Fonos();
$ob->setPersfono_id( $_POST['xxPersfono_id'] == '' ? '0' : $_POST['xxPersfono_id'] );
$ob->setPersfono_key( $_POST['xxPersfono_key'] );
$ob->setPers_id( $_POST['xxPers_id'] == '' ? '0' : $_POST['xxPers_id'] );
$ob->setTipfono_id( $_POST['xxTipfono_id'] == '' ? '0' : $_POST['xxTipfono_id'] );
$ob->setCompfono_id( $_POST['xxCompfono_id'] == '' ? '0' : $_POST['xxCompfono_id'] );
$ob->setPers_key( $_POST['xxPers_key'] );
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
        $_dat[] = array('persfono_key' => $row['persfono_key'], 'activ_codename' => $row['activ_codename']);
    }
} else if ( $_POST['xxType_record'] == 'form' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('persfono_key' => $row['persfono_key'], 'tipfono_id' => $row['tipfono_id'], 'compfono_id' => $row['compfono_id'],
                        'persfono_nro' => $row['persfono_nro'], 'persfono_estado' => $row['persfono_estado'], 'pers_key' => $row['pers_key']);
    }
} else if ( $_POST['xxType_record'] == 'grid_public_personasbrowse' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('persfono_key' => $row['persfono_key'], 'persfono_nro' => $row['persfono_nro'], 'persfono_estado' => $row['persfono_estado'],
                        'tipfono_nombre' => $row['tipfono_nombre'], 'compfono_nombre' => $row['compfono_nombre']);
    }
}


echo json_encode( array('success'=>1, 'total'=>$_total, 'subtotal' => count($_dat), 'data'=>$_dat) );
?>