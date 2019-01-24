<?php
require_once 'conexion.php';

class Public_Distritos extends Conexion {
    private $dstt_id     = 0;   private $prvn_id     = 0;  private $dstt_nombre = '';  private $dstt_abrev = '';  private $dstt_code = '';
    private $dstt_region = '';  private $dstt_estado = '';

    public function setDstt_id( $val )     { $this->dstt_id = $val; }
    public function getDstt_id()           { return $this->dstt_id; }

    public function setPrvn_id( $val )     { $this->prvn_id = $val; }
    public function getPrvn_id()           { return $this->prvn_id; }
        
    public function setDstt_nombre( $val ) { $this->dstt_nombre = $val; }
    public function getDstt_Nombre()       { return $this->dstt_nombre; }

    public function setDstt_abrev( $val )  { $this->dstt_abrev = $val; }
    public function getDstt_brev()         { return $this->dstt_abrev; }

    public function setDstt_code( $val )   { $this->dstt_code = $val; }
    public function getDstt_code()         { return $this->dstt_code; }

    public function setDstt_region( $val ) { $this->dstt_region = $val; }
    public function getDstt_region()       { return $this->dstt_region; }
    
    public function setDstt_estado( $val ) { $this->dstt_estado = $val; }
    public function getDstt_estado()       { return $this->dstt_estado; }

    public function registros() {
    	$this->sql = "SELECT distritos_records('o', 
                          '$this->dstt_id',  '$this->prvn_id', '$this->dstt_nombre', '$this->dstt_abrev',  '$this->dstt_code',  '$this->dstt_region', 
                          '$this->type_query', '$this->type_record', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
    	return parent::executeSQL();
    }
}
?>