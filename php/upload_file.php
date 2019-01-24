<?php 
session_start();

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
$uploads_dir = '../attach/';
$file_name  = $_FILES['ffiFile']['name'];
$tmp_name   = $_FILES['ffiFile']['tmp_name'];
$fileSize = $_FILES['ffiFile']['size'];
$fileType = $_FILES['ffiFile']['type'];
if ($file_name == '') {
    $result['msg'] = 'No se ha establecido el archivo';
    echo json_encode($result);  exit;
}

require_once 'db/modelo.php';
$ob = new Modelo();
$ob->setType_edit( $_POST['regint_key'] == '' ? '1' : '2');
$ob->setSchema_table( $_POST['xxSchema_table'] );
$ob->setTable_field( $_POST['xxTable_field'] );
$ob->setRecord_key( $_POST['xxRecord_key'] );
$ob->setRecord_field( $_POST['xxRecord_field'] );
//$ob->setTable( $_POST['xxTable'] );
//$ob->setField( $_POST['xxField'] );
$ob->setFile_name( $file_name );
$ob->setUsursess_key( $_USURSESS_KEY );
$ob->subir_archivo();

if ( substr($ob->getKey(), 0, 10) == 'YTLLLL-OVC' ) {
    $result['success'] = true;
    $result['msg'] = 'Datos se han guardado en forma satisfactoria';
    $result['key'] = substr($ob->getKey(), 10);

    if ( $file_name !== '' ) {
        $code = $_POST['xxTable'] .'_' . $_POST['xxField'] .'_'. substr($ob->getKey(), 10, 32) .'_';
        $upload_file = $uploads_dir .$code. $file_name;
        if ( move_uploaded_file($tmp_name, $upload_file) ) {
        } else {
            $result['success'] = false;
            $result['msg'] = 'No se ha podido guardar el archivo que contiene el PDF adjuntado';
        }
    }
} else {

}
echo json_encode($result);
?>