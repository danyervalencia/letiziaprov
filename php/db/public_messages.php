<?php
//require_once "config.php";
require_once "conexion.php";

class Public_Messages extends Conexion {
    private $mess_id = 0;  private $indiv_id = 0;  private $mess_title = '';  private $usur_estado = 'NULL';  private $mess_texto = '';
    private $mess_key = '';  private $indiv_key = ''; 
    private $usur01_key = ''; private $usur02_key = '';

    public function setMess_id( $val )    { $this->mess_id = $val; }
    public function getMess_id()          { return $this->mess_id; }

    public function setMess_key( $val )    { $this->mess_key = $val; }
    public function getMess_key()          { return $this->mess_key; }

    public function setIndiv_id( $val )       { $this->indiv_id = $val; }
    public function getIndiv_id()             { return $this->indiv_id; }
 
    public function setMess_title( $val ) { $this->mess_title = $val; }
    public function getMess_title()       { return $this->mess_title; }

    public function setMess_texto( $val ) { $this->mess_texto = $val; }
    public function getMess_texto()       { return $this->mess_texto; }

    public function setMess_estado( $val ) { $this->mess_estado = $val; }
    public function getMess_estado()       { return $this->mess_estado; }

    public function setIndiv_key( $val )       { $this->indiv_key = $val; }
    public function getIndiv_key()             { return $this->indiv_key; }

    public function setIndiv_dni( $val )       { $this->indiv_dni = $val; }
    public function getIndiv_dni()             { return $this->indiv_dni; }

    public function setUsur01_key( $val )       { $this->usur01_key = $val; }
    public function getUsur01_key()             { return $this->usur01_key; }

    public function setUsur02_key( $val )       { $this->usur02_key = $val; }
    public function getUsur02_key()             { return $this->usur02_key; }

    public function actualiza() {
        $this->sql = "SELECT messages_update('$this->type_edit', '0', 
                        '$this->indiv_key', '$this->mess_title', '$this->mess_texto', '$this->usursess_key')";
        //echo $this->sql;
        $this->mess_key = parent::execute_01();
    }

    public function registros() {
        $this->sql = "SELECT messages_records('o', 
                          '$this->mess_id', '$this->mess_key', '$this->usur01_key', '$this->usur02_key', '$this->fechaini', '$this->fechafin',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>