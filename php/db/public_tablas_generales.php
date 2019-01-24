<?php
require_once 'conexion.php';

class Public_Tablas_Generales extends Conexion {
    private $tabgen_id = 0;  private $tabgen_parent = 0;  private $tabgen_nombre = '';  private $tabgen_abrev = '';  private $tabgen_code = '';  private $tabgen_estado = 'NULL';

    public function setTabgen_id( $val )     { $this->tabgen_id = $val; }
    public function getTabgen_id()           { return $this->tabgen_id; }

    public function setTabgen_parent( $val ) { $this->tabgen_parent = $val; }
    public function getTabgen_parent()       { return $this->tabgen_parent; }
 
    public function setTabgen_nombre( $val ) { $this->tabgen_nombre = $val; }
    public function getTabgen_nombre()       { return $this->tabgen_nombre; }

    public function setTabgen_abrev( $val )  { $this->tabgen_abrev = $val; }
    public function getTabgen_abrev()        { return $this->tabgen_abrev; }

    public function setTabgen_code( $val )   { $this->tabgen_code = $val; }
    public function getTabgen_code()         { return $this->tabgen_code; }

    public function setTabgen_estado( $val ) { $this->tabgen_estado = $val; }
    public function getTabgen_estado()       { return $this->tabgen_estado; }

    public function registros() {
        $this->sql = "SELECT tablas_generales_records('o', 
                          '$this->tabgen_id', '$this->tabgen_parent', '$this->tabgen_nombre', '$this->tabgen_abrev', '$this->tabgen_code', $this->tabgen_estado,
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit',  '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>