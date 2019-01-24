<?php
require_once 'conexion.php';

class Public_Departamentos extends Conexion {
    private $dpto_id = 0;  private $pais_id = 0;  private $dpto_nombre = '';  private $dpto_abrev = '';

    public function setDpto_id( $val )     { $this->dpto_id = $val; }
    public function getDpto_id()           { return $this->dpto_id; }

    public function setPais_id( $val )     { $this->pais_id = $val; }
    public function getPais_id()           { return $this->pais_id; }
 
    public function setDpto_nombre( $val ) { $this->dpto_nombre = $val; }
    public function getDpto_nombre()       { return $this->dpto_nombre; }

    public function setDpto_abrev( $val )  { $this->dpto_abrev = $val; }
    public function getDpto_abrev()        { return $this->dpto_abrev; }
 
    public function setDpto_estado( $val ) { $this->dpto_estado = $val; }
    public function getDpto_estado()       { return $this->dpto_estado; }

    public function registros() {
        $this->sql = "SELECT departamentos_records('o', 
                          '$this->dpto_id',  '$this->pais_id',  '$this->dpto_nombre', '$this->dpto_abrev', 
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>