<?php
$result["success"] = false;
if ($_POST["xx0005"] !== "YES"){$result["msg"]="Usuario intruso no hay permiso de conexión"; echo json_encode($result); exit;}
require_once "session_validate.php";
if ($result["success"] == false){echo json_encode($result); exit;}

$result["success"] = false;
if ( isset($_FILES) ) {
	$_upload_dir = '../attach/';
	$_file1_name = $_FILES['ffiCoti_file1']['name'];
	$_tmp1_name  = $_FILES['ffiCoti_file1']['tmp_name'];
	$_file1_size = $_FILES['ffiCoti_file1']['size'];
	$_file1_type = $_FILES['ffiCoti_file1']['type'];
}

require_once 'resources/functions.php';
require_once 'db/logistics_cotizaciones.php';
$ob = new Logistics_Cotizaciones();
$ob->setType_edit( $_POST['xxType_edit'] );
$ob->setCoti_key( $_POST['coti_key'] );
$ob->setTipcoti_id( '5017' );
$ob->setCoti_fecha( $_POST['xxCoti_fecha'] );
$ob->setCoti_vigencia( $_POST['coti_vigencia'] == '' ? '0' : $_POST['coti_vigencia']);
$ob->setCoti_plazo( $_POST['coti_plazo'] == '' ? '0' : $_POST['coti_plazo']);
$ob->setCoti_garantia( $_POST['coti_garantia'] == '' ? 'NULL' : "'".$_POST['coti_garantia']."'");
$ob->setTippag_id( $_POST['xxTippag_id'] == '' ? 'NULL' : "'".$_POST['xxTippag_id']."'");
$ob->setLugentr_id( $_POST['lugentr_id'] == '' ? 'NULL' : "'".$_POST['lugentr_id']."'");
$ob->setCoti_monto( $_POST['xxCoti_monto'] );
$ob->setCoti_file1( $_file1_name == '' ? $_POST['coti_file1'] : $_file1_name );
$ob->setCoti_observ( $_POST['coti_observ'] );
$ob->setPed_key( $_POST['ped_key'] );
$ob->setCoti_ip( fnGetRealIP() );
$ob->setPerssess_key( $_PERSSESS_KEY );
$ob->setMenu_id( $_POST['xxMenu_id'] == '' ? '0' : $_POST['xxMenu_id']);
$ob->setDet( '{'.$_POST['xxDet'].'}' );

$ob->actualiza();
if ( substr($ob->getCoti_key(), 0, 10) == 'YTLLLL-OVC' ) {
	$result['success'] = true;
	$result['msg'] = 'Datos se han guardado en forma satisfactoria';
	$result['key'] = substr($ob->getCoti_key(), 10, 32);

	if ( $_file1_name == '' ) {
	} else {
		$_code = 'logistics_cotizaciones_file1_' . trim(substr($ob->getCoti_key(), 42, 10)) .'_';
		$_upload_file1 = $_upload_dir .$_code. $_file1_name;

		if ( move_uploaded_file($_tmp1_name, $_upload_file1) ) {
		} else {
			$result['success'] = false;
			$result['msg'] = 'No se ha podido guardar el archivo (1) que contiene el PDF adjuntado';
		}
	}
}

echo json_encode($result);