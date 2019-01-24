<?php
require_once "db/siaf_expediente_secuencia.php";

$ob = new Siaf_Expediente_Secuencia();
$ob->setExpe_nro( $_POST["xxExpe_nro"] == "" ? "0" : $_POST["xxExpe_nro"] );
$ob->setCicl_code( $_POST["xxCicl_code"] );
$ob->setFase_code( $_POST["xxFase_code"] );
$ob->setExpefase_secuencia( $_POST["xxExpefase_secuencia"] == "" ? "0" : $_POST["xxExpefase_secuencia"] );
$ob->setDoc_code( $_POST["xxDoc_code"] );
$ob->setDoc_num( $_POST["xxDoc_num"] );
$ob->setType_record( $_POST["xxType_record"] );
$ob->setType_query( $_POST["xxType_query"] );
$ob->setOrder_by( $_POST["xxOrder_by"] );

if ( $_POST["xxPag"] == "1" ) {
     $ob->setRecord_limit("");
     $ar = $ob->registros();
     foreach ( $ar as $row ) { $_total = $row["treg"]; }

     $ob->setRecord_limit( $_POST["limit"] );
     $ob->setRecord_start( $_POST["start"] );
}
$ar = $ob->registros();

$_dat = array();
if ( $_POST["xxType_record"] == "grd" ) {
    foreach ( $ar as $row ) {
        $_dat[] = array("year_id"=>$row["year_id"], "cicl_code"=>$row["cicl_code"], "fase_code"=>$row["fase_code"], "doc_code"=>$row["doc_code"], "doc_serie"=>$row["doc_serie"], "doc_num"=>$row["doc_num"], "doc_fecha"=>$row["doc_fecha"],
                        "year_ctacte"=>$row["year_ctacte"], "banc_code"=>$row["banc_code"], "ctacte_code"=>$row["ctacte_code"], "mone_code"=>$row["mone_code"], "expesecuen_monto"=>$row["expesecuen_monto"], "expesecuen_estado_envio"=>$row["expesecuen_estado_envio"], 
                        "tippag_codigo"=>$row["tippag_codigo"], "rubr_codigo"=>$row["rubr_codigo"], "certif_codigo"=>$row["certif_codigo"],);
    }
}

echo json_encode(array("success"=>true, "total"=>$_total, "subtotal"=>count($_dat), "data"=>$_dat));