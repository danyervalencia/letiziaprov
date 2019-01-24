<?php
require_once 'conexion.php';

class Public_Provincias extends Conexion {
    private $prvn_id = 0; private $dpto_id = 0;  private $prvn_nombre = '';  private $prvn_abrev = '';  private $prvn_code = '';  private $prvn_estado = '1';

    public function setDpto_id( $val )     { $this->dpto_id = $val; }
    public function getDpto_id()           { return $this->dpto_id; }

    public function setPrvn_id( $val )     { $this->prvn_id = $val; }
    public function getPrvn_di()           { return $this->prvn_id; }
    
    public function setPrvn_nombre( $val ) { $this->prvn_nombre = $val; }
    public function getPrvn_nombre()       { return $this->prvn_nombre; }

    public function setPrvn_abrev( $val )  { $this->prvn_abrev = $val; }
    public function getPrvn_abrev()        { return $this->prvn_abrev; }

    public function setPrvn_code( $val )  { $this->prvn_code = $val; }
    public function getPrvn_code()        { return $this->prvn_code; }
 
    public function setPrvn_estado( $val ) { $this->prvn_estado = $val; }
    public function getPrvn_estado()       { return $this->prvn_estado; }

    public function registros() {
        $this->sql = "SELECT provincias_records('o',
                          '$this->prvn_id', '$this->dpto_id', '$this->prvn_nombre', '$this->prvn_abrev', '$this->prvn_code', 
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>