<?php
require_once 'db/public_messages.php';

$ob = new Public_Messages();
$ob->setMess_id( $_POST['xxMess_id'] == '' ? '0' : $_POST['xxMess_id'] );
$ob->setMess_key( $_POST['xxMess_key'] );
$ob->setUsur01_key( $_POST['xxUsur01_key'] );
$ob->setUsur02_key( $_POST['xxUsur02_key'] );
$ob->setFechaini( $_POST['fechaini'] );
$ob->setFechafin( $_POST['fechafin'] );
$ob->setType_record( $_POST['xxType_record'] );
$ob->setType_query( $_POST['xxType_query'] );
$ob->setOrder_by( $_POST['xxOrder_by'] );

if ( $_POST['xxPaginate'] == '1' ) {
     $ob->setRecord_limit('');
     $ar = $ob->registros();
     foreach ( $ar as $row ) { $_total = $row["treg"]; }

     $ob->setRecord_limit( $_POST['limit'] );
     $ob->setRecord_start( $_POST['start'] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST['xxType_record'] == 'form' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('mess_id' => $row['mess_id'], 'mess_key' => $row['mess_key'], 'mess_title' => $row['mess_title'], 'mess_texto' => $row['mess_texto'], 'mess_fecha' => $row['mess_fecha'],  
                        'indiv_key' => $row['indiv_key'], 'indiv_dni' => $row['indiv_dni'], 'indiv_apenom' => $row['indiv_apenom']);
    }
} else if ( $_POST['xxType_record'] == 'grid' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('mess_key'  => $row['mess_key'],  'indiv_dni'  => $row['indiv_dni'],  'usur_login' => $row['usur_login'],
                        'mess_title' => $row['mess_title'], 'mess_fecha' => $row['mess_fecha']);
    }
} else if ( $_POST['xxType_record'] == 'grid_search' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('indiv_dni' => $row['indiv_dni'], 'indiv_apenom' => $row['indiv_apenom'], 'tipdocident_abrev' => $row['tipdocident_abrev'], 'indiv_key' => $row['indiv_key']);
     }
} else if ( $_POST['xxType_record'] == 'textfield_search' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('key' => $row['indiv_key'], 'value' => $row['indiv_dni'], 'name' => $row['indiv_apenom']);
    }
} else {
    foreach ( $ar as $row ) {
        $_dat[] = array("indiv_key"       => $row["indiv_key"],        "tipdocident_id"  => $row["tipdocident_id"],   "indiv_dni"     => $row["indiv_dni"],
                        "indiv_appaterno" => $row["indiv_appaterno"],  "indiv_apmaterno" => $row["indiv_apmaterno"],  "indiv_nombres" => $row["indiv_nombres"],
                        "tipsex_id"       => $row["tipsex_id"],        "tipestaciv_id"   => $row["tipestaciv_id"],
                        "indiv_fechanac"  => $row["indiv_fechanac"],   "pais_id"         => $row["pais_id"],
                        "dpto_id"         => $row["dpto_id"],          "prvn_id"         => $row["prvn_id"],          "dstt_id"       => $row["dstt_id"],
                        "indivdomi_domicilio" => $row["indivdomi_domicilio"],
                        "indiv_mail"    => $row["indiv_mail"], 
                        "indiv_peso"      => $row["indiv_peso"],       "indiv_talla"     => $row["indiv_talla"],      "tipsang_id"    => $row["tipsang_id"], 
                        "tipgradinstr_id" => $row["tipgradinstr_id"],  "tipliccond_id"   => $row["tipliccond_id"],    "indiv_liccond_nro" => $row["indiv_liccond_nro"],
                        "indiv_foto"      => $row["indiv_foto"],       "indiv_pdf"       => $row["indiv_pdf"],        "indiv_observ"  => $row["indiv_observ"],
                        "indiv_key"       => $row["indiv_key"],        "indiv_apenom"    => $row["indiv_apenom"],
                        "tipdocident_nombre" => $row["tipdocident_nombre"],  "tipdocident_abrev" => $row["tipdocident_abrev"],
                        "tipsex_nombre" => $row["tipsex_nombre"],  "tipsex_abrev" => $row["tipsex_abrev"],
                        "tipestaciv_nombre" => $row["tipestaciv_nombre"],  "tipestaciv_abrev" => $row["tipestaciv_abrev"],
                        "tipsang_nombre" => $row["tipsang_nombre"],  "tipsang_abrev" => $row["tipsang_abrev"],
                        "indivfpf_dpto_id" => $row["indivfpf_dpto_id"],  "indivfpf_prvn_id" => $row["indivfpf_prvn_id"], 
                        "indivfpf_dstt_id" => $row["indivfpf_dstt_id"],  "indivfpf_dpto_fpf" => $row["indivfpf_dpto_fpf"], "indivfpf_nro" => $row["indivfpf_nro"]);
    }
}
// total viene de la config totalProperty que por default es total
echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat ) );
?>