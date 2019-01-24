<?php
require_once 'conexion.php';

class Public_Bienes_Servs extends Conexion {
    private $bs_id = 0;  private $bs_flga = '';  private $bst_id = 0;  private $bsg_id = 0;  private $bsc_id = 0;  private $bsf_id = 0;   
    private $bs_code = '';  private $bs_nombre = '';  private $bs_abrev = '';  private $unimed_id = 0;  
    private $bs_peso = 0;  private $marc_id = 0;  private $mod_id = 0;  private $partaran_id = 0;  private $bs_foto = '';
    private $bs_observ = '';  private $bs_estado_compl = 'NULL';  private $bs_estado = 'NULL';  private $bs_key = '';

    private $bs_codigo = '';
    private $bst_code = '';  private $bsg_code = '';  private $bsc_code = '';  private $bsf_code = '';
    private $marc_key = '';  private $mod_key  = '';  private $partaran_key = '';
    private $lote_id  = 0;  private $bsalma_key = '';  private $bsalma_code = '';
    private $pers_id  = 0;  private $pers_key = '';

    public function setBs_id( $val )     { $this->bs_id = $val; }
    public function getBs_id()           { return $this->bs_id; }

    public function setBs_flga( $val )   { $this->bs_flga = $val; }
    public function getBs_flga()         { return $this->bs_flga; }

    public function setBst_id( $val )    { $this->bst_id = $val; }
    public function getBst_id()          { return $this->bst_id; }
    
    public function setBsg_id( $val )    { $this->bsg_id = $val; }
    public function getBsg_id()          { return $this->bsg_id; }

    public function setBsc_id( $val )    { $this->bsc_id = $val; }
    public function getBsc_id()          { return $this->bsc_id; }

    public function setBsf_id( $val )    { $this->bsf_id = $val; }
    public function getBsf_id()          { return $this->bsf_id; }

    public function setBs_code( $val )   { $this->bs_code = $val; }
    public function getBs_code()         { return $this->bs_code; }

    public function setBs_nombre( $val ) { $this->bs_nombre = $val; }
    public function getBs_ombre()        { return $this->bs_nombre; }

    public function setBs_abrev( $val )  { $this->bs_abrev = $val; }
    public function getBs_abrev()        { return $this->bs_abrev; }

    public function setUnimed_id( $val ) { $this->unimed_id = $val; }
    public function getUnimed_id()       { return $this->unimed_id; }

    public function setBs_peso( $val )   { $this->bs_peso = $val; }
    public function getBs_peso()         { return $this->bs_peso; }

    public function setMarc_id( $val )   { $this->marc_id = $val; }
    public function getMarc_id()         { return $this->marc_id; }

    public function setMod_id( $val )      { $this->mod_id = $val; }
    public function getMod_id()            { return $this->mod_id; }

    public function setPartaran_id( $val ) { $this->partaran_id = $val; }
    public function getPartaran_id()       { return $this->partaran_id; }

    public function setBs_foto( $val )     { $this->bs_foto = $val; }
    public function getBs_foto()           { return $this->bs_foto; }

    public function setBs_observ( $val )   { $this->bs_observ = $val; }
    public function getBs_observ()         { return $this->bs_observ; }

    public function setBs_estado_compl( $val ) { $this->bs_estado_compl = $val; }
    public function getBs_estado_compl()       { return $this->bs_estado_compl; }

    public function setBs_estado( $val )   { $this->bs_estado = $val; }
    public function getBs_estado()         { return $this->bs_estado; }

    public function setBs_key( $val )      { $this->bs_key = $val; }
    public function getBs_key()            { return $this->bs_key; }

    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */  
    public function setBs_codigo( $val ) { $this->bs_codigo = $val; }
    public function getBs_codigo() { return $this->bs_codigo; }

    public function setAgrupar( $val ) { $this->agrupar = $val; }
    public function getAgrupar() { return $this->agrupar; }

    public function setBst_code( $val ) { $this->bst_code = $val; }
    public function getBst_code() { return $this->bst_code; }

    public function setBsg_code( $val ) { $this->bsg_code = $val; }
    public function getBsg_code() { return $this->bsg_code; }

    public function setBsc_code( $val ) { $this->bsc_code = $val; }
    public function getBsc_code() { return $this->bsc_code; }

    public function setBsf_code( $val ) { $this->bsf_code = $val; }
    public function getBsf_code() { return $this->bsf_code; }

