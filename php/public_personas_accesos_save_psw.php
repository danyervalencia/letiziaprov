<?php
$result['success'] = false;
if($_POST['xx0005']=='YES'){} 
else{$result['msg'] = 'Proveedor intruso no hay permiso de conexión'; echo json_encode($result); exit;}

require_once 'session_validate.php';
if($result['success'] == false){echo json_encode($result); exit;}

require_once 'db/public_personas_accesos.php';
$ob = new Public_Personas_Accesos();
$ob->setType_edit( $_POST['xxType_edit'] );
$ob->setPersacce_key( $_PERSACCE_KEY );
$ob->setPersacce_psw1( $_POST['xxPersacce_psw1'] );
$ob->setPersacce_psw2( $_POST['xxPersacce_psw2'] );
$ob->setPerssess_key( $_PERSSESS_KEY );
$ob->setMenu_id( $_POST['xxMenu_id'] == '' ? '0' : $_POST['xxMenu_id'] );

$ob->actualiza_psw();
if ( substr($ob->getPersacce_key(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['key'] = substr($ob->getPersacce_key(), 10, 32);
} else {
}

echo json_encode($result);
?>