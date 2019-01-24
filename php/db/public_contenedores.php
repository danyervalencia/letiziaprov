<?php
require_once 'conexion.php';

class Public_Contenedores extends Conexion {
    private $cont_id     = 0;   private $cont_serie  = '';  private $cont_nro = '';  private $tipcont = '0';
    private $cont_observ = '';  private $cont_estado = 'NULL';  private $cont_key = '';

    private $cont_placa = '';

    public function setCont_id( $val )     { $this->cont_id = $val; }
    public function getCont_id()           { return $this->cont_id; }
    
    public function setCont_serie( $val )  { $this->cont_serie = $val; }
    public function getCont_serie()        { return $this->cont_serie; }

    public function setCont_nro( $val )    { $this->cont_nro = $val; }
    public function getCont_nro()          { return $this->cont_nro; }

    public function setTipcont_id( $val )  { $this->tipcont_id = $val; }
    public function getTipcont_id()        { return $this->tipcont_id; }

    public function setCont_observ( $val ) { $this->cont_observ = $val; }
    public function getCont_observ()       { return $this->cont_observ; }
    
    public function setCont_estado( $val ) { $this->cont_estado = $val; }
    public function getCont_estado()       { return $this->cont_estado; }

    public function setCont_key( $val )    { $this->cont_key = $val; }
    public function getCont_key()          { return $this->cont_key; }

    public function setCont_placa( $val ) { $this->cont_placa = $val; }
    public function getCont_placa()       { return $this->cont_placa; }

    /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    public function actualiza() {
        $this->sql = "SELECT contenedores_update('$this->type_edit', '$this->cont_id', '$this->pers_key',
                          '$this->cont_serie', '$this->cont_nro', '$this->tipcont_id', '$this->cont_observ', '$this->usursess_key')";
        //echo $this->sql;
        $this->cont_key = parent::execute_01();
    }

    public function registros() {
    	$this->sql = "SELECT contenedores_records('o', 
                          '$this->cont_id', '$this->cont_key', '$this->cont_serie', '$this->cont_nro', '$this->tipcont_id', $this->cont_estado, '$this->cont_placa',
                          '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>