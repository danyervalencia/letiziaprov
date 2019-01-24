<?php
session_start();
$result['success'] = false;
if ( $_POST['xx0005'] !== 'YES' ) {
    $result['msg'] = 'Usuario intruso no hay permiso de conexión';
	echo json_encode($result);  exit;
}

require_once 'session_validate.php';
if ( $result['success'] == false ) {
	echo json_encode($result);  exit;
}

require_once 'db/logistics_pedidos.php';
$ob = new Logistics_Pedidos();
$ob->setType_edit( $_POST['xxType_edit'] );
$ob->setPed_key( $_POST['ped_key'] );
$ob->setYear_id( $_YEAR_ID == '' || $_YEAR_ID*1 <= 0 ? $_POST['xxYear_id'] : $_YEAR_ID );
$ob->setDoc_id( $_POST['xxDoc_id'] );
$ob->setTipped_id( $_POST['xxTipped_id'] );
$ob->setPed_fecha( $_POST['xxPed_fecha'] );
$ob->setArea_key( $_POST['xxArea_key'] );
$ob->setTarea_key( $_POST['xxTarea_key'] );
$ob->setTareacomp_key( $_POST['xxTareacomp_key'] );
$ob->setFuefin_id( $_POST['xxFuefin_id'] );
$ob->setTiprecur_id( $_POST['xxTiprecur_id'] );
$ob->setPed_monto( $_POST['xxPed_monto'] );
$ob->setPed_observ( $_POST['ped_observ'] );
$ob->setUsursess_key( $_USURSESS_KEY );
$ob->setDet( '{'.$_POST['xxDet'].'}' );
$ob->setTarea_fftred( '{'.$_POST['xxTarea_fftred'].'}' );

$ob->actualiza();
if ( substr($ob->getPed_key(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['key'] = substr($ob->getPed_key(), 10, 32);
} else {
}

echo json_encode($result);
?>