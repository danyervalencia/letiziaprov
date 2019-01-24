<?php
//session_start();
require_once 'db/public_provincias.php';

$ob = new Public_Provincias();
$ob->setPrvn_id( $_POST['xxPrvn_id'] == '' ? '0' : $_POST['xxPrvn_id']);
$ob->setDpto_id( $_POST['xxDpto_id'] );
$ob->setPrvn_nombre( $_POST['xxPrvn_nombre'] );
$ob->setPrvn_code( $_POST['xxPrvn_code'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );
$ob->setType_record( $_POST['xxType_record'] );
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ( substr($_POST['xxAdd_blank'],0,3) == 'YES' ) { $_dat[] = array('prvn_id' => '0',  'prvn_nombre' => ''); }
	foreach ( $ar as $row ) {
	    $_dat[] = array('prvn_id' => $row['prvn_id'], 'prvn_nombre' => $row['prvn_nombre']);
	}

} else {
	foreach ( $ar as $row ) {
	    $_dat[] = array('dpto_id'    => $row['dpto_id'],    'prvn_id'     => $row['prvn_id'], 'prvn_nombre' => $row['prvn_nombre'], 
	                    'prvn_abrev' => $row['prvn_abrev'], 'prvn_estado' => $row['prvn_estado']);
	}
}

echo json_encode( array('success'=>1, 'total'=>$lnTreg, 'data'=>$_dat) );
?>