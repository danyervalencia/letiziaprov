<?php
/*if ( $_REQUEST['xxSchema_table'] == '' ) {
	$_table = $_REQUEST['xxTable'];
	$_field = $_REQUEST['xxField'];
	$_file_name = $_REQUEST['xxFile_name'];
} else {
	require_once '../db/modelo.php';
	$ob = new Modelo();
	$ob->setTable( $_REQUEST['xxSchema_table'] );
	$ob->setField( $_REQUEST['xxTable_field'] );
	$ob->setValue( $_REQUEST['xxRecord_key'] );
	$ar = $ob->registros();
	$_table = $_REQUEST['xxTable'];
	$_field = $_REQUEST['xxField'];
	//$_file_name = $ar[0][$_REQUEST['xxRecord_field']];
	$_file_name = $_REQUEST['xxRecord_key'] .'_'. $ar[0][$_REQUEST['xxRecord_field']];
	//echo '___'.   $ar[0][$_REQUEST['xxRecord_field']] .'___';
}*/
if ( $_REQUEST["xxFile"] != "" ) {
	$_table = "";
	$_field = "";
	$_file_name = $_REQUEST["xxFile"];
} else if ( $_REQUEST["xxSchema_table"] == "" ) {
	$_table = $_REQUEST["xxTable"];
	$_field = $_REQUEST["xxField"];
	$_file_name = $_REQUEST["xxFile_name"];
} else {
	require_once "../resources/functions.php";
	require_once "../db/modelo.php";
	$ob = new Modelo();
	$ob->setTable( $_REQUEST["xxSchema_table"] );
	$ob->setField( $_REQUEST["xxTable_field"] );
	$ob->setValue( $_REQUEST["xxRecord_key"] );
	$ar = $ob->registros();
	$_table = $_REQUEST["xxTable"];
	$_field = $_REQUEST["xxField"];
	//$_file_name = $ar[0][$_REQUEST['xxRecord_field']];
	$_file_name = ($_REQUEST["xxRecord_id"]==""?$_REQUEST["xxRecord_key"]:fnZerosLeft($ar[0][$_REQUEST["xxRecord_id"]]*1,10)) ."_". $ar[0][$_REQUEST["xxRecord_field"]];
	//echo $_file_name;
}

$_ln = strlen( $_file_name );
$_extn = strtolower( substr( $_file_name, $_ln-3, 3 ) );
if ( $_file_name !== '' ) {
	switch ( $_extn ) {
		case 'pdf': $_file_type = 'Content-type: application/pdf'; break;
		case 'exe': $_file_type = 'Content-type: application/octet-stream'; break;
		case 'zip': $_file_type = 'Content-type: application/zip'; break;
		case 'doc': $_file_type = 'Content-type: application/msword'; break;
		case 'ocx': $_file_type = 'Content-type: application/msword'; break;
		case 'xls': $_file_type = 'Content-type: application/vnd.ms-excel'; break;
		case 'lsx': $_file_type = 'Content-type: application/vnd.ms-excel'; break;
		case 'ppt': $_file_type = 'Content-type: application/vnd.ms-powerpoint'; break;
		case 'gif': $_file_type = 'Content-type: image/gif'; break;
		case 'png': $_file_type = 'Content-type: image/png'; break;
		case 'jpeg':
		case 'jpg': $_file_type = 'Content-type: image/jpg'; break;
		default: $_file_type='Content-type: application/force-download';
	}

	if ( $_table == "logistics_pedidos_ettr" ) {
		$_enlace = '../../../letizia/attach/' . $_table .'_'. ($_field == '' ? '' : $_field.'_') . $_file_name; //.$id;
	}else{
		$_enlace = '../../attach/' . $_table .'_'. ($_field == '' ? '' : $_field.'_') . $_file_name; //.$id;
	}
	//echo $_enlace;
	//header('Content-type: application/pdf'); 
	header($_file_type); 
	//header('Content-type: application/force-download'); // obliga a descargar
	header ('Content-Disposition: attachment; filename='.$_file_name.' ');
	//header ('Content-Type: application/octet-stream');
	//header('Content-Transfer-Encoding: binary'); 
	header ('Content-Length: '.filesize($_enlace));
	readfile($_enlace);
}
?>