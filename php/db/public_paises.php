<?php
//require_once "config.php";
require_once "conexion.php";

class Public_Paises extends Conexion {
    private $pais_id = 0;  private $pais_flga = "";  private $pais_nombre = "";  private $pais_abrev = "";  private $pais_code = "";

    public function setPais_id( $val )     { $this->pais_id = $val; }
    public function getPais_id()           { return $this->pais_id; }

    public function setPais_nombre( $val ) { $this->pais_nombre = $val; }
    public function getPais_nombre()       { return $this->pais_nombre; }

    public function setPais_abrev( $val )  { $this->paies_abrev = $val; }
    public function getPais_abrev()        { return $this->paies_abrev; }

    public function setPais_code( $val )   { $this->paies_code = $val; }
    public function getPais_code()         { return $this->paies_code; }

    public function registros() {
    	$this->sql = "SELECT paises_records('o',
                          '$this->pais_id', '$this->pais_nombre', '$this->pais_abrev', '$this->pais_code',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>