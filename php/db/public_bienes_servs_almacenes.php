<?php
require_once 'conexion.php';

class Public_Bienes_Servs_Almacenes extends Conexion {
    private $bsalma_id  = 0;   private $bsalma_flga = '';  private $bs_id = 0;  private $bsalma_code = '';  private $bsalma_observ = '';
    private $bsalma_key = '';

    private $bs_key = '';

    public function setBsalma_id( $val )     { $this->bsalma_id = $val; }
    public function getBsalma_id()           { return $this->bsalma_id; }

    public function setBsalma_flga( $val )   { $this->bsalma_flga = $val; }
    public function getBsalma_flga()         { return $this->bsalma_flga; }

    public function setBs_id( $val )         { $this->bs_id = $val; }
    public function getBs_id()               { return $this->bs_id; }
    
    public function setBsalma_code( $val )   { $this->bsalma_code = $val; }
    public function getBsalma_code()         { return $this->bsalma_code; }

    public function setBsalma_observ( $val ) { $this->bsalma_observ = $val; }
    public function getBsalma_observ()       { return $this->bsalma_observ; }

    public function setBsalma_key( $val )    { $this->bsalma_key = $val; }
    public function getBsalma_key()          { return $this->bsalma_key; }

    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */  
    public function setBs_key( $val ) { $this->bs_key = $val; }
    public function getBs_key()       { return $this->bs_key; }

    public function actualiza() {
        $this->sql = "SELECT bienes_servs_update(
                          '$this->tipo_edit', '$this->bs_id',     '$this->bs_key',    '$this->bst_id',   '$this->bsg_id',    '$this->bsc_id',
                          '$this->bsf_id',    '$this->bs_code',   '$this->bs_nombre', '$this->bs_abrev', '$this->unimed_id', '$this->nand_key',
                          '$this->bs_observ', '$this->bs_estado', '$this->usur_key',
                          '$this->bsalma_key',  '$this->alma_id',  '$this->bsalma_code')";
        //echo $this->sql;
        $this->bs_key = parent::execute_01();
    }

    public function registros() {
        $this->sql  = "SELECT bienes_servs_almacenes_records('o', '$this->bsalma_id', '$this->bsalma_key',
                            '$this->bs_id', '$this->bs_key', '$this->alma_id', '$this->alma_key', '$this->bsalma_code',
                            '$this->type_record',  '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start'); 
                       FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>