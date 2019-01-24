<?php
require_once 'conexion.php';

class Public_Personas_actividades extends Conexion {
    private $persactiv_id = 0; private $pers_id = 0;  private $activ_id = 0; private $persactiv_observ = '';  private $persactiv_estado = 'NULL';  private $persactiv_key = '';
    private $pers_key = '';  private $activ_key = '';

    public function setPersactiv_id( $val )     { $this->persactiv_id = $val; }
    public function getPersactiv_id()           { return $this->persactiv_id; }

    public function setPers_id( $val )          { $this->pers_id = $val; }
    public function getPers_id()                { return $this->pers_id; }

    public function setActiv_id( $val )         { $this->activ_id = $val; }
    public function getActiv_id()               { return $this->activ_id; }

    public function setPersactiv_observ( $val ) { $this->persactiv_observ = $val; }
    public function getPersactiv_observ()       { return $this->persactiv_observ; }
 
    public function setPersactiv_estado( $val ) { $this->persactiv_estado = $val; }
    public function getPersactiv_estado()       { return $this->persactiv_estado; }

    public function setPersactiv_key( $val )    { $this->persactiv_key = $val; }
    public function getPersactiv_key()          { return $this->persactiv_key; }

    public function setPers_key( $val ) { $this->pers_key = $val; }
    public function getPers_key() { return $this->pers_key; }

    public function setActiv_key( $val ) { $this->activ_key = $val; }
    public function getActiv_key() { return $this->activ_key; }

    public function actualiza() {
        $this->sql = "SELECT personas_actividades_update('$this->type_edit', '$this->persactiv_id', '$this->persactiv_key', '$this->pers_key',
                          '$this->activ_key', '$this->persactiv_observ', '$this->persactiv_estado', '$this->usursess_key', '$this->menu_id')";
        //echo $this->sql;
        $this->persactiv_key = parent::execute_01();
    }

    public function registros() {
        $this->sql = "SELECT personas_actividades_records('o',
                          '$this->persactiv_id', '$this->persactiv_key', '$this->pers_id', '$this->activ_id', $this->persactiv_estado, '$this->pers_key', '$this->activ_key',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>