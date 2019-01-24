<?php
//session_start();
require_once 'db/public_personas.php';
$ob = new Public_Personas();
$ob->setPers_id( $_POST['xxPers_id'] == '' ? '0' : $_POST['xxPers_id'] );
$ob->setPers_key( $_POST['xxPers_key'] );
$ob->setTipdocident_id( $_POST['xxTipdocident_id'] == '' ? '0' : $_POST['xxTipdocident_id'] );
$ob->setPers_ruc( $_POST['xxPers_ruc'] );
$ob->setPers_nombre( $_POST['xxPers_nombre'] );
$ob->setIndiv_id( $_POST["xxIndiv_id"] == '' ? '0' : $_POST['xxIndiv_id'] );
$ob->setPerstransp_code( $_POST['xxPerstransp_code'] );
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
if ( $_POST['xxType_record'] == 'data_window' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pers_ruc' => $row['pers_ruc'], 'pers_nombre' => $row['pers_nombre']);
    }
} else if ( $_POST['xxType_record'] == 'form' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pers_key' => $row['pers_key'], 'tipdocident_id' => $row['tipdocident_id'], 'pers_ruc' => $row['pers_ruc'],
                        'pers_nombre' => $row['pers_nombre'], 'pers_nombre02'  => $row['pers_nombre02'], 'pers_abrev' => $row['pers_abrev'],
                        'pais_id' => $row['pais_id'], 'dpto_id' => $row['dpto_id'], 'prvn_id' => $row['prvn_id'], 'dstt_id' => $row['dstt_id'],
                        'pers_domicilio' => $row['pers_domicilio'], 'pers_mail' => $row['pers_mail'], 'pers_web' => $row['pers_web'],
                        'pers_rnp' => $row['pers_rnp'], 'pers_observ' => $row['pers_observ'],
                        'indiv_key' => $row['indiv_key'], 'indiv_dni' => $row['indiv_dni'], 'indiv_apenom' => $row['indiv_apenom'] );
    }
} else if ( $_POST['xxType_record'] == 'grid' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pers_key' => $row['pers_key'], 'tipdocident_id' => $row['tipdocident_id'], 'pers_ruc' => $row['pers_ruc'], 'pers_nombre' => $row['pers_nombre'],
                        'pers_domicilio' => $row['pers_domicilio'], 'pers_ubigeo' => $row['pers_ubigeo'], 'tipdocident_abrev' => $row['tipdocident_abrev']);
    }
} else if ( $_POST['xxType_record'] == 'grid_logistics' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pers_key' => $row['pers_key'], 'tipdocident_id' => $row['tipdocident_id'], 'pers_ruc' => $row['pers_ruc'], 'pers_nombre' => $row['pers_nombre'],
                        'pers_domicilio' => $row['pers_domicilio'], 'pers_ubigeo' => $row['pers_ubigeo'], 'tipdocident_abrev' => $row['tipdocident_abrev'],
                        'persacce_fecha' => $row['persacce_fecha'], 'clav_id' => $row['clav_id']);
    }
} else if ( $_POST['xxType_record'] == 'grid_operations' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pers_key' => $row['pers_key'], 'tipdocident_id' => $row['tipdocident_id'], 'pers_ruc' => $row['pers_ruc'], 'pers_nombre' => $row['pers_nombre'],
                        'pers_domicilio' => $row['pers_domicilio'], 'pers_ubigeo' => $row['pers_ubigeo'], 'tipdocident_abrev' => $row['tipdocident_abrev'], 
                        'persimpor_code' => $row['persimpor_code'], 'perstransp_code' => $row['perstransp_code'] );
    }
} else if ( $_POST['xxType_record'] == 'grid_search' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pers_key' => $row['pers_key'], 'pers_ruc' => $row['pers_ruc'], 'pers_nombre' => $row['pers_nombre'],
                        'tipdocident_abrev' => $row['tipdocident_abrev']);
    }
} else if ( $_POST['xxType_record'] == 'grid_personas_transportistas_search' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('pers_key' => $row['pers_key'], 'pers_ruc' => $row['pers_ruc'], 'pers_nombre' => $row['pers_nombre'],
                        'perstransp_code' => $row['perstransp_code']);
    }
} else if ( $_POST['xxType_record'] == 'textfield_search' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('key' => $row['pers_key'], 'value' => $row['pers_ruc'], 'name' => $row['pers_nombre']);
    }        
} else if ( $_POST['xxType_record'] == 'textfield_search_transportista' ) {
    foreach ( $ar as $row ) {
        $_dat[] = array('key' => $row['pers_key'], 'value' => $row['perstransp_code'],
                        'name' => $row['pers_nombre'] . ($row['pers_ruc']==''?'':'  ['.$row['pers_ruc'].']'));
    }
} else {
    foreach ( $ar as $row ) {
        $_dat[] = array("pers_key"       => $row["pers_key"],        "tipdocident_id"  => $row["tipdocident_id"],   "pers_ruc"    => $row["pers_ruc"],
                        "pers_nombre"    => $row["pers_nombre"],     "pers_nombre02"   => $row["pers_nombre02"],    "pers_abrev"  => $row["pers_abrev"],
                        "indiv_id"       => $row["indiv_id"],        "tipactiv_id"     => $row["tipactiv_id"],      "pais_id"     => $row["pais_id"],
                        "dpto_id"        => $row["dpto_id"],         "prvn_id"         => $row["prvn_id"],          "dstt_id"     => $row["dstt_id"],
                        "pers_domicilio" => $row["pers_domicilio"],  "repleg_indiv_id" => $row["repleg_indiv_id"],  "grupempr_id" => $row["grupempr_id"],
                        "codpost_id"     => $row["codpost_id"],      "pers_mail"       => $row["pers_mail"],        "pers_web"    => $row["pers_web"],
                        "pers_rnp"       => $row["pers_rnp"],        "pers_observ"     => $row["pers_observ"],
                        "tipdocident_nombre" => $row["tipdocident_nombre"],  "tipdocident_abrev" => $row["tipdocident_abrev"],
                        "indiv_key" => $row["indiv_key"],  "indiv_dni" => $row["indiv_dni"],  "indiv_apenom" => $row["indiv_apenom"],
                        "repleg_indiv_key" => $row["repleg_indiv_key"],  "repleg_indiv_dni" => $row["repleg_indiv_dni"],  "repleg_apenom" => $row["repleg_apenom"],
                        "perstransp_code" => $row["perstransp_code"] );
    }
}

echo json_encode( array('success' => true, 'total' => $_total, 'subtotal' => count($_dat), 'data' => $_dat) );
?>