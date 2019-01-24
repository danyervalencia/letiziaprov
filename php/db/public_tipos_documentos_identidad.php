<?php
require_once "conexion.php";

class Public_Tipos_Documentos_identidad extends Conexion {
    private $tipdocident_id = 0;  private $tipdocident_nombre = "";  private $tipdocident_abrev = "";  private $tipdocident_digitos = 0;
    private $tipdocident_estado_individuos = "";  private $tipdocident_estado_personas = "";

    public function setTipdocident_id( $val )     { $this->tipdocident_id = $val; }
    public function getTipdocident_id()           { return $this->tipdocident_id; }

    public function setTipdocident_nombre( $val ) { $this->tipdocident_nombre = $val; }
    public function getTipdocident_nombre()       { return $this->tipdocident_nombre; }

    public function setTipdocident_abrev( $val )  { $this->tipdocident_abrev = $val; }
    public function getTipdocident_abrev()        { return $this->tipdocident_abrev; }

    public function setTipdocident_estado_individuos( $val ) { $this->tipdocident_estado_individuos = $val; }
    public function getTipdocident_estado_individuos()       { return $this->tipdocident_estado_individuos; }

    public function setTipdocident_estado_personas( $val )   { $this->tipdocident_estado_personas = $val; }
    public function getTipdocident_estado_personas()         { return $this->tipdocident_estado_personas; }

    public function registros() {
        $this->sql = "SELECT tipos_documentos_identidad_records('o', 
                          '$this->tipdocident_id', '$this->tipdocident_nombre', '$this->tipdocident_abrev', '$this->tipdocident_digitos',
                          '$this->tipdocident_estado_individuos', '$this->tipdocident_estado_personas',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>