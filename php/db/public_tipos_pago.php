<?php
require_once 'conexion.php';

class Public_Tipos_Pago extends Conexion {
    private $tippag_id = 0;   private $tippag_nombre = '';  private $tippag_abrev = '';
    private $tippag_escompra = '';  private $tippag_esventa = '';  private $tippag_escobro = '';  private $tippag_espago = '';

    public function setTippag_id( $val )       { $this->tippag_id = $val; }
    public function getTippag_id()             { return $this->tippag_id; }
    
    public function setTippag_nombre( $val )   { $this->tippag_nombre = $val; }
    public function getTippag_nombre()         { return $this->tippag_nombre; }

    public function setTippag_abrev( $val )    { $this->tippag_abrev = $val; }
    public function getTippag_abrev()          { return $this->tippag_abrev; }
    
    public function setTippag_escompra( $val ) { $this->tippag_escompra = $val; }
    public function getTippag_escompra()       { return $this->tippag_escompra; }

    public function setTippag_esventa( $val )  { $this->tippag_esventa = $val; }
    public function getTippag_esventa()        { return $this->tippag_esventa; }

    public function setTippag_escobro( $val )  { $this->tippag_escobro = $val; }
    public function getTippag_escobro()        { return $this->tippag_escobro; }

    public function setTippag_espago( $val )   { $this->tippag_espago = $val; }
    public function getTippag_espago()         { return $this->tippag_espago; }

    public function registros() {
    	$this->sql = "SELECT tipos_pago_records('o', 
                          '$this->tippag_id', '$this->tippag_nombre', '$this->tippag_abrev', 
                          '$this->tippag_escompra', '$this->tippag_esventa', '$this->tippag_escobro', '$this->tippag_espago',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>