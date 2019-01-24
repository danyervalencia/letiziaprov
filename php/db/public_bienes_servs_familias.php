<?php
require_once 'conexion.php';

class Public_Bienes_Servs_Familias extends Conexion {
    private $bsf_id     = 0;  private $bst_id = 0;  private $bsg_id = 0;  private $bsc_id = 0;  private $bsf_code = '';  private $bsf_nombre = '';
    private $bsf_estado = '';

    private $bst_code = '';  private $bsg_code = '';  private $bsc_code = '';

    public function setBsf_id( $val )     { $this->bsf_id = $val; }
    public function getBsf_id()           { return $this->bsf_id; }

    public function setBst_id( $val )     { $this->bst_id = $val; }
    public function getBst_id()           { return $this->bst_id; }
 
    public function setBsg_id( $val )     { $this->bsg_id = $val; }
    public function getBsg_id()           { return $this->bsg_id; }

    public function setBsc_id( $val )     { $this->bsc_id = $val; }
    public function getBsc_id()           { return $this->bsc_id; }

    public function setBsf_code( $val )   { $this->bsf_code = $val; }
    public function getBsf_code()         { return $this->bsf_code; }
    
    public function setBsf_nombre( $val ) { $this->bsf_nombre = $val; }
    public function getBsf_nombre()       { return $this->bsf_nombre; }

    public function setBsf_estado( $val ) { $this->bsf_estado = $val; }
    public function getBsf_estado()       { return $this->bsf_estado; }

    public function setBst_code( $val ) { $this->bst_code = $val; }
    public function getBst_code()       { return $this->bst_code; }

    public function setBsg_code( $val ) { $this->bsg_code = $val; }
    public function getBsg_code()       { return $this->bsg_code; }

    public function setBsc_code( $val ) { $this->bsc_code = $val; }
    public function getBsc_code()       { return $this->bsc_code; }

    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    public function actualiza() {
    	$this->sql = "SELECT familia_bien_serv_update(
                          '$this->tedt',   '$this->bst_id', '$this->grupbs_id', '$this->clasbs_id', '$this->famibs_id', '$this->famibs_nombre', 
                          '$this->famibs_estado', '$this->usuracce_key')";
        //echo $this->sql;
    	$this->famibs_id = parent::execute_01();
    }
        
    public function registros() {
    	$this->sql = "SELECT bienes_servs_familias_records('o', 
                         '$this->bsf_id',    '$this->bst_id',     '$this->bsg_id',   '$this->bsc_id',   '$this->bsf_code', '$this->bsf_nombre',
                         '$this->bsf_abrev', '$this->bsf_estado', '$this->bst_code', '$this->bsg_code', '$this->bsc_code',
                         '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>