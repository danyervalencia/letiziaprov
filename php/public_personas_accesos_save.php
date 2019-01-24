<?php 
session_start();
$result['success'] = false;
if ( $_POST['xx0005'] == 'YES' ) {
} else {
    $result['msg'] = 'Usuario intruso no hay permiso de conexión';
    echo json_encode($result);  exit;
}

require_once 'session_validate.php';
if ( $result['success'] == false ) {
    echo json_encode($result);  exit;
}

require_once 'db/public_personas_accesos.php';
$ob = new Public_Personas_Accesos();
$ob->setType_edit($_POST['persacce_key'] == '' ? '1' : '2');
$ob->setPersacce_key($_POST['persacce_key']);
$ob->setPers_key($_POST['pers_key']);
$ob->setPersacce_fecha($_POST['xxPersacce_fecha'] == '' ? 'NULL' : "'".$_POST['xxPersacce_fecha']."'");
$ob->setClav_id($_POST['clav_id'] == '' ? '0' : $_POST['clav_id']);
$ob->setIndiv_key($_POST['indiv_key']);
$ob->setPersacce_observ($_POST['persacce_observ'] );
//$ob->setPersacce_estado( $_POST['_persacce_estado'] == 'on' ? '1' : '0' );
$ob->setUsursess_key( $_USURSESS_KEY );
$ob->setMenu_id($_POST['xxMenu_id'] == '' ? '0' : $_POST['xxMenu_id']);

$ob->actualiza();
if ( substr($ob->getPersacce_key(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['key'] = substr($ob->getPersacce_key(), 10, 32);
} else {
}

echo json_encode($result);
?>