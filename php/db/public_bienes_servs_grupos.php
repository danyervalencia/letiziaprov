<?php
require_once 'conexion.php';

class Public_Bienes_Servs_Grupos extends Conexion {
    private $bsg_id = 0;  private $bst_id = 0;  private $bsg_code = '';  private $bsg_nombre = '';  private $bsg_abrev = '';  private $bsg_estado = '';
    private $bst_code = "";

    public function setBsg_id( $val )     { $this->bsg_id = $val; }
    public function getBsg_id()           { return $this->bsg_id; }

    public function setBst_id( $val )     { $this->bst_id = $val; }
    public function getBst_id()           { return $this->bst_id; }

    public function setBsg_code( $val )   { $this->bsg_code = $val; }
    public function getBsg_code()         { return $this->bsg_code; }
 
    public function setBsg_nombre( $val ) { $this->bsg_nombre = $val; }
    public function getBsg_nombre()       { return $this->bsg_nombre; }

    public function setBsg_abrev( $val )  { $this->bsg_abrev = $val; }
    public function getBsg_abrev()        { return $this->bsg_abrev; }
 
    public function setBsg_estado( $val ) { $this->bsg_estado = $val; }
    public function getBsg_estado()       { return $this->bsg_estado; }

    public function setBst_code( $val ) { $this->bst_code = $val; }
    public function getBst_code()       { return $this->bst_code; }

    public function registros() {
        $this->sql = "SELECT bienes_servs_grupos_records('o',
                         '$this->bsg_id',  '$this->bst_id', '$this->bsg_code', '$this->bsg_nombre', '$this->bsg_abrev', '$this->bsg_estado',
                         '$this->bst_code', 
                         '$this->type_record', '$this->type_query', '$this->order_by', '$this->record_limit', '$this->record_start');
                      FETCH ALL IN o";
        //echo $this->sql;
    	return parent::executeSQL();
    }
}
?>