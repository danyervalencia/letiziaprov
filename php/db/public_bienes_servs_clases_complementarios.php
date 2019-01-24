<?php
require_once "config.php";
require_once MOD . DIRECTORY_SEPARATOR . "conexion.php";

class Public_Bienes_Servs_Clases_Complementarios extends Conexion {
    private $bsccompl_id     = 0;   private $bsc_id       = 0;  private $compl_id = 0;  private $bsccompl_fixed = 0;  private $bsccompl_orden = 0;
    private $bsccompl_estado = "";  private $bsccompl_key = "";
    private $bsc_key = "";  private $compl_key = "";

    public function setBsccompl_id( $val )     { $this->bsccompl_id = $val; }
    public function getBsccompl_id()           { return $this->bsccompl_id; }

    public function setBsc_id( $val )          { $this->bsc_id = $val; }
    public function getBsc_id()                { return $this->bsc_id; }

    public function setcompl_id( $val )        { $this->compl_id = $val; }
    public function getcompl_id()              { return $this->compl_id; }

    public function setBsccompl_fixed( $val )  { $this->bsccompl_fixed = $val; }
    public function getBsccompl_fixed()        { return $this->bsccompl_fixed; }

    public function setBsccompl_orden( $val )  { $this->bsccompl_orden = $val; }
    public function getBsccompl_orden()        { return $this->bsccompl_orden; }
    
    public function setBsccompl_estado( $val ) { $this->bsccompl_estado = $val; }
    public function getBsccompl_estado()       { return $this->bsccompl_estado; }

    public function setBsccompl_key( $val )    { $this->bsccompl_key = $val; }
    public function getBsccompl_key()          { return $this->bsccompl_key; }

    public function setBsc_key( $val )   { $this->bsc_key = $val; }
    public function getBsc_key()         { return $this->bsc_key; }
    
    public function setcompl_key( $val ) { $this->compl_key = $val; }
    public function getcompl_key()       { return $this->compl_key; }


    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function actualiza() {
        $this->sql = "SELECT bienes_servs_clases_complementarios_update('$this->tipo_edit', '$this->bsccompl_id', '$this->bsccompl_key',
                          '$this->bsc_id', '$this->compl_key', '$this->bsccompl_fixed', '$this->bsccompl_orden',
                          '$this->bsccompl_estado', '$this->menu_id', '$this->usur_key')";
        //echo $this->sql;
        $this->bsccompl_key = parent::execute_01();
    }

    public function registros() {
    	$this->sql = "SELECT bienes_servs_clases_complementarios_records('o',
                          '$this->bsccompl_id',    '$this->bsccompl_key',
                          '$this->bsc_id',         '$this->bsc_key',      '$this->compl_id', '$this->compl_key',  
                          '$this->bsccompl_fixed', '$this->bsccompl_estado',
                          '$this->tipo_report', '$this->order_by', '$this->record_nro', '$this->record_ini');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>