    public function setMarc_key( $val ) { $this->marc_key = $val; }
    public function getMarc_key() { return $this->marc_key; }

    public function setMod_key( $val ) { $this->mod_key = $val; }
    public function getMod_key() { return $this->mod_key; }

    public function setPartaran_key( $val ) { $this->partaran_key = $val; }
    public function getPartaran_key() { return $this->partaran_key; }

    public function setLote_id( $val ) { $this->lote_id = $val; }
    public function getLote_id() { return $this->lote_id; }

    public function setBsalma_key( $val ) { $this->bsalma_key = $val; }
    public function getBsalma_key() { return $this->bsalma_key; }

    public function setBsalma_code( $val ) { $this->bsalma_code = $val; }
    public function getBsalma_code() { return $this->bsalma_code; }

    public function setPers_id( $val ) { $this->pers_id = $val; }
    public function getPers_id() { return $this->pers_id; }

    public function setPers_key( $val ) { $this->pers_key = $val; }
    public function getPers_key() { return $this->pers_key; }

    public function actualiza() {
        $this->sql = "SELECT bienes_servs_update(
                          '$this->type_edit', '$this->bs_key', '$this->bst_id', '$this->bsg_id', '$this->bsc_id', '$this->bsf_id', '$this->bs_code', 
                          '$this->bs_nombre', '$this->bs_abrev', '$this->unimed_id', '$this->bs_peso', '$this->marc_key', '$this->mod_key',
                          '$this->partaran_key', '$this->bs_foto', '$this->bs_observ', '$this->bs_estado_compl', '$this->bs_estado',
                          '$this->usursess_key', '$this->bsalma_key', '$this->alma_key', '$this->bsalma_code')";
        //echo $this->sql;
        $this->bs_key = parent::execute_01();
    }

    public function actualiza_estado() {
        $this->sql = "SELECT catalogo_bien_serv_update_status('$this->bien_key', '$this->bien_estado', '$this->usuracce_key')";
        $this->bien_key = parent::execute_01();
    }

    public function efv() {
        $this->sql = "SELECT catalogo_bien_serv_efv('o', 
                          '$this->ano_eje',  '$this->sec_ejec', '$this->tipgast_id', '$this->area_id',   '$this->sec_func',  '$this->tarea_id',  '$this->tareacomp_id',
                          '$this->bien_id',  '$this->bien_key', '$this->itembs_id',  '$this->grupbs_id', '$this->clasbs_id', '$this->famibs_id', '$this->itembs_id',
                          '$this->fechaini', '$this->fechafin',
                          '$this->tipo_reporte', '$this->order_by'); 
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }

    public function ma() {
    	$this->sql = "SELECT catalogo_bien_serv_ma('o', 
                          '$this->ano_eje',  '$this->sec_ejec', '$this->tipgast_id',  '$this->area_id',  '$this->sec_func', '$this->tarea_id',  '$this->tareacomp_id',
                          '$this->bien_id', '$this->bien_key',  '$this->bien_codigo', '$this->fechaini', '$this->fechafin', '$this->order_by');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }

    public function registros() {
        $this->sql  = "SELECT bienes_servs_records('o', '$this->bs_id', '$this->bs_key',
                            '$this->bst_id', '$this->bsg_id', '$this->bsc_id', '$this->bsf_id', '$this->bs_code',
                            '$this->bs_nombre', '$this->bs_abrev', '$this->unimed_id', '$this->partaran_id', $this->bs_estado, '$this->bs_codigo',
                            '$this->bst_code',  '$this->bsg_code', '$this->bsc_code',  '$this->bsf_code', '$this->partaran_key', '$this->alma_id', '$this->alma_key',
                            '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                       FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }

    public function reporte_stock() {
        $this->sql  = "SELECT operations.almacenes_report_stock('o', 
                            '$this->alma_id',   '$this->alma_key',  '$this->lote_id',  '$this->pers_id',  '$this->pers_key',
                            '$this->bs_id',     '$this->bs_key',    '$this->bst_id',   '$this->bsg_id',   '$this->bsc_id',   '$this->bsf_id',
                            '$this->bs_nombre', '$this->partaran_id',   '$this->partaran_key', '$this->fechaini', '$this->fechafin',
                            '$this->type_report', '$this->order_by', '$this->record_limit', '$this->record_start');
                       FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>