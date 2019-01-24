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

require_once 'db/public_personas.php';
$ob = new Public_Personas();
$ob->setType_edit( $_POST['pers_key'] == '' ? '1' : '2' );
$ob->setPers_key( $_POST['pers_key'] );
$ob->setTipdocident_id( $_POST['tipdocident_id'] );
$ob->setPers_ruc( $_POST['pers_ruc'] );
$ob->setPers_nombre( $_POST['pers_nombre'] );
$ob->setPers_nombre02( $_POST['pers_nombre02'] );
$ob->setPers_abrev( $_POST['pers_abrev'] );
$ob->setIndiv_key( $_POST['indiv_key'] );
$ob->setPais_id( $_POST['xxPais_id'] == '' || $_POST['xxPais_id'] == '0' ? 'NULL' : $_POST['xxPais_id'] );
$ob->setDpto_id( $_POST['xxDpto_id'] == '' || $_POST['xxDpto_id'] == '0' ? 'NULL' : $_POST['xxDpto_id'] );
$ob->setPrvn_id( $_POST['xxPrvn_id'] == '' || $_POST['xxPrvn_id'] == '0' ? 'NULL' : $_POST['xxPrvn_id'] );
$ob->setDstt_id( $_POST['xxDstt_id'] == '' || $_POST['xxDstt_id'] == '0' ? 'NULL' : $_POST['xxDstt_id'] );
$ob->setPers_domicilio( $_POST["pers_domicilio"] );
$ob->setPers_mail( $_POST["pers_mail"] );
$ob->setPers_web( $_POST["pers_web"] );
//$ob->setPers_rnp( $_POST["pers_rnp"] );
$ob->setPers_observ( $_POST['pers_observ'] );
$ob->setUsursess_key( $_USURSESS_KEY );

$ob->actualiza();
if ( substr($ob->getPers_key(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['pers_key'] = substr($ob->getPers_key(), 10, 32);
} else {
}

echo json_encode($result);
?>