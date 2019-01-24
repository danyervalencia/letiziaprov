<?php
require_once 'conexion.php';

class Public_Bienes_Servs_Clases extends Conexion {
    private $bsc_id     = 0;   private $bst_id       = 0;   private $bsg_id     = 0;  private $bsc_code = '';
    private $bsc_nombre = '';  private $clasbs_abrev = '';  private $bsc_estado = '';

    private $bst_code = '';  private $bsg_code = '';

    public function setBsc_id( $val )      { $this->bsc_id = $val; }
    public function getBsc_id()            { return $this->bsc_id; }

    public function setBst_id( $val )      { $this->bst_id = $val; }
    public function getBst_id()            { return $this->bst_id; }

    public function setBsg_id( $val )      { $this->bsg_id = $val; }
    public function getBsg_id()            { return $this->bsg_id; }

    public function setBsc_code( $val )    { $this->bsc_code = $val; }
    public function getBsc_code()          { return $this->bsc_code; }

    public function setBsc_nombre( $val )  { $this->bsc_nombre = $val; }
    public function getBsc_nombre()        { return $this->bsc_nombre; }

    public function setBsc_abrev( $val )   { $this->bsc_abrev = $val; }
    public function getBsc_abrev()         { return $this->bsc_abrev; }

    public function setBsc_estado( $val )  { $this->bsc_estado = $val; }
    public function getBsc_estado()        { return $this->bsc_estado; }

    public function setBst_code( $val ) { $this->bst_code = $val; }
    public function getBst_code()       { return $this->bst_code; }

    public function setBsg_code( $val ) { $this->bsg_code = $val; }
    public function getBsg_code()       { return $this->bsg_code; }

    public function actualiza() {
    	$this->sql = "SELECT clase_bien_serv_update(
                          '$this->tedt', '$this->tipbs_id', '$this->bsg_id', '$this->clasbs_id', '$this->clasbs_nombre', '$this->clasbs_estado', 
                          '$this->usuracce_key')";
    	$this->clasbs_id = parent::execute_01();
    }
    
    public function registros() {
    	$this->sql = "SELECT bienes_servs_clases_records('o', 
                          '$this->bsc_id',     '$this->bst_id',    '$this->bsg_id',     '$this->bsc_code',
                          '$this->bsc_nombre', '$this->bsc_abrev', '$this->bsc_estado', '$this->bst_code',   '$this->bsg_code',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>