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

$result['success'] = false;
if ( isset($_FILES) ) {
	$_upload_dir = '../attach/';
	$_file1_name = $_FILES['ffiPedettr_file1']['name'];
	$_tmp1_name  = $_FILES['ffiPedettr_file1']['tmp_name'];
	$_file1_size = $_FILES['ffiPedettr_file1']['size'];
	$_file1_type = $_FILES['ffiPedettr_file1']['type'];

	$_file2_name = $_FILES['ffiPedettr_file2']['name'];
	$_tmp2_name  = $_FILES['ffiPedettr_file2']['tmp_name'];
	$_file2_size = $_FILES['ffiPedettr_file2']['size'];
	$_file2_type = $_FILES['ffiPedettr_file2']['type'];
}

require_once 'db/logistics_pedidos_ettr.php';
$ob = new Logistics_Pedidos_Ettr();
$ob->setType_edit( $_POST['xxType_edit'] );
$ob->setPedettr_key( $_POST['pedettr_key'] );
$ob->setPed_key( $_POST['ped_key'] );
$ob->setPedettr_nombre( $_POST['pedettr_nombre'] );
$ob->setPedettr_finalidad( $_POST['pedettr_finalidad'] );
$ob->setPedettr_objetivo( $_POST['pedettr_objetivo'] );
$ob->setPedettr_condiciones( $_POST['pedettr_condiciones'] );
$ob->setLugentr_id( $_POST['lugentr_id'] == '' ? 'NULL' : "'".$_POST['lugentr_id']."'" );
$ob->setPedettr_lugar( $_POST['pedettr_lugar'] );
$ob->setPedettr_actividades( $_POST['pedettr_actividades'] );
$ob->setPedettr_entregable( $_POST['pedettr_entregable'] );
$ob->setPedettr_persona( $_POST['pedettr_persona'] );
$ob->setPedettr_plazo( $_POST['pedettr_plazo'] );
$ob->setTipplaz_id( $_POST['tipplaz_id'] == '' ? 'NULL' : "'".$_POST['tipplaz_id']."'" );
$ob->setPedettr_plazo_nro( $_POST['pedettr_plazo_nro'] == '' ? 'NULL' : "'".$_POST['pedettr_plazo_nro']."'" );
$ob->setPedettr_fechaini( $_POST['pedettr_fechaini'] == '' ? 'NULL' : "'".$_POST['pedettr_fechaini']."'");
$ob->setPedettr_fechafin( $_POST['pedettr_fechafin'] == '' ? 'NULL' : "'".$_POST['pedettr_fechafin']."'");
$ob->setPedettr_garantia( $_POST['pedettr_garantia'] );
$ob->setPedettr_garantia_nro( $_POST['pedettr_garantia_nro'] == '' ? 'NULL' : "'".$_POST['pedettr_garantia_nro']."'");
$ob->setPedettr_forma_pago( $_POST['pedettr_forma_pago'] );
$ob->setPedettr_supervisa( $_POST['pedettr_supervisa'] );
$ob->setPedettr_penalidad( $_POST['pedettr_penalidad'] );
$ob->setPedettr_otros( $_POST['pedettr_otros'] );
$ob->setPedettr_file1( $_file1_name == '' ? $_POST['pedettr_file1'] : $_file1_name );
$ob->setPedettr_file2( $_file2_name == '' ? $_POST['pedettr_file2'] : $_file2_name );
$ob->setUsursess_key( $_USURSESS_KEY );

$ob->actualiza();
if ( substr($ob->getPedettr_key(), 0, 10) == 'YTLLLL-OVC' ) {
	$result['success'] = true;
	$result['msg'] = 'Datos se han guardado en forma satisfactoria';
	$result['key'] = substr($ob->getPedettr_key(), 10, 32);

	if ( $_file1_name == '' ) {
	} else {
		$_code = 'logistics_pedidos_ettr_file1_' . substr($ob->getPedettr_key(), 10, 32) .'_';
		$_upload_file1 = $_upload_dir .$_code. $_file1_name;

		if ( move_uploaded_file($_tmp1_name, $_upload_file1) ) {
		} else {
			$result['success'] = false;
			$result['msg'] = 'No se ha podido guardar el archivo (1) que contiene el PDF adjuntado';
		}
	}    
	if ( $_file2_name == '' ) {
	} else {
		$_code = 'logistics_pedidos_ettr_file2_' . substr($ob->getPedettr_key(), 10, 32) .'_';
		$_upload_file2 = $_upload_dir .$_code. $_file2_name;
		if ( move_uploaded_file($_tmp2_name, $_upload_file2) ) {
		} else {
			$result['success'] = false;
			$result['msg'] = 'No se ha podido guardar el archivo (2) que contiene el PDF adjuntado ['.$_file2_name.']';
		}
	}
} else {
}

echo json_encode($result);
?>