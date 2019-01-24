<?php
//session_start();
require_once 'db/public_distritos.php';

$ob = new Public_Distritos();
$ob->setDstt_id( $_POST['xxDstt_id'] == '' ? '0' : $_POST['xxDstt_id'] );
$ob->setPrvn_id( $_POST['xxPrvn_id'] == '' ? '0' : $_POST['xxPrvn_id'] );
$ob->setDstt_nombre( $_POST['xxDstt_nombre'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ( substr($_POST['xxAdd_blank'],0,3) == 'YES' ) { $_dat[] = array('dstt_id' => '0',  'dstt_nombre' => ''); }
	foreach ( $ar as $row ) {
	    $_dat[] = array('dstt_id' => $row['dstt_id'], 'dstt_nombre' => $row['dstt_nombre']);
	}
} else {
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat ) );
?>