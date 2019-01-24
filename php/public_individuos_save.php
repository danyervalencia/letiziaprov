<?php 
session_start();

$result = array();
$result['success'] = false;

if ( $_POST['xx0005'] != 'OK' ) {
    $result['msg'] = 'Usuario intruso no hay permiso de conexión';
    echo json_encode($result);  exit;
}

require_once 'session_validate.php';
if ( $result['success'] == false ) {
    echo json_encode($result);  exit;
}

$result['success'] = false;
if ( isset($_FILES) ) {
    $uploads_dir = '../attach/';
    $file_foto_name = $_FILES['ffiIndiv_foto']['name'];
    $tmp_foto_name  = $_FILES['ffiIndiv_foto']['tmp_name'];
    $file_pdf_name  = $_FILES['ffiIndiv_pdf']['name'];
    $tmp_pdf_name   = $_FILES['ffiIndiv_pdf']['tmp_name'];
    $fileSize = $_FILES['ffiIndiv_foto']['size'];
    $fileType = $_FILES['ffiIndiv_foto']['type'];
}

require_once 'db/public_individuos.php';
$ob = new Public_Individuos();
$ob->setType_edit( $_POST['indiv_key'] == '' ? '1' : '2' );
$ob->setIndiv_key( $_POST['indiv_key'] );
$ob->setTipdocident_id( $_POST['tipdocident_id'] );
$ob->setIndiv_dni( $_POST['indiv_dni'] );
$ob->setIndiv_appaterno( $_POST['indiv_appaterno'] );
$ob->setIndiv_apmaterno( $_POST['indiv_apmaterno'] );
$ob->setIndiv_nombres( $_POST['indiv_nombres'] );
$ob->setTipsex_id( $_POST['tipsex_id'] == '' || $_POST['tipsex_id'] == '0' ? 'NULL' : "'".$_POST['tipsex_id']."'" );
$ob->setTipestaciv_id( $_POST['tipestaciv_id'] == '' || $_POST['tipestaciv_id'] == '0' ? 'NULL' : "'".$_POST['tipestaciv_id']."'" );
$ob->setIndiv_fechanac( $_POST['indiv_fechanac'] == '' ? 'NULL' : "'".$_POST['indiv_fechanac']."'" );
$ob->setPais_id( $_POST['xxPais_id'] == '' ? 'NULL' : "'".$_POST['xxPais_id']."'" );
$ob->setDpto_id( $_POST['_dpto_id'] == '' ? 'NULL' : "'".$_POST['_dpto_id']."'" );
$ob->setPrvn_id( $_POST['_prvn_id'] == '' ? 'NULL' : "'".$_POST['_prvn_id']."'" );
$ob->setDstt_id( $_POST['_dstt_id'] == '' ? 'NULL' : "'".$_POST['_dstt_id']."'" );
$ob->setIndiv_mail( $_POST['indiv_mail'] );
$ob->setIndiv_observ( $_POST['indiv_observ'] );
$ob->setIndiv_foto( $file_foto_name == '' ? $_POST['indiv_foto'] : $file_foto_name );
$ob->setIndiv_pdf( $file_pdf_name == '' ? $_POST['indiv_pdf'] : $file_pdf_name );
$ob->setUsursess_key( $_SESSION['scUsursess_key'] );
$ob->actualiza();

if ( substr($ob->getIndiv_key(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['key'] = substr($ob->getIndiv_key(), 10, 32);
    $result['indiv_key'] = substr($ob->getIndiv_key(), 10, 32);

    if ( $file_foto_name !== '' ) {
        //$code = 'public_individuos_' .  str_repeat('0', 10-strlen(substr($ob->getIndiv_key(), 42))) . substr($ob->getIndiv_key(), 42) .'_';
        $code = 'public_individuos_foto_' . substr($ob->getIndiv_key(), 10, 32) .'_';
        $upload_file = $uploads_dir .$code. $file_foto_name;
        if ( move_uploaded_file($tmp_foto_name, $upload_file) ) {
        } else {
            $result['success'] = false;
            $result['msg'] = 'No se ha podido guardar el archivo que contiene la foto adjuntada';
        }
    }
    if ( $file_pdf_name !== '' ) {
        //$code = 'public_individuos_' .  str_repeat('0', 10-strlen(substr($ob->getIndiv_key(), 42))) . substr($ob->getIndiv_key(), 42) .'_';
        $code = 'public_individuos_pdf_' . substr($ob->getIndiv_key(), 10, 32) .'_';
        $upload_file = $uploads_dir .$code. $file_pdf_name;
        if ( move_uploaded_file($tmp_pdf_name, $upload_file) ) {
        } else {
            $result['success'] = false;
            $result['msg'] = 'No se ha podido guardar el archivo que contiene el PDF adjuntado';
        }
    }
} else {

}

echo json_encode($result);
?>