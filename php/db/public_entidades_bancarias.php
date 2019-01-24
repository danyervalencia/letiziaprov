<?php
require_once 'conexion.php';

class Public_Entidades_Bancarias extends Conexion {
    private $entibanc_id     = 0;   private $entibanc_nombre = '';  private $entibanc_abrev = '';  private $entibanc_code = '';
    private $entibanc_estado = '';  private $entibanc_key    = '';

    public function setEntibanc_id( $val )     { $this->entibanc_id = $val; }
    public function getEntibanc_id()           { return $this->entibanc_id; }
 
    public function setEntibanc_nombre( $val ) { $this->entibanc_nombre = $val; }
    public function getEntibanc_nombre()       { return $this->entibanc_nombre; }

    public function setEntibanc_abrev( $val )  { $this->entibanc_abrev = $val; }
    public function getEntibanc_abrev()        { return $this->entibanc_abrev; }

    public function setEntibanc_code( $val )   { $this->entibanc_code = $val; }
    public function getEntibanc_code()         { return $this->entibanc_code; }

    public function setEntibanc_estado( $val ) { $this->entibanc_estado = $val; }
    public function getEntibanc_estado()       { return $this->entibanc_estado; }

    public function setEntibanc_key( $val )    { $this->entibanc_key = $val; }
    public function getEntibanc_key()          { return $this->entibanc_key; }

    public function registros() {
        $this->sql = "SELECT entidades_bancarias_records('o', 
                          '$this->entibanc_id', '$this->entibanc_key', '$this->entibanc_nombre', '$this->entibanc_abrev',
                           '$this->entibanc_code',  '$this->entibanc_estado',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit',  '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>