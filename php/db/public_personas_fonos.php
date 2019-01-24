<?php
require_once 'conexion.php';

class Public_Personas_Fonos extends Conexion {
    private $persfono_id = 0; private $pers_id = 0;  private $tipfono_id = 0;  private $compfono_id = 0;
    private $persfono_nro = '';  private $persfono_observ = '';  private $persfono_estado = 'NULL';  private $persfono_key = '';
    private $pers_key = '';  

    public function setPersfono_id( $val )     { $this->persfono_id = $val; }
    public function getPersfono_id()           { return $this->persfono_id; }

    public function setPers_id( $val )         { $this->pers_id = $val; }
    public function getPers_id()               { return $this->pers_id; }

    public function setTipfono_id( $val )      { $this->tipfono_id = $val; }
    public function getTipfono_id()            { return $this->tipfono_id; }

    public function setCompfono_id( $val )     { $this->compfono_id = $val; }
    public function getCompfono_id()           { return $this->compfono_id; }

    public function setPersfono_nro( $val )    { $this->persfono_nro = $val; }
    public function getPersfono_nro()          { return $this->persfono_nro; }

    public function setPersfono_observ( $val ) { $this->persfono_observ = $val; }
    public function getPersfono_observ()       { return $this->persfono_observ; }
 
    public function setPersfono_estado( $val ) { $this->persfono_estado = $val; }
    public function getPersfono_estado()       { return $this->persfono_estado; }

    public function setPersfono_key( $val )    { $this->persfono_key = $val; }
    public function getPersfono_key()          { return $this->persfono_key; }

    public function setPers_key( $val ) { $this->pers_key = $val; }
    public function getPers_key() { return $this->pers_key; }

    public function actualiza() {
        $this->sql = "SELECT personas_fonos_update('$this->type_edit', '$this->persfono_id', '$this->persfono_key', '$this->pers_key',
                           $this->tipfono_id, $this->compfono_id, '$this->persfono_nro', '$this->persfono_observ', '$this->persfono_estado',
                          '$this->usursess_key', '$this->menu_id')";
        //echo $this->sql;
        $this->persfono_key = parent::execute_01();
    }

    public function registros() {
        $this->sql = "SELECT personas_fonos_records('o',
                          '$this->persfono_id', '$this->persfono_key', '$this->pers_id', '$this->tipfono_id', '$this->compfono_id', '$this->persfono_nro', $this->persfono_estado, '$this->pers_key',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
        return parent::executeSQL();
    }
}
?>