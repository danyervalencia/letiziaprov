<?php
require_once 'conexion.php';

class Public_Actividades extends Conexion {
    private $activ_id = 0;  private $bst_id = 0;  private $activ_nombre = '';  private $activ_abrev = '';  private $activ_code = '';
    private $activ_observ = '';  private $activ_estado = 'NULL';  private $activ_key = '';

    public function setActiv_id( $val )     { $this->activ_id = $val; }
    public function getActiv_id()           { return $this->activ_id; }
    
    public function setBst_id( $val )       { $this->bst_id = $val; }
    public function getBst_id()             { return $this->bst_id; }

    public function setActiv_nombre( $val ) { $this->activ_nombre = $val; }
    public function getActiv_nombre()       { return $this->activ_nombre; }
 
    public function setActiv_abrev( $val )  { $this->activ_abrev = $val; }
    public function getActiv_abrev()        { return $this->activ_abrev; }

    public function setActiv_code( $val )   { $this->activ_code = $val; }
    public function getActiv_code()         { return $this->activ_code; }
 
    public function setActiv_observ( $val ) { $this->activ_observ = $val; }
    public function getActiv_observ()       { return $this->activ_observ; }

    public function setActiv_estado( $val ) { $this->activ_estado = $val; }
    public function getActiv_estado()       { return $this->activ_estado; }

    public function setActiv_key( $val )    { $this->activ_key = $val; }
    public function getActiv_key()          { return $this->activ_key; }

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function actualiza() {
        $this->sql = "SELECT activcenes_update(
                        '$this->tipo_edit', '$this->activ_id',      '$this->activ_key',     '$this->activ_nombre', '$this->activ_abrev', 
                        '$this->pers_key',   $this->activ_fechaini,  $this->activ_fechafin, '$this->activ_observ', '$this->activ_estado', '$this->usur_key')";
        //echo $this->sql;
        $this->activ_key = parent::execute_01();
    }

    public function registros() {
        $this->sql = "SELECT public.actividades_records('o', 
                          '$this->activ_id', '$this->activ_key', '$this->bst_id', '$this->activ_nombre', '$this->activ_abrev', $this->activ_estado,
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                          FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>