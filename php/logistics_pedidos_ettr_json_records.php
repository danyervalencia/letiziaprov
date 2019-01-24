<?php
//session_start();
require_once 'db/logistics_pedidos_ettr.php';
$ob = new Logistics_Pedidos_Ettr();
$ob->setPedettr_id( $_POST['xxPedettr_id'] == '' ? '0' : $_POST['xxPedettr_id'] );
$ob->setPedettr_key( $_POST['xxPedettr_key'] );
$ob->setPed_id( $_POST['xxPed_id'] == '' ? '0' : $_POST['xxPed_id'] );
$ob->setPed_key( $_POST['xxPed_key'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

if ( $_POST['xxPaginate'] == '1' ) {
     $ob->setRecord_limit('');
     $ar = $ob->registros();
     foreach ( $ar as $row ) { $_total = $row['treg']; }

     $ob->setRecord_limit( $_POST['limit'] );  
     $ob->setRecord_start( $_POST['start'] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'attachments' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pedettr_file1' => $row['pedettr_file1'], 'pedettr_file2' => $row['pedettr_file2']);
    }
} else if ( $_POST['xxType_record'] == 'form' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pedettr_key' => $row['pedettr_key'], 'pedettr_nombre' => $row['pedettr_nombre'], 'pedettr_finalidad' => $row['pedettr_finalidad'], 'pedettr_objetivo' => $row['pedettr_objetivo'], 'pedettr_condiciones' => $row['pedettr_condiciones'], 'lugentr_id' => $row['lugentr_id'], 'pedettr_lugar' => $row['pedettr_lugar'], 'pedettr_actividades' => $row['pedettr_actividades'],  'pedettr_entregable' => $row['pedettr_entregable'],
                        'pedettr_persona' => $row['pedettr_persona'], 'pedettr_plazo' => $row['pedettr_plazo'], 'tipplaz_id' => $row['tipplaz_id'], 'pedettr_plazo_nro' => $row['pedettr_plazo_nro'], 'pedettr_fechaini' => $row['pedettr_fechaini'], 'pedettr_fechafin' => $row['pedettr_fechafin'], 'pedettr_garantia' => $row['pedettr_garantia'],  'pedettr_garantia_nro' => $row['pedettr_garantia_nro'],  'pedettr_forma_pago' => $row['pedettr_forma_pago'],
                        'pedettr_supervisa' => $row['pedettr_supervisa'], 'pedettr_penalidad' => $row['pedettr_penalidad'], 'pedettr_otros' => $row['pedettr_otros'], 'pedettr_file1' => $row['pedettr_file1'], 'pedettr_file2' => $row['pedettr_file2'], 'ped_key' => $row['ped_key']);
    }
}

echo json_encode( array('success'=>1, 'total'=>$lnTreg, 'data'=>$_dat) );
?>