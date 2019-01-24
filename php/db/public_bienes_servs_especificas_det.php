<?php
require_once 'conexion.php';

class Public_Bienes_Servs_Especificas_Det extends Conexion {
    private $bsespedet_id = 0;  private $bs_id = 0;  private $espedet_id = 0;  private $bsespedet_observ = '';  private $bsespedet_estado = 'NULL'; private $bsespedet_key = '';
    private $bs_key = '';  private $bst_id = 0;  private $bsg_id = 0;  private $bsc_id = 0;  private $bsf_id = 0;  private $bs_nombre = '';
    private $espedet_siaf = ''; private $espedet_type = ''; 
    private $tarea_key = ''; private $tipgast_id = 0; private $tipgast_code = ''; private $fuefin_id = 0; private $tiprecur_id = 0;

    public function setBsespedet_id( $val )     { $this->bsespedet_id = $val; }
    public function getBsespedet_id()           { return $this->bsespedet_id; }

    public function setBs_id( $val )            { $this->bs_id = $val; }
    public function getBs_id()                  { return $this->bs_id; }

    public function setEspedet_id( $val )       { $this->espedet_id = $val; }
    public function getEspedet_id()             { return $this->espedet_id; }

    public function setBsespedet_observ( $val ) { $this->bsespedet_observ = $val; }
    public function getBsespedet_observ()       { return $this->bsespedet_observ; }

    public function setBsespedet_estado( $val ) { $this->bsespedet_estado = $val; }
    public function getBsespedet_estado()       { return $this->bsespedet_estado; }

    public function setBsespedet_key( $val )    { $this->bsespedet_key = $val; }
    public function getBsespedet_key()          { return $this->bsespedet_key; }

    public function setBs_key( $val ) { $this->bs_key = $val; }
    public function getBs_key() { return $this->bs_key; }

    public function setBst_id( $val ) { $this->bst_id = $val; }
    public function getBst_id() { return $this->bst_id; }

    public function setBsg_id( $val ) { $this->bsg_id = $val; }
    public function getBsg_id() { return $this->bsg_id; }

    public function setBsc_id( $val ) { $this->bsc_id = $val; }
    public function getBsc_id() { return $this->bsc_id; }

    public function setBsf_id( $val ) { $this->bsf_id = $val; }
    public function getBsf_id() { return $this->bsf_id; }

    public function setBs_nombre( $val ) { $this->bs_nombre = $val; }
    public function getBs_nombre() { return $this->bs_nombre; }

    public function setEspedet_siaf( $val ) { $this->espedet_siaf = $val; }
    public function getEspedet_siaf() { return $this->espedet_siaf; }

    public function setEspedet_type( $val ) { $this->Espedet_type = $val; }
    public function getEspedet_type() { return $this->Espedet_type; }

    public function setTarea_key( $val ) { $this->tarea_key = $val; }
    public function getTarea_key() { return $this->tarea_key; }

    public function setTipgast_id( $val ) { $this->tipgast_id = $val; }
    public function getTipgast_id() { return $this->tipgast_id; }

    public function setTipgast_code( $val ) { $this->tipgast_code = $val; }
    public function getTipgast_code() { return $this->tipgast_code; }

    public function setFuefin_id( $val ) { $this->fuefin_id = $val; }
    public function getFuefin_id() { return $this->fuefin_id; }

    public function setTiprecur_id( $val ) { $this->tiprecur_id = $val; }
    public function getTiprecur_id() { return $this->tiprecur_id; }

    public function actualiza() {
        $this->sql = "SELECT bienes_servs_especificas_det_update('$this->type_edit', '$this->bsespedet_id', '$this->bsespedet_key', '$this->bs_key',
                          '$this->espedet_id', '$this->bsespedet_observ', '$this->bsespedet_estado', '$this->usursess_key', '$this->menu_id')";
        //echo $this->sql;
        $this->bsespedet_key = parent::execute_01();
    }

    public function registros() {
        $this->sql = "SELECT bienes_servs_especificas_det_records('o',
                         '$this->bsespedet_id', '$this->bsespedet_key', '$this->bs_id', '$this->espedet_id', $this->bsespedet_estado,
                         '$this->bs_key', '$this->bst_id', '$this->bsg_id', '$this->bsc_id', '$this->bsf_id', '$this->bs_nombre', '$this->espedet_siaf',
                         '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }

    public function registros_saldos() {
        $this->sql = "SELECT bienes_servs_especificas_det_records_balances('o',
                         '$this->bs_id', '$this->espedet_id', '$this->bs_key', '$this->bst_id', '$this->tarea_key', '$this->tipgast_id', '$this->tipgast_code',
                         '$this->fuefin_id', '$this->tiprecur_id', '$this->espedet_type',
                         '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>