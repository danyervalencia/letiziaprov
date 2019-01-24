<?php
require_once 'conexion.php';

class Public_Monedas extends Conexion {
    private $mone_id = 0;  private $mone_flga = '';  private $mone_nombre = '';  private $mone_abrev = '';  private $mone_code = '';
    private $tipmon_id = 0;  private $mone_estado = 0;

    public function setMone_id( $val )     { $this->mone_id = $val; }
    public function getMone_id()           { return $this->mone_id; }

    public function setMone_nombre( $val ) { $this->mone_nombre = $val; }
    public function getMone_nombre()       { return $this->mone_nombre; }

    public function setMone_abrev( $val )  { $this->mone_abrev = $val; }
    public function getMone_abrev()        { return $this->mone_abrev; }

    public function setMone_code( $val )   { $this->mone_code = $val; }
    public function getMone_code()         { return $this->mone_code; }

    public function setTipmon_id( $val )   { $this->tipmon_id = $val; }
    public function getTipmon_id()         { return $this->tipmon_id; }

    public function setMone_estado( $val ) { $this->mone_estado = $val; }
    public function getMone_estado()       { return $this->mone_estado; }

    public function registros() {
    	$this->sql = "SELECT monedas_records('o',
                          '$this->mone_id', '$this->mone_nombre', '$this->mone_abrev', '$this->tipmon_id', '$this->mone_estado',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>