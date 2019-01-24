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

require_once 'db/public_messages.php';
$ob = new Public_Messages();
$ob->setType_edit( $_POST['xxType_edit'] );
//$ob->setRecib_key( $_POST['recib_key'] );
$ob->setIndiv_key( $_POST['indiv_key'] );
$ob->setMess_title( $_POST['mess_title'] );
$ob->setMess_texto( $_POST['xxMess_texto'] );
$ob->setUsursess_key( $_USURSESS_KEY );

$ob->actualiza();
if ( substr($ob->getMess_key(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['key'] = substr($ob->getMess_key(), 10, 32);
} else {
}

echo json_encode($result);
?>