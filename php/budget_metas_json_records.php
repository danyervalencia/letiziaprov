<?php
require_once 'db/budget_metas.php';
$ob = new Budget_Metas();
$ob->setMeta_id( $_POST['xxMeta_id'] == '' ? '0' : $_POST['xxMeta_id'] );
$ob->setYear_id( $_POST['xxYear_id'] == '' ? '0' : $_POST['xxYear_id'] );
$ob->setFunc_code( $_POST['xxFunc_code'] );
$ob->setSecfunc_code( $_POST['xxSecfunc_code'] );
$ob->setActproy_code( $_POST['xxActproy_code'] );
$ob->setSecfunc_nombre( $_POST['xxSecfunc_nombre'] );
$ob->setArea_key( $_POST['xxArea_key'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

if ( $_POST['xxPaginate'] == '1' ) {
	 $ob->setRecord_limit('');
	 $ar = $ob->registros();
	 foreach ( $ar as $row ) { $_total = $row['treg']; }

	 $ob->setRecord_limit( $_REQUEST['limit'] );  
	 $ob->setRecord_start( $_REQUEST['start'] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'combo' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('meta_id' => '0', 'secfunc_code' => '', 'secfunc_nombre' => ''); }
	foreach ( $ar as $row ) {
		$_dat[] = array('meta_id' => $row['meta_id'], 'secfunc_code' => $row['secfunc_code'], 'secfunc_nombre' => $row['secfunc_nombre']);
	}
} else if ( $_POST['xxType_record'] == 'combo_codename' ) {
	if ( $_POST['xxAdd_blank'] == 'YES' ) { $_dat[] = array('meta_id' => '0', 'secfunc_codename' => ''); }
	foreach ( $ar as $row ) {
		$_dat[] = array('meta_id' => $row['meta_id'], 'secfunc_codename' => $row['secfunc_codename']);
	}
} else if ( $_POST['xxType_record'] == 'form' ) {
	foreach ( $ar as $row ) {
		$_dat[] = array('meta_id' => $row['meta_id'], 'year_id' => $row['year_id'], 'secfunc_code' => $row['secfunc_code'], 'func_code' => $row['func_code'], 'prog_code' => $row['prog_code'], 'subprog_code' => $row['subprog_code'], 'actproy_code' => $row['actproy_code'], 
			            'secfunc_nombre' => $row['secfunc_nombre'], 'secfunc_fechaini' => $row['secfunc_fechaini'], 'secfunc_fechafin' => $row['secfunc_fechafin'], 'secfunc_latitud' => $row['secfunc_latitud'], 'secfunc_longitud' => $row['secfunc_longitud'], 'secfunc_observ' => $row['secfunc_observ']);
	}
} else if ( $_POST['xxType_record'] == 'grid' ) {
	foreach ( $ar as $row ) {
		$_dat[] = array('meta_id' => $row['meta_id'], 'secfunc_code' => $row['secfunc_code'], 'secfunc_nombre' => $row['secfunc_nombre'], 'secfunc_codigo' => $row['secfunc_codigo']);
	}
}

echo json_encode( array('success'=>1, 'total'=>$_total, 'subtotal' => count($_dat), 'data'=>$_dat) );
?>