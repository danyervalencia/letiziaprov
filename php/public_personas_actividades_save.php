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

require_once 'db/public_personas_actividades.php';
$ob = new Public_Personas_Actividades();
$ob->setType_edit( $_POST['persactiv_key'] == '' ? '1' : '2' );
$ob->setPersactiv_key($_POST['persactiv_key']);
$ob->setPers_key($_POST['pers_key']);
$ob->setActiv_key($_POST['activ_key']);
$ob->setPersactiv_observ($_POST['persactiv_observ'] );
$ob->setPersactiv_estado( $_POST['_persactiv_estado'] == 'on' ? '1' : '0' );
$ob->setUsursess_key( $_USURSESS_KEY );
$ob->setMenu_id($_POST['menu_id'] );

$ob->actualiza();
if ( substr($ob->getPersactiv_key(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['key'] = substr($ob->getPersactiv_key(), 10, 32);
} else {
}

echo json_encode($result);
?